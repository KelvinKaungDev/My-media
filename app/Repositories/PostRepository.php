<?php

namespace App\Repositories;

use App\Models\post;

class PostRepository {

    public static function getAll()
    {
        return post:: orderBy('id', 'DESC') -> get();
    }

    public static function getById($id)
    {
        return post::whereId($id) -> firstOrFail();
    }

    public static function searchByName($key)
    {
        return post::where('title', 'LIKE', '%' . $key . '%') -> get();
    }

    public static function searchByCategoryId($key)
    {
        return post::where('category_id', $key) -> get();
    }

}
