<?php

namespace Api\Http\Module\Auth\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Api\Http\Module\Auth\Controller\AuthController;
use Api\Http\Module\Auth\Controller\ResetPasswordController;

class Api
{
    public static function routing()
    {
        // !======================= AUTH CONTROLLER =====================================
        Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
            Route::post('/login', [AuthController::class, 'login']);
            Route::post('/logout', [AuthController::class, 'logout']);
            Route::get('/refresh', [AuthController::class, 'refresh']);
            Route::get('/refresh', [AuthController::class, 'refresh']);
        });
        // !======================= RESET PASSWORD CONTROLLER =====================================
        Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
            Route::post('send-email-reset-password', [ResetPasswordController::class, 'sendLink']);
            Route::post('reset-pwd', [ResetPasswordController::class, 'reset_pwd']);
        });
    }
}
