<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Parsedown;
use App\MarkDownService;
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
        $mdService = new MarkDownService(new Parsedown());
        $blog->body = $mdService->parse($blog->body);
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
        $user = Auth::user();
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

        return redirect("/blogs");
    }

    public function edit()
    {

    }

    public function destroy()
    {

    }
}
