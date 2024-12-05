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
        $blogs = Blog::all();
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

    public function store()
    {

    }

    public function edit()
    {

    }

    public function destroy()
    {

    }
}
