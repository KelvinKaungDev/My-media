<?php

namespace App\Repositories;

use App\Models\category;

class CategoryRepository {

    public static function getAll()
    {
        return category:: orderBy('id', 'DESC') -> get();
    }

}
