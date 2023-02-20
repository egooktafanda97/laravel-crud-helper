<?php

namespace App\Service\Kernel;

// **** use migration ****************************
use Illuminate\Database\Schema\Blueprint;
use Validator;
use App\Helpers\Helpers;

/** *************************************** */

use App\Service\Kernel\Fx;
use App\Service\Kernel\Modeling;
use App\Service\Kernel\Potion;

/** *************************************** */

use App\Service\lib\Roler;

/** *************************************** */

use App\Service\Panel\Validations;
use App\Service\Panel\Migrations;
use App\Service\Panel\MInsert;
use App\Service\Panel\Mupdate;
use App\Service\Panel\MDelete;
use App\Service\Panel\MRouter;


class Controller
{
    /** MANAGEMENT */
    use Migrations, Validations, Fx, Potion, Roler;
    use Modeling, MInsert, Mupdate, MDelete, MRouter;
    /** END MANAGEMENT */
    public  $num_fatal_error = 500;
    public  $num_validate_error = 402;
    public  $num_query_error = 401;
    public  $num_universal_error = 403;
    public  $num_success = 200;
    public $path_mresource_model = "\Scema\\";
    public $model;

    public $result = false;

    public function __construct($model)
    {
        $tipe = gettype($model);
        $this->model = $tipe == 'string' ? new $model() : new $model;
    }
    public function getResult()
    {
        return $this->result;
    }
}
