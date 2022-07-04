<?

namespace App\Providers\Repositories;

use App\Models\post;

class PostRepository {
    public static function getAll() {
        return post:: orderBy('id', 'DESC') -> get();
    }

    public static function getById($id) {
        return post::whereId($id) -> firstOrFail();
    }
}
