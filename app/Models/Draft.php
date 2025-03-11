<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    /** @use HasFactory<\Database\Factories\DraftFactory> */
    use HasFactory;

    protected $guarded = [];

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
