<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Auth;
use App\Models\User;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Auth::user()->comments;
        return view("user.comments", [
            "comments" => $comments
        ]);
    }
    public function store(Request $request, Blog $blog)
    {
        // Validate
        $attribute = null;
        if($request["guest_name"] != null && $request["email"] != null)
        {
            $attribute = $request->validate([
                "guest_name" => ["required"],
                "email" => ["required"],
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
    public function edit()
    {

    }
    public function destroy()
    {

    }
}
