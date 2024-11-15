<?php
use App\Models\User;
use App\Models\Blog;
use App\Models\Comment;

test('hasComment', function () {
    // Setup
    $blog = Blog::factory()->create();
    $user = User::factory()->create();
    // action
    $comment = Comment::create(["user_id" => $user->id, "blog_id" => $blog->id, "body" => "This is a comment"]);
    // assert
    expect($comment->blog->id == $blog->id)->toBeTrue();
});

