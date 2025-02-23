<?php

namespace App\Jobs;

use App\Mail\BlogPosted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendBlogBulkUserMail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        DB::table("users")->where(["notify" => true])->orderBy('id')->chunk(100, function ($users) {
                foreach($users as $user) {
                    if($user->email_verified_at != null)
                    {
                        Mail::to($user)->send(
                            new BlogPosted()
                        );
                    }
                }
        });
    }
}
