<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Providers\Repositories\UserRepository;
use App\Providers\Services\changePasswordService;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{

    public function index()
    {
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = UserRepository::getUserById($id);

        return view('admin.user.changePassword.index', compact('user'));
    }

    public function update(ChangePasswordRequest $request, $id)
    {
        changePasswordService::update($request -> validated(), $id);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
