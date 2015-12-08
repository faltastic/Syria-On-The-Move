<?php

namespace App\Http\Controllers;

class PictureController extends Controller
{
    public function getIndex($picture, $identifier)
    {
        $file = $picture->files()->whereIdentifier($identifier)->get()->first();

        return $file->response();
    }
}
