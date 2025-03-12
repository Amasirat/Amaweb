<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\Storage;
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
            return $comment->user != null && ($comment->user() == $user);
            // null check is for comments that are guest comments and belong to no user
        });

        Vite::prefetch(concurrency: 3);
    }

    public static function join_path(string $directory1, string $directory2)
    {
        $length = strlen($directory1);
        $result = $directory1.(($directory1[$length-1] == "/") ? $directory2 : "/".$directory2);
        return $result;
    }

    public static function delete_image_directory($imageDirectory)
    {
        $disk = Storage::disk("public");
        if(! $disk->exists($imageDirectory))
        {
            return false;
        }

        if(! $disk->delete($imageDirectory))
        {
            throw new \Exception("Clean up failed. Could not remove image from server storage");
        }

        $explodedDirectory = explode("/", $imageDirectory);
        $parentDirectory = "";
        for($i = 0; $i < count($explodedDirectory) - 1; $i++)
        {
            $parentDirectory .= $explodedDirectory[$i]."/";
        }

        if(! $disk->deleteDirectory($parentDirectory))
        {
            return false;
        }

        return true;
    }
}
