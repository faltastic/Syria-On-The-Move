<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapRequest;
use App\Picture;
use App\Mapper\PictureMapMapper;

class MapController extends Controller
{
    public function getIndex(MapRequest $request, $lat = null, $lng = null, $lat2 = null, $lng2 = null)
    {
        $pictures = collect([]);

        if ($lat2 === null) {
            $pictures = Picture::byGeoPoint($lat, $lng)->get();
        } else {
            $pictures = Picture::byBoundingBox($lat, $lng, $lat2, $lng2)->get();
        }

        return response()->json((new PictureMapMapper($pictures))->getItems());
    }
}
