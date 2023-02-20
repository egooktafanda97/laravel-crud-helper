<?php

namespace App\Service\Traits;

use Rocky\Eloquent\HasDynamicRelation;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

trait ManagementModel
{
    use HasDynamicRelation;
    use LogsActivity;

    /**
     * .
     * function create relationship
     * @return void
     */
    public function initial_function_relationship($model, $instace)
    {
        if ($instace->model->relation()) {
            foreach ($instace->model->relation() as $f_model => $model_name) {
                $RelationShip = $instace->getRelationByMethod($model_name);
                if ($RelationShip) {
                    $model->addDynamicRelation($f_model, function ($this_model) use ($RelationShip) {
                        return $this_model->{$RelationShip["relation"]}($RelationShip["model"], $RelationShip["foreign"]);
                    });
                }
            }
        }
    }


    public function getActivitylogOptions()
    {
        return LogOptions::defaults();
    }
}
