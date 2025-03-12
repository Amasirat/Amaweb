<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DraftController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::view('/projects', view: "projects")
    ->name("projects");

Route::view('/about',"about")
    ->name("about-page");
// Blogs
Route::get('/blogs', [BlogController::class, 'index'])
    ->name("blog-index");

Route::get('/blogs/{blog}', [BlogController::class, 'show'])
    ->name("blog-show");

Route::get('/create', [BlogController::class, 'create'])
    ->name("blog-create-view")
    ->middleware("auth")
    ->can("create-blog");

Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])
    ->name("blog-edit-view")
    ->middleware("auth");

Route::get('/search', [BlogController::class, 'search'])
    ->name("blog-search");

Route::post('/blog/create', [BlogController::class, 'store'])
    ->name("blog-post");

Route::patch('/blogs/{blog}', [BlogController::class, 'update'])
    ->name("blog-edit");

Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])
    ->name("blog-delete");

Route::post('/blogs/{blog}', [CommentController::class, 'store'])
    ->name("comment-post");

Route::patch('/comment/edit', [CommentController::class, 'update'])
    ->name("comment-edit");

// Auth
Route::get('/register', [UserController::class, 'index'])
    ->name("user-register")
    ->middleware("guest");

Route::get('/login', [SessionController::class, "index"])
    ->name("user-login")
    ->middleware("guest");

Route::get('/email/verify', function () {
    return view('user.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/panel');

})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/panel', [UserController::class, 'show'])
    ->name("user-panel")
    ->middleware("auth");

Route::get('/panel/comments', [CommentController::class, 'index'])
    ->name('user-comments')
    ->middleware('auth');

Route::get('/panel/blogs', [SessionController::class, 'get_usr_blogs'])
    ->name("user-blogs")
    ->middleware("auth")
    ->can("create-blog");

Route::patch('/upload-image', [UserController::class, 'edit'])
    ->middleware("auth")
    ->name("user-edit-image");

Route::patch('/panel/notify_status', [UserController::class, 'edit_notify_status'])
    ->middleware("auth")
    ->name("user-edit-notify-status");

Route::delete('/logout', [SessionController::class, 'destroy'])
    ->name("delete-session");

Route::post('/register', [UserController::class, 'store'])
    ->name("post-user");

Route::post('/login', [SessionController::class, 'store'])
    ->name("session-post");

// Drafts
Route::get('/panel/drafts', [DraftController::class, 'index'])
    ->middleware('auth')
    ->name('draft-index');

Route::get('/panel/drafts/{draft}', [DraftController::class, 'edit'])
    ->middleware('auth')
    ->name('draft-view-edit');

Route::post('panel/drafts/{draft}', [DraftController::class, "update"])
    ->middleware('auth')
    ->name("draft-edit");

Route::delete('/panel/drafts/{draft}', [DraftController::class, "destroy"])
    ->middleware('auth')
    ->name("draft-delete");

Route::post("/draft/create", [DraftController::class, "store"])
    ->middleware("auth")
    ->name("draft-create");

Route::post('/panel/drafts/post-draft/{draft}', [DraftController::class, "turn_to_blog"])
    ->middleware('auth')
    ->name('post-draft');