<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Picture;

class UploadController extends Controller
{
    public function getIndex()
    {
        return view('picture.upload');
    }

    public function postIndex(UploadRequest $request)
    {
        $orginal = $request->file('picture');

        $picture = new Picture();

        $picture->save();

        $tempname = uniqid('sotm-').'.'.$orginal->getClientOriginalExtension();

        $orginal->move('/tmp', $tempname);

        $picture->init("/tmp/$tempname");

        $picture->addLocation($request);
    }
}
