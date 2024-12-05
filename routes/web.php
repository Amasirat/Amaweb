<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

// Generic Views
Route::get('/', function () {
    return view("index", [
        "user" => Auth::user()
    ]);
})->name("homepage");
Route::view('/about',"about")->name("about-page");
// Blogs
Route::get('/blogs', [BlogController::class, 'index'])->name("blog-index");
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name("show-blog");
Route::get('/create', [BlogController::class, 'create'])->name("create-blog")->middleware("auth");

Route::post('/create', [BlogController::class, 'store'])->name("post-blog");
Route::post('/blogs/{blog}', [CommentController::class, 'store'])->name("post-comment");

// Auth
Route::get('/register', [UserController::class, 'index'])->name("user-register");
Route::get('/login', [SessionController::class, "index"])->name("user-login");
Route::get('/panel', [UserController::class, 'show'])->name("user-panel");

Route::post('/register', [UserController::class, 'store'])->name("post-user");
Route::post('/login', [SessionController::class, 'store'])->name("post-session");
