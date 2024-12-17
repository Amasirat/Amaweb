<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

// Generic Views
Route::get('/', function () {

    $featured_blogs = Blog::latest()
        ->orderByDesc("id")
        ->take(Blog::$featured_count)
        ->get();

    return view("index", [
        "user" => Auth::user(),
        "featured_blogs" => $featured_blogs
    ]);
})->name("homepage");
Route::view('/about',"about")->name("about-page");
// Blogs
Route::get('/blogs', [BlogController::class, 'index'])->name("blog-index");
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name("blog-show");
Route::get('/create', [BlogController::class, 'create'])->name("blog-create")->middleware("auth")->can("create-blog");

Route::post('/create', [BlogController::class, 'store'])->name("blog-post");
Route::post('/blogs/{blog}', [CommentController::class, 'store'])->name("comment-post");

// Auth
Route::get('/register', [UserController::class, 'index'])->name("user-register")->middleware("guest");
Route::get('/login', [SessionController::class, "index"])->name("user-login")->middleware("guest");
Route::get('/panel', [UserController::class, 'show'])->name("user-panel")->middleware("auth");

Route::delete('/logout', [SessionController::class, 'destroy'])->name("delete-session");
Route::post('/register', [UserController::class, 'store'])->name("post-user");
Route::post('/login', [SessionController::class, 'store'])->name("session-post");
