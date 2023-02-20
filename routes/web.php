<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    $r = \Storage::disk('google')->put('test.txt', 'Hello World');
    return $r;
});


Route::get('put_text', function () {
    $r = \Storage::disk('google')->put('test.txt', 'Hello World');
    return $r;
});


Route::get('getAllFile', function () {
    return Storage::disk('google')->allFiles('1ea7P9yvUV8HYcGqajDmD7e21HQrQfM5z');
});


Route::get('getFile', function () {
    return Storage::disk('google')->get('1ea7P9yvUV8HYcGqajDmD7e21HQrQfM5z');
});

// http://127.0.0.1:8000/getFileCloud/89RFeMFpbfVx2cbU1675444983.jpg
Route::get('getFileCloud/{slug}',  [\App\Http\Controllers\GoogleDriveCloud::class, 'getFileCloud']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
