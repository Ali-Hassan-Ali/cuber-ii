<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploadVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $video ;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($video)
    {
        $video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

            $image = $this->video;
            $imageName =$this->video . '.' . $image->getClientOriginalExtension();
            $this->video->file('video')->move('uploads/video/cybers', $imageName);


    }
}
