<?

namespace App\Providers\Services;

use App\Models\post;
use App\Providers\Repositories\PostRepository;
use Illuminate\Support\Facades\File;

class PostService {

    public static function create($request) {
        $data = $request['image'];
        if($data) {
            $file     = $data;
            $fileName = uniqid() . '_' . $file -> getClientOriginalName();
            $file -> move(public_path().'/postUpload/', $fileName);
        }
        else {
            $fileName = 'https://via.placeholder.com/200x200?text=Image+Not+Available';
        }

        $request['image'] = $fileName;

        post::create($request);
    }

    public static function delete($id) {
        $image = PostRepository::getById($id) -> image;

        if(File::exists(public_path().'/postUpload/'.$image)) {
            File::delete(public_path().'/postUpload/'.$image);
            post::find($id) -> delete();
        }
    }
}
