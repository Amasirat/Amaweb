<?php

namespace App\Http\Controllers;

use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File as FileRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Jobs\SendBlogBulkUserMail;
use App\Models\Blog;
use App\Models\Draft;

class DraftController extends Controller
{
    public function index()
    {
        return view("blog.draft.index", [
            "drafts" => Draft::where("active", true)
                ->latest()
                ->orderByDesc("id")
                ->paginate(10)
        ]);
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            "title" => ["required"],
            "body" => ["required"],
            "image" => [FileRule::types(['jpg', 'png', 'webp', 'svg']), 'max:5120']
        ]);

        $draft = Draft::create([
            "title" => $attributes["title"],
            "user_id" => Auth::user()->id,
            "body" => $attributes["body"]
        ]);

        if($request["image"] != null)
        {
            $imagePath = 'drafts/'.$draft->id.'/';
            Storage::disk('public')->put($imagePath, $attributes["image"]);
            $imagePath .= $attributes["image"]->hashName();
            $draft->update(["image" => $imagePath]);
        }

        return redirect('/panel/drafts');
    }

    public function edit(Draft $draft)
    {
        return view("blog.draft.edit", [
            "draft" => $draft
        ]);
    }

    public function update(Request $request, Draft $draft)
    {
        $attributes = $request->validate([
            "title" => ["required"],
            "body" => ["required"],
            "image" => [FileRule::types(['jpg', 'png', 'webp', 'svg']), 'max:5120']
        ]);

        if($request["image"] != null)
        {
            if($draft->image != null)
            {
                AppServiceProvider::delete_image_directory($draft->image);
            }
            $dir = Storage::disk("public")->put("/drafts/".$draft->id, $attributes["image"]);
            $attributes["image"] = $dir;
        }
        $draft->update($attributes);

        return redirect()->back();
    }

    public function turn_to_blog(Request $request, Draft $draft)
    {
        $draft->active = false;
        $draft->save();

        $user = Auth::user();
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

        // Do the uploading of the image
        if($request["image"] != null)
        {
            $imagePath = [
                "directory" => 'blogs/'.$blog->id.'/',
                "filename" => $attributes["image"]->hashname()];

            Storage::disk('public')->put($imagePath["directory"], $attributes["image"]);

            // remove draft image from storage if it exists
            if($draft->image != null)
            {
                AppServiceProvider::delete_image_directory($draft->image);
            }
        }
        else if ($draft["image"] != null)
        {
            $imagePath = Draft::move_image_to_blog($draft->image, "/blogs/".$blog->id);
            $draft->update(["image" => null]);
        }
        else
        {
            $imagePath = null;
        }

        if($imagePath != null)
        {
            $imageDirectory = $imagePath["directory"]."/".$imagePath["filename"];
            $blog->update(["image" => 'storage/'.$imageDirectory]);
        }

        SendBlogBulkUserMail::dispatch();

        return redirect("/blogs/".$blog->id);
    }

    public function destroy(Draft $draft)
    {
        Draft::delete_draft($draft);
        return redirect('/panel/drafts');
    }
}
