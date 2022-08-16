<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService {

    public static function create($request)
    {
        $request['password'] = password_hash($request['password'], PASSWORD_BCRYPT);

        User::create($request);
    }

    public static function update($request, $id)
    {
        return User:: find($id) -> update($request);
    }

    public static function delete($id)
    {
        return User:: find($id) -> delete();
    }

    public static function search($request)
    {
        return User::orWhere('name', 'LIKE', '%' . $request -> user_search . '%')
                        -> orWhere('email', 'LIKE', '%' . $request -> user_search . '%')
                        -> orWhere('gender', 'LIKE', '%' . $request -> user_search . '%')
                        -> orWhere('ph_number', 'LIKE', '%' . $request -> user_search . '%')
                        -> get();
    }

};
