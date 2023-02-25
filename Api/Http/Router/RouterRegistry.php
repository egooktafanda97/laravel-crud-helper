<?php

namespace Api\Http\Router;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Api\Http\Module\Auth\Controller\AuthController;

class RouterRegistry
{
    public static function router_modular()
    {
        \Api\Http\Module\Auth\Routes\Api::routing();
        \Api\Http\Module\Instansi\Routes\Api::routing();
    }
}
