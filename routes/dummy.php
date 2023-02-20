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

Route::get('/data/{name}', function ($name) {
    $data = new \Scema\Instansi();
    return $data->fild();
});

Route::get('/relation/{name}', function ($name) {
    $data = new \Scema\Instansi();
    return $data->relation();
});

Route::get('/router/{name}', function ($name) {
    $data = new \Scema\Instansi();
    return $data->api_router();
});

Route::get('/http_request/{name}', function ($name) {
    $data = new \Scema\Instansi();
    return $data->http_request();
});

Route::get('/template_migration/{name}', function ($name) {
    $data = new \App\Service\Classes\Document();
    return $data->getTemplateMigration();
});

Route::get('/doc', function () {
    return view('documentation.index');
});
