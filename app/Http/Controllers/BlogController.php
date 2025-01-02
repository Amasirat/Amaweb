<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Validation\Rules\File as FileRule;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\MarkDownService;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->orderByDesc("id")->paginate(10);
        return view("blog.index", [
            "blogs" => $blogs
        ]);
    }

    public function show(Blog $blog)
    {
        $blog->body = MarkDownService::parse($blog->body);
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
            "image" => [],
            // "image" => [FileRule::types(['jpg', 'png', 'webp'])]
        ]);

        if($request->image == null)
            $imagePath = null;
        else
        {
            $imagePath = $attributes["image"]->store('blogs');
        }

        Blog::create([
            "title" => $attributes["title"],
            "body" => $attributes["body"],
            "user_id" => $user->id,
            "image" => $imagePath
        ]);

        return redirect("/blogs");
    }

    public function search(Request $request)
    {
        $found_blogs = Blog::query()
        ->where('title', 'like','%'.$request['search_string'].'%')
        ->get();

        return view("blog.results", [
            "blogs" => $found_blogs
        ]);
    }

    public function edit(Blog $blog)
    {
        return view("blog.edit", [
            "blog" => $blog
        ]);
    }

    public function destroy()
    {

    }
}
