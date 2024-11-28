<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('index');
});

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{blog}', [BlogController::class, 'show']);
Route::post('/blogs/{blog}', [CommentController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index']);
Route::get('/login', [SessionController::class, "index"]);

Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [SessionController::class, 'store']);
