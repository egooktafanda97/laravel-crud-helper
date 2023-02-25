<?php

namespace App\Api\Providers\RouteServiceProvider;

use Illuminate\Support\Facades\Route;

class RouteServiceProvider
{
    public static function Routes()
    {
        Route::prefix('api/v1')
            ->middleware('api')
            ->namespace('\App\Api\Module\V1\\')
            ->group(app_path('Api/Module/V1/'));
    }
}
