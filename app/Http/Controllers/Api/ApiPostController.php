<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\post;
use App\Providers\Repositories\PostRepository;

class ApiPostController extends Controller
{

    public function index()
    {
        $posts = PostRepository::getAll();

        return response() -> json([
            'posts' => $posts
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function search(Request $request)
    {
        $posts = post::where('title','like', '%'. $request -> key . '%') -> get();

        return response() -> json([
            'post' => $posts
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
