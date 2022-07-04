<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Providers\Repositories\CategoryRepository;
use App\Providers\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = CategoryRepository::getAll();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        //
    }

    public function store(CategoryRequest $request)
    {
        CategoryService::create($request -> validated());

        return back() -> with('message_success', 'Category Created Successfully');
    }

    public function show($id)
    {
        //
    }

    public function search(Request $request) {
        $categories = CategoryService::search($request);

        return view('admin.category.index', compact('categories'));
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
        CategoryService::delete($id);

        return back() -> with('message_delete_success', 'Deleted Successfully');
    }
}
