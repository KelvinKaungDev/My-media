<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\post;
use App\Repositories\PostRepository;

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

    }

    public function store(Request $request)
    {
        //
    }

    public function search(Request $request)
    {
        $results = PostRepository::searchByName($request -> key);

        return response() -> json([
            'result' => $results
        ]);
    }

    public function searchByCategory(Request $request)
    {
        $results = PostRepository::searchByCategoryId($request -> key);

        return response() -> json([
            'result' => $results
        ]);
    }

    public function showPostDetail(Request $request)
    {
        $post = PostRepository::getById($request -> key);

        return response() -> json([
            'result' => $post
        ]);
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
