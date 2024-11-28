<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    public function store(Request $request, User $user, Blog $blog)
    {
        // Validate
        dd($request->merge(["user_id" => $user->id, "blog_id" => $blog->id]));

        if($request["user_id"] == null)
        {

        }
        // Store in table
    }
    public function edit()
    {

    }
    public function destroy()
    {

    }
}
