<?php

namespace App\Listeners;

use App\Events\PictureHasBeenCreated;
use Illuminate\Contracts\Queue\ShouldQueue;

class PictureGenerateThumbnails implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param PictureHasBeenCreated $event
     */
    public function handle(PictureHasBeenCreated $event)
    {
        $event->picture->generateTumbnails();
    }
}
