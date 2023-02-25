<?php

namespace Api\App;

class Kernel
{
    public function database()
    {
        return  [
            "V1" => [
                "database" => false, // "path",
                "router" => false,
                "scema" => false,
                "module" => false
            ]
        ];
    }
    public static function namespace()
    {
        return  [
            "Http" => [
                "base" => "\Api\Http\\",
                "Module" => false, //"\Api\Http\Module\\"
                "Routing" => false, // "\Api\Http\Routing\\"
                "Scema" => false, // "\Api\Http\Scema\\"
            ]
        ];
    }
}
