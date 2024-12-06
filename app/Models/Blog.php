<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    static public $featured_count = 10;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
