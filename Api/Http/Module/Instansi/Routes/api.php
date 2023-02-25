<?php

namespace Api\Http\Module\Instansi\Routes;

use App\Service\provider\Routing;
use Api\Http\Module\Instansi\Scema\init;

class Api
{
    public static function routing()
    {
        Routing::ModularRouting(init::modeling_routing());
    }
}
