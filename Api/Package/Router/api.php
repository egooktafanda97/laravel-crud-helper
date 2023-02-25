<?php

namespace Api\Package\Router;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class GoogleRouting
{
    public static function routing()
    {
        Route::get('test', function () {
            $r = Storage::disk('google')->put('test.txt', 'Hello World');
            return $r;
        });
        Route::get('put_text', function () {
            $r = Storage::disk('google')->put('test.txt', 'Hello World');
            return $r;
        });
        Route::get('getAllFile', function () {
            return Storage::disk('google')->allFiles('1ea7P9yvUV8HYcGqajDmD7e21HQrQfM5z');
        });

        Route::get('getFile', function () {
            return Storage::disk('google')->get('1ea7P9yvUV8HYcGqajDmD7e21HQrQfM5z');
        });
        Route::get('getFileCloud/{slug}',  [\App\Http\Controllers\GoogleDriveCloud::class, 'getFileCloud']);
    }
}
