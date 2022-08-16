<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginRepository {

    public static function create($request)
    {
        $email    = $request -> email;
        $password = $request -> password;
        $user  = self::getUserByEmail($email);

        if(isset($user)) {
            if(!empty($email) && !empty($password))
            {
                if(Hash::check($password, $user -> password))
                {
                    return response() -> json([
                        'email' => $email,
                        'id'    => $user -> id,
                        'token' => $user -> createToken(time()) -> plainTextToken
                    ]);
                } else {
                    return response() -> json([
                        'email'  => null,
                        'token' => null
                    ]);
                }
            } else {
                return response() -> json([
                    'email' => null,
                    'token' => null,
                ]);
            }
        } else {
            return response() -> json([
                'result' => 'User is not exist'
            ]);
        }
    }

    public static function getUserByEmail($email)
    {
        return User::where('email', $email) -> first();
    }

}
