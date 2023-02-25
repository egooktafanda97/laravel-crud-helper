<?php

namespace App\Service\provider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Service\provider\ServiceConfig;

class Routing extends ServiceConfig
{
    public static function routs($rType)
    {
        $r = self::instanceRouter($rType);
        foreach ($r as $v_r) {
            if (!$v_r)
                continue;
            foreach ($v_r as $v_source) {
                Route::group([
                    'middleware' => $v_source['middleware'],
                    'prefix' => $v_source['prefix'],
                ], function ($router) use ($v_source) {
                    foreach ($v_source['rute'] as  $y) {
                        Route::{$y['method']}($y['rout'], [$y['class'], $y['function']]);
                    }
                });
            }
        }
    }
    public static function ModularRouting($instanceRouter)
    {
        foreach ($instanceRouter as $v_source) {
            Route::group([
                'middleware' => $v_source['middleware'],
                'prefix' => $v_source['prefix'],
            ], function ($router) use ($v_source) {
                foreach ($v_source['rute'] as  $y) {
                    Route::{$y['method']}($y['rout'], [$y['class'], $y['function']]);
                }
            });
        }
    }
}
