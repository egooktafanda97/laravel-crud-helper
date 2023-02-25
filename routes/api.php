<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|  TEMPLATING ROUTING
|-------------------------------------------------------------------------- */
use App\Service\provider\Routing;
use Api\Http\Router\RouterRegistry;
/*
|--------------------------------------------------------------------------
*/

// Routing::routs('api'); // default
RouterRegistry::router_modular();
