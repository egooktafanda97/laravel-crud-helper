<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Service\provider\Routing;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Routing::routs('api');

// Route::post('uploaded', [\App\Http\Controllers\GoogleDriveCloud::class, 'putImage']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
