<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use InterventionImage;
use App\Events\PictureHasBeenCreated;

class Picture extends Model
{
    public function files()
    {
        return $this->hasMany(File::class);
    }

    /**
     * Create a picture by file path.
     *
     * @param string $tmpPath
     */
    public function init($tmpPath)
    {
        $original = InterventionImage::make($tmpPath);

        $file = File::make($this, $original, 'original');

        event(new PictureHasBeenCreated($this));
    }

    public function generateTumbnails()
    {
        $this->generateTumbnail(['width' => 50]);
        $this->generateTumbnail(['width' => 250]);
        $this->generateTumbnail(['width' => 550]);
    }

    /**
     * @todo width / height / crop... do it the real way
     */
    public function generateTumbnail(array $dimension, $crop = false)
    {
        $dimension = array_merge(['width' => null, 'height' => null], $dimension);

        $original = $this->getOriginalFile()->getImage();

        $thumb = $original->widen($dimension['width']);

        $identifier = 'thumb-'.($dimension['width'] ? $dimension['width'] : 'x').'-'.($dimension['height'] ? $dimension['height'] : 'x');

        File::make($this, $thumb, $identifier);
    }

    /**
     * Get the original uploaded file.
     */
    public function getOriginalFile()
    {
        return $this->files()->whereIdentifier('original')->get()->first();
    }
}
