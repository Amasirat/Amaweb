<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    // count of unique placeholders
    protected $placeholder_limit = 1084;

    public static $featured_count = 10;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function image() {
        return $this->image != null ? url($this->image) :
        (($this->id <= config("app.placeholder_limit")) ?
            'https://unsplash.it/1280/720?image='.$this->id :
            "https://placehold.co/1280x720");
    }
}
