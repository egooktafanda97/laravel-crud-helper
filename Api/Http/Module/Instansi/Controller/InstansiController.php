<?php

namespace Api\Http\Module\Instansi\Controller;

use Illuminate\Http\Request;
use App\Service\Polymorphism\MControllers;
use App\Http\Controllers\Controller;
use Api\Http\Module\Instansi\Scema\init;
use App\Service\Traits\CrudTemplating;

class InstansiController extends Controller implements MControllers
{
    use CrudTemplating;
    public $scema;
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
        $this->scema = init::InitScema();
    }
    public function getWhere($id)
    {
        $result =  $this->getAllWhere(function ($query) use ($id) {
            $query->where("id", $id);
        });
        return response()->json($result);
    }
    public function getTemp()
    {
        $get = $this->scema->get_all_temp();
        return response()->json($get, 200);
    }
}
