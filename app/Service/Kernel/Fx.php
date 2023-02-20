<?php

namespace App\Service\Kernel;

use App\Helpers\Helpers;
use Illuminate\Support\Facades\Validator;
use App\Service\Kernel\Potion;
use App\Service\Panel\RelationInsert;

trait Fx
{
    use Potion;
    use RelationInsert;
    public function getResourceModel($class)
    {
        return $this->path_mresource_model . $class;
    }
    /**
     * .
     * get data relation
     * @return void
     */
    public function getDataRelation($table)
    {
        $model = $this->model;
        if (count($model->relation()) == 0)
            return false;
        if (!empty($table))
            return $model->relation()[$table];
        return $model->relation();
    }
    public  function getNameSpaceModel($class = null)
    {
        return $this->model->model_location . $class;
    }

    public function getFileRelation($class)
    {
        $hub =  new Controller($this->getResourceModel($class));
        if (!$hub)
            return false;
        return $hub;
    }

    public function getRelationByMethod($met)
    {
        $mod = $this->getNameSpaceModel($met["model"]);
        $func = $met;
        if (!empty($met["namespace"]))
            $mod = $met["namespace"] . $met["model"];
        $func["model"] = $mod;
        return $func;
    }
    public function getListRelationName()
    {
        $model = $this->model->relation();
        return array_keys($model);
    }
}
