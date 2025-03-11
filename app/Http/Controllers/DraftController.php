<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File as FileRule;
use Illuminate\Support\Facades\Auth;
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

        Draft::create([
            "title" => $attributes["title"],
            "user_id" => Auth::user()->id,
            "body" => $attributes["body"]
        ]);

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
        ]);

        $draft->update($attributes);

        return redirect()->back();
    }

    public function turn_to_blog(Draft $draft)
    {
    }

    public function destroy(Draft $draft)
    {
        $draft->delete();

        return redirect('/panel/drafts');
    }
}
