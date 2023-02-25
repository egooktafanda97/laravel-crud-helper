<?php

namespace Api\Http\Module\Instansi\Scema;

use App\Service\Classes\Models;
use Scema\Instansi;

class InitSceme extends Instansi
{
    public function __construct()
    {
        parent::__construct();
    }
    public function api_router(): array
    {
        $rout_parent = parent::api_router();
        $addRouting =  [
            "getWhere" => [
                "method" => "get",
                "router" => "/getwhere/{id}",
                "prefix" => "instansi",
                "middleware" =>  ["api", "role:admin"],
                "controller" => $this->controller_location . $this->controller,
            ]
        ];
        return array_merge($rout_parent, $addRouting);
    }
}
