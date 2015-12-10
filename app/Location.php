<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\Request;
use Geocoder\Provider\GoogleMaps;
use Ivory\HttpAdapter\CurlHttpAdapter;

/**
 * @property int $id
 * @property int $picture_id
 * @property float $lat
 * @property float $lng
 * @property Carbon/Carbon $created_at
 * @property Carbon/Carbon $updated_at
 */
class Location extends Model
{
    public function picture()
    {
        return $this->belongsTo(Picture::class);
    }

    public function getByExif(Picture $picture)
    {
        $exif = $picture->getExif();

        if (isset($exif['SectionsFound']) && @strpos($exif['SectionsFound'], 'GPS')) {
            try {
                $lat = $this->getGps($exif['GPSLatitude']);
                $lng = $this->getGps($exif['GPSLongitude']);

                if ($lat && $lng) {
                    $this->getByLatLng($lat, $lng);

                    return true;
                }
            } catch (\Exception $e) {
                return false;
            }
        }

        return false;
    }

    public function getByLatLng($lat, $lng)
    {
        $lat = (float) str_replace(',', '.', $lat);
        $lng = (float) str_replace(',', '.', $lng);

        $this->lat = $lat;
        $this->lng = $lng;

        return true;
    }

    public function getByQ($q)
    {
        try {
            $address = $this->geocode($q);
            $this->lat = $address->getLatitude();
            $this->lng = $address->getLongitude();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    public function getLocation(Picture $picture, Request $request)
    {
        if (!empty($request->q)) {
            $this->getByQ($request->q);
        } elseif (!empty($request->lat) && !empty($request->lat)) {
            $this->getByLatLng($request->lat, $request->lng);
        }

        if ($this->lat === null || $this->lng === null) {
            $this->getByExif($picture);
        }
    }

    public function geocoder()
    {
        $curl = new CurlHttpAdapter();
        $geocoder = new GoogleMaps($curl);

        return $geocoder;
    }

    private function geocode($query)
    {
        return $this->geocoder()->limit(1)->geocode($query)->first();
    }

    private function reverse($lat, $lng)
    {
        return $this->geocoder()->limit(1)->reverse($lat, $lng)->first();
    }

    private function getGps(array $exifCoord, $ref = null)
    {
        $degrees = count($exifCoord) > 0 ? $this->gps2Num($exifCoord[0]) : 0;
        $minutes = count($exifCoord) > 1 ? $this->gps2Num($exifCoord[1]) : 0;
        $seconds = count($exifCoord) > 2 ? $this->gps2Num($exifCoord[2]) : 0;

        //normalize
        $minutes += 60 * ($degrees - floor($degrees));
        $degrees = floor($degrees);

        $seconds += 60 * ($minutes - floor($minutes));
        $minutes = floor($minutes);

        if ($seconds >= 60) {
            $minutes += floor($seconds / 60.0);
            $seconds -= 60 * floor($seconds / 60.0);
        }

        if ($minutes >= 60) {
            $degrees += floor($minutes / 60.0);
            $minutes -= 60 * floor($minutes / 60.0);
        }

        $gps = $degrees + $minutes / 60 + $seconds / 3600;

        if ($ref == 'N' || $ref == 'E' || $ref == null) {
            return $gps;
        } elseif ($ref == 'S' || $ref == 'W') {
            return $gps * -1;
        } else {
            return;
        }
    }

    private function gps2Num($coordPart)
    {
        $parts = explode('/', $coordPart);

        if (count($parts) <= 0) {
            return 0;
        }

        if (count($parts) == 1) {
            return $parts[0];
        }

        return floatval($parts[0]) / floatval($parts[1]);
    }
}
