<?php

use App\Http\Controllers\Api\ApiActionLogController;
use App\Http\Controllers\Api\ApiLoginController;
use App\Http\Controllers\Api\ApiPostController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ApiCategoryController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

Route::get('posts', [ApiPostController::class, 'index']);

Route::get('get-user-list', function() {
    return response() -> json('This is user list');
});

Route::post('posts/search', [ApiPostController::class, 'search']);

Route::get('category', [ApiCategoryController::class, 'index']);

Route::post('posts/searchByCategory', [ApiPostController::class, 'searchByCategory']);

Route::post('post/detail', [ApiPostController::class, 'showPostDetail']);

Route::get('post/detail', [ApiPostController::class, 'showPostDetail']);

Route::post('action-log', [ApiActionLogController::class, 'store']);

