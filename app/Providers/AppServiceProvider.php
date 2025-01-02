<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Comment;
use App\Models\Blog;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useTailwind();

        Gate::define("create-blog", function (User $user) {
            return $user->admin;
        });

        Gate::define("edit-blog", function(User $user, Blog $blog) {
            return $blog->user == $user;
        });

        Gate::define("edit-comment", function (User $user, Comment $comment) {
            return $comment->user() == $user;
        });
    }
}
