<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controller('upload', 'UploadController');

Route::controller('map/{lat}/{lng}/{lat2?}/{lng2?}', 'MapController');

Route::controller('picture/{picture}/{identifier?}', 'PictureController');

Route::controller('/', 'PageController');
