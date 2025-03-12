<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Validation\Rules\File as FileRule;
use Illuminate\Support\Facades\Storage;
use App\MarkDownService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Jobs\SendBlogBulkUserMail;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()
            ->orderByDesc("id")
            ->paginate(10);
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

    public function edit(Blog $blog)
    {
        return view("blog.edit", [
            "blog" => $blog
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        dd($request);
        // validate
        $attributes = $request->validate([
            "title" => ["required"],
            "body" => ["required"],
            "image" => [FileRule::types(['jpg', 'png', 'webp', 'svg']), 'max:5120']
        ]);

        $blog = Blog::create([
            "title" => $attributes["title"],
            "body" => $attributes["body"],
            "user_id" => $user->id,
        ]);

        // TODO: some images for some reason fail to upload. Get to the bottom of that
        if($request->image != null)
        {
            $imagePath = 'blogs/'.$blog->id.'/';
            Storage::disk('public')->put($imagePath, $attributes["image"]);
            $imagePath .= $attributes["image"]->hashName();
            $blog->update(["image" => 'storage/'.$imagePath]);
        }

        SendBlogBulkUserMail::dispatch();

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

    public function update(Request $request, Blog $blog)
    {
        $attributes = $request->validate([
            "title" => ["required"],
            "body" => ["required"],
        ]);

        $blog->update($attributes);

        return redirect('/blogs/'.$blog->id);

    }
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect('/blogs');
    }
}
