<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Providers\Repositories\UserRepository;
use App\Providers\Services\UserService;

class AuthController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function register(RegisterRequest $request)
    {
        UserService::create($request -> validated());
    }

    public function login(Request $request)
    {
        $user = UserRepository::getUserById($request -> id);

        if(Hash::check($request -> password, $user -> password)) {
            return response() -> json([
                'user'  => $user -> email,
                'token' => $user -> createToken(time()) -> plainTextToken
            ]);
        } else {
            return response() -> json([
                'user'  => null,
                'token' => null
            ]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
