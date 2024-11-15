<?php

use App\Models\User;
use App\Models\Blog;
use App\Models\Comment;

test("hasUser", function() {
    $user = User::factory()->create();
    $blog = Blog::factory()->create();
    $comment = Comment::create([
        "user_id" => $user->id,
        "blog_id" => $blog->id,
        "body" => "This is a comment that has user"
    ]);

    expect($comment->user->id == $user->id)->toBeTrue();
});

test("hasBlog", function() {
    $user = User::factory()->create();
    $blog = Blog::factory()->create();
    $comment = Comment::create([
        "user_id" => $user->id,
        "blog_id" => $blog->id,
        "body" => "This is a comment that has user"
    ]);

    expect($comment->blog->id == $blog->id)->toBeTrue();
});

