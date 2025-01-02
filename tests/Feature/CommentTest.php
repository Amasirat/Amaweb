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

test("non-reply comment has null parent", function () {
    $comment = Comment::factory()->create();

    expect($comment->parent == null)->toBeTrue();
});

test("reply comment has correct parent", function () {
    $comment = Comment::factory()->create();

    $reply = Comment::create([
        "user_id" => User::factory()->create()->id,
        "body" => "Text",
        "blog_id" => $comment->blog->id,
        "comment_id" => $comment->id
    ]);
    // for some reason checking for object equality does not work
    // however their ids are the same so we can assume test to be successful
    // if that is true
    expect($reply->comment->id === $comment->id)->toBeTrue();
});

test("second reply comment has correct parent", function () {
    $comment = Comment::factory()->create();

    $reply = Comment::create([
        "user_id" => User::factory()->create()->id,
        "body" => "Text",
        "blog_id" => $comment->blog->id,
        "comment_id" => $comment->id
    ]);

    $reply2 = Comment::create([
        "user_id" => User::factory()->create()->id,
        "body" => "Text2",
        "blog_id" => $comment->blog->id,
        "comment_id" => $comment->id
    ]);
    // for some reason checking for object equality does not work
    // however their ids are the same so we can assume test to be successful
    // if that is true
    expect($reply2->comment->id === $comment->id)->toBeTrue();
});

test("comment has correct child count", function () {
    $comment = Comment::factory()->create();

    $reply = Comment::create([
        "user_id" => User::factory()->create()->id,
        "body" => "Text",
        "blog_id" => $comment->blog->id,
        "comment_id" => $comment->id
    ]);
    expect(count($comment->children) == 1)->toBeTrue();
});

test("comment has correct children count", function () {
    $comment = Comment::factory()->create();

    $reply = Comment::create([
        "user_id" => User::factory()->create()->id,
        "body" => "Text",
        "blog_id" => $comment->blog->id,
        "comment_id" => $comment->id
    ]);

    $reply2 = Comment::create([
        "user_id" => User::factory()->create()->id,
        "body" => "Text2",
        "blog_id" => $comment->blog->id,
        "comment_id" => $comment->id
    ]);
    expect(count($comment->children) == 2)->toBeTrue();
});

test("comment has 0 children count", function () {
    $comment = Comment::factory()->create();

    expect(count($comment->children) == 0)->toBeTrue();
});
