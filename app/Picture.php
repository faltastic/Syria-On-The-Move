<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use InterventionImage;
use App\Events\PictureHasBeenCreated;
use App\Http\Requests\Request;

/**
 * @property int $id
 * @property Carbon/Carbon $created_at
 * @property Carbon/Carbon $updated_at
 */
class Picture extends Model
{
    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function location()
    {
        return $this->hasOne(Location::class);
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

    public function addLocation(Request $request)
    {
        $location = new Location();
        $location->picture_id = $this->id;

        $location->getLocation($this, $request);

        $location->save();
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
        $thumb = clone $original;

        $thumb = $thumb->widen($dimension['width']);

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

    public function getThumbnail($identifier)
    {
        return $this->files()->whereIdentifier($identifier)->get()->first();
    }

    public function getUrl()
    {
        return action('PictureController@getIndex', [$this->id]);
    }

    public function getExif()
    {
        $exif = [];

        try {
            $exif = exif_read_data($this->getOriginalFile()->getFilePath());
        } catch (\Exception $e) {
        }

        return $exif;
    }

    public static function random($count)
    {
        return self::limit($count)->get();
    }

    public function scopeByGeoPoint($query, $lat, $lng)
    {
        $query->join('locations', function ($join) {
            $join->on('pictures.id', '=', 'locations.picture_id');
        })
        ->whereBetween('lat', [$lat - .5, $lat + .5])
        ->whereBetween('lng', [$lng - .5, $lng + .5]);
    }

    public function scopeByBoundingBox($query, $lat, $lng, $lat2, $lng2)
    {
        $query->join('locations', function ($join) {
            $join->on('pictures.id', '=', 'locations.picture_id');
        })
        ->whereBetween('lat', [$lat, $lat2])
        ->whereBetween('lng', [$lng, $lng2]);
    }
}
