<?php

namespace App\Http\Controllers;

use App\Providers\Repositories\UserRepository;
use App\Providers\Services\UserService;
use Illuminate\Http\Request;

class UserListController extends Controller
{

    public function index()
    {
        $users = UserRepository::getAll();

        return view('admin.user.userList.index', compact('users'));
    }

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

    public function search(Request $request)
    {
        $users = UserService::search($request);

        return view('admin.user.userList.index', compact('users'));
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
        UserService::delete($id);

        return back() -> with(['message_success' => 'Deleted Successfully']);
    }
}
