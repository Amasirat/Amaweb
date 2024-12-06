<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->orderByDesc("id")->paginate();
        return view("blog.index", [
            "blogs" => $blogs
        ]);
    }

    public function show(Blog $blog)
    {
        return view("blog.show", [
            "blog" => $blog
        ]);
    }

    public function create(Request $request)
    {
        return view("blog.create", [
            "user" => $request->user()
        ]);
    }

    public function store(Request $request)
    {
        $user = $request->user();
        // validate
        $attributes = $request->validate([
            "title" => ["required"],
            "body" => ["required"],
        ]);

        $image = null;

        Blog::create([
            "title" => $attributes["title"],
            "body" => $attributes["body"],
            "user_id" => $user->id,
            "image" => $image
        ]);
    }

    public function edit()
    {

    }

    public function destroy()
    {

    }
}
