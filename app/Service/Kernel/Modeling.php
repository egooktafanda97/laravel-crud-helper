<?php

namespace App\Service\Kernel;

trait Modeling
{
    public function getFild()
    {
        $data = $this->model->fild();
        $arr = [];
        foreach ($data as  $value) {
            array_push($arr, $value['name']);
        }
        return $arr;
    }
    public function getModel()
    {
        return $this->model->model_location . $this->model->model_name;
    }
}
