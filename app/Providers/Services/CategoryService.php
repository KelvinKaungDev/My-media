<?

namespace App\Providers\Services;

use App\Models\Category;

class CategoryService {

    public static function create($request) {
        Category::create($request);
    }

    public static function delete($id) {
        Category::find($id) -> delete();
    }

    public static function search($request) {
       return Category::orWhere('title', 'LIKE', '%'. $request -> category_search . '%')
                        -> orWhere('type', 'LIKE', '%'. $request -> category_search . '%')
                        -> get();
    }
}
