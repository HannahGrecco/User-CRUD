<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    if (auth()->check()) {
        $posts = auth()->user()->usersPosts()->with('author')->latest()->get();
    } else {
        $posts = [];
    }

    return view('home', ['posts' => $posts]);
});


Route::post ('/register', [UserController::class, 'register']);
Route::post ('/logout', [UserController::class, 'logout']);
Route::post ('/login', [UserController::class, 'login']);



Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);

