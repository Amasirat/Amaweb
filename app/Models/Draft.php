<?php

namespace App\Models;

use App\Providers\AppServiceProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Draft extends Model
{
    /** @use HasFactory<\Database\Factories\DraftFactory> */
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function image() {
        return $this->image != null ? Storage::url($this->image) :
        (($this->id <= config("app.placeholder_limit")) ?
            'https://unsplash.it/1280/720?image='.$this->id :
            "https://placehold.co/1280x720");
    }

    public static function move_image_to_blog(string $draftDirectory, string $blogDirectory)
    {
        $draftExplosion = explode("/", $draftDirectory);
        $length = count($draftExplosion);
        if($length <= 0)
        {
            throw new \Exception("draft->image had invalid directory");
        }
        $filename = $draftExplosion[$length-1];
        $stream = Storage::disk("public")->readStream($draftDirectory);
        $blogImagePath = AppServiceProvider::join_path($blogDirectory, $filename);
        if(! Storage::disk("public")->writeStream($blogImagePath, $stream))
        {
            throw new \Exception("Failed to upload blog image from draft");
        }

        AppServiceProvider::delete_image_directory($draftDirectory);

        return [
            "directory" => $blogDirectory,
            "filename" => $filename
        ];
    }

    public static function delete_draft(Draft $draft)
    {
        if($draft["image"] != null)
        {
            AppServiceProvider::delete_image_directory($draft->image);
        }

        $draft->delete();
    }
}
