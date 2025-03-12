<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Draft;

class DeleteInactiveDrafts implements ShouldQueue
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
        $inactive_drafts = Draft::where("active", false)->get();

        foreach($inactive_drafts as $draft)
        {
            Draft::delete_draft($draft);
        }
    }
}
