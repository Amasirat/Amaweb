<?php

namespace App\Http\Controllers;

use App\Mail\CommentPosted;
use App\Mail\ReplyPosted;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Mail;
use function Filament\authorize;

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
                        // Store in table
        }

        // If comment is a reply
        if($request["comment_id"] != null)
        {
            $attribute = array_merge($attribute, [
                "comment_id" => $request["comment_id"]
            ]);
            // for some god knows why reason the parent() function in the comment model does not return the comment's parent,
            // so this horribleness is done as a result. god forsake me for I have sinned and fell into the tempetations of the devil
            $parent_comment = Comment::findOrFail($attribute["comment_id"]);
            $parent_name = $parent_comment->user != null ? $parent_comment->user->username : $parent_comment->guest_name;

            $new_body = "[@".$parent_name."](#) ".$attribute["body"];
            $attribute["body"] = $new_body;
            if($parent_comment->user != null && $parent_comment->user->email_verified_at != null)
            // queue email to the parent comment (if applicable and verified)
                if($parent_comment->user->notify != false)
                    Mail::to($parent_comment->user)->queue(
                        new ReplyPosted()
                    );
        }
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
