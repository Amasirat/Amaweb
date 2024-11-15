<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('index');
});

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{blog}', [BlogController::class, 'show']);

Route::get('/register', [RegisterController::class, 'index']);
Route::get('/login', [SessionController::class, "index"]);

Route::post('/register', [RegisterController::class, 'store']);
