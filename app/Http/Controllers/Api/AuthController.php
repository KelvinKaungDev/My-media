<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Providers\Repositories\UserRepository;
use App\Providers\Services\UserService;
use App\Repositories\LoginRepository;
use App\Services\UserService as ServicesUserService;

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
        ServicesUserService::create($request -> validated());
    }

    public function login(Request $request)
    {
        $userToken = LoginRepository::create($request);

        return response() -> json([
            'result' => $userToken
        ]);
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
