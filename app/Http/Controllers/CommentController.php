<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $pagination = 5;
        $comments = Auth::user()->comments->reverse();
        return view("user.comments", [
            "comments" => $comments
        ]);
    }
    public function store(Request $request, Blog $blog)
    {
        // Validate
        $attribute = null;
        if($request["guest_name"] != null)
        {
            $attribute = $request->validate([
                "guest_name" => ["required"],
                "body" => ["required"],
            ]);
            $attribute = array_merge($attribute, ["blog_id" => $blog->id]);
        }
        else
        {
            $attribute = $request->validate([
                "body" => ["required"],
            ]);
            $attribute= array_merge($attribute, ["blog_id" => $blog->id,
                "user_id" => $request->user() != null ? $request->user()->id : null]);
        }
        // Store in table
        Comment::create($attribute);
        return redirect("/blogs/$blog->id");
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            "edited" => ["required"],
            // this is for finding comment in database
            // given by a hidden textarea inside the view
            "comment_id" => ["required"]
        ]);
        $comment = Comment::findOrFail((int)$request["comment_id"]);

        $comment->update(['body' => $validated["edited"]]);

        return redirect()->back();
    }
    public function destroy()
    {

    }
}
