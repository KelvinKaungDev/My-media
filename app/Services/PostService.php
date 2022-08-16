<?php

namespace App\Services;

use App\Models\post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Providers\Repositories\PostRepository;

class PostService {

    public static function create($request) {
        $data = $request['image'];
        if($data) {
            $name = 'design_' . time() . '_' . $data -> getClientOriginalName();
            Storage::disk('public') -> putFileAs("/uploads/posts", $data, $name);

            $fileName = Storage::url("uploads/posts/{$name}");
        }
        else {
            $fileName = 'https://via.placeholder.com/200x200?text=Image+Not+Available';
        }

        $request['image'] = $fileName;

        post::create($request);
    }

    public static function delete($id) {
        $image = PostRepository::getById($id) -> image;
        if(File::exists(public_path($image))) {
            File::delete(public_path($image));
            post::find($id) -> delete();
        }
    }
}
