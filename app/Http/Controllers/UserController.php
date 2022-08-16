<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user = UserRepository::getCurrentUser();

        return view('admin.user.updateUser.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    public function update(UserRequest $request, $id)
    {
        UserService::update($request -> validated(), $id);
        return back() -> with('Success Message', 'User Updated Successfully');
    }

    public function destroy($id)
    {
        UserService::delete($id);

        return back() -> with(['Delete_message' => 'Deleted Successfully']);
    }
}
