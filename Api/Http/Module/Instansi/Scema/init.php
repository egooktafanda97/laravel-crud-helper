<?php

namespace Api\Http\Module\Instansi\Scema;

use App\Service\Kernel\Controller;

class init
{
    public static function InitScema()
    {
        $instance = new Controller(InitSceme::class);
        return $instance;
    }
    public static function  modeling_routing()
    {
        $scematic = self::InitScema();
        $scematic->initRouter('api');
        return $scematic->getInstanceRouter();
    }
}
