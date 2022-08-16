<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository {

    public static function getAll()
    {
        return User:: orderBy('id', 'DESC') -> get();
    }

    public static function getUserById($id)
    {
        return User:: whereId($id) -> firstOrFail();
    }

    public static function getCurrentUser()
    {
        return Auth::user();
    }

}
