<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Draft;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Blog::factory(10)->create();
        Comment::factory(10)->create();
        Draft::factory(3)->create();
    }
}
