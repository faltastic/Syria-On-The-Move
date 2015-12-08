<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Image;
use File as Filesystem;
use InterventionImage;
use Illuminate\Http\Response;

class File extends Model
{
    public static $dir = 'pictures/';

    /**
     * One to many relation with Picture.
     */
    public function picture()
    {
        return $this->belongsTo(Picture::class);
    }

    /**
     * Save file to database and to our filesystem.
     */
    public static function make(Picture $picture, Image $image, $identifier)
    {
        $file = new self();

        $file->picture_id = $picture->id;
        $file->identifier = $identifier;

        $file->mime = $image->mime();
        $file->extension = $image->extension;

        $file->width = $image->width();
        $file->height = $image->height();

        self::checkDirPermission();

        $image->save($file->getFilePath());

        $file->save();
    }

    public function getFileName()
    {
        return implode('-', [$this->picture_id, $this->identifier]).'.'.$this->extension;
    }

    public function getRelativeFilePath()
    {
        return 'app/'.self::$dir.$this->getFileName();
    }

    public function getFilePath()
    {
        return storage_path($this->getRelativeFilePath());
    }

    public function getUrl()
    {
        return action('PictureController@getIndex', [$this->picture->id, $this->identifier]);
    }

    public function getImage()
    {
        return file_exists($this->getFilePath()) ? InterventionImage::make($this->getFilePath()) : null;
    }

    public function response()
    {
        return InterventionImage::make($this->getFilePath())->response();
    }

    public static function checkDirPermission()
    {
        $dirPath = storage_path('app/'.self::$dir);

        if (!Filesystem::exists($dirPath)) {
            Filesystem::makeDirectory($dirPath, 0774);
        }
    }
}
