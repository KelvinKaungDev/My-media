<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified' ]) -> group(function () {
    Route::resource('post', PostController::class);
    Route::resource('user', UserController::class);

    Route::resource('category', CategoryController::class);
    Route::post('category/search', [CategoryController::class, 'search']) -> name('category.search');

    Route::resource('user-list', UserListController::class);
    Route::post('user-list/search', [UserListController::class, 'search']) -> name('user-list.search');

    Route::resource('change-password', ChangePasswordController::class);
});
