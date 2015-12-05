<?php

namespace App\Events;

use App\Picture;
use Illuminate\Queue\SerializesModels;

class PictureHasBeenCreated extends Event
{
    use SerializesModels;

    public $picture;

    /**
     * Create a new event instance.
     */
    public function __construct(Picture $picture)
    {
        $this->picture = $picture;
    }
}
