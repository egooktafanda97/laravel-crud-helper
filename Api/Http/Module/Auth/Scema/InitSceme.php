<?php

namespace Api\Http\Module\Instansi\Scema;

use App\Service\Classes\Models;
use Scema\Users;

class InitSceme extends Users
{
    public function __construct()
    {
        parent::__construct();
    }
    public function api_router(): array
    {
        $rout_parent = parent::api_router();
        $addRouting =  [];
        return array_merge($rout_parent, $addRouting);
    }
}
