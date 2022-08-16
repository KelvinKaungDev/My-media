<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Services\PostService;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{

    public function index()
    {
        $posts      = PostRepository::getAll();
        $categories = CategoryRepository::getAll();

        return view('admin.post.index', compact('categories', 'posts'));
    }

    public function create()
    {
        //
    }

    public function store(PostRequest $request)
    {
        PostService::create($request -> validated());

        return back() -> with('message_success', 'Create Post Successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post       = PostRepository::getById($id);
        $categories = CategoryRepository::getAll();

        return view('admin.post.edit', compact('post', 'categories'));
    }

    public function update(PostUpdateRequest $request, $id)
    {

    }

    public function destroy($id)
    {
        if(PostService::delete($id)) {
            return back() -> with('message_delete_success', 'Deleted Successfully');
        } else {
            return back() -> with('message_delete_fail', 'Deleted Fail');
        }
    }
}

