<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Comment;
use App\Models\User;
use App\Models\Blog;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable();
            $table->foreignIdFor(Blog::class)->constrained()->cascadeOnDelete();
            $table->text("body");
            // represents the comment being a reply, id of its parent goes here
            // if null then it is not a reply
            $table->foreignIdFor(Comment::class)->nullable();
            $table->string("guest_name")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
