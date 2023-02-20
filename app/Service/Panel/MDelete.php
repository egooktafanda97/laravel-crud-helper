<?php

namespace App\Service\Panel;

trait MDelete
{
    public function deleted($id)
    {
        try {
            $model = $this->getNameSpaceModel($this->model->model_name);
            $relation = $this->model->relation();
            $deletes = $model::find($id);

            if (!$deletes)
                return [
                    "status" => $this->num_universal_error,
                    "error" => "something wrong.! data fonud",
                    "msg" => "check id data"
                ];
            if (count($relation) > 0)
                foreach ($relation as  $f => $func) {
                    if (!empty($func['delete']) && $func['delete'] == true) {
                        $deletes->{$f}()->delete();
                    }
                }
            $deleted =  $deletes->delete();
            if ($deleted) {
                return [
                    "data" => $deletes,
                    "status" => 200,
                    "msg" => "delete success!"
                ];
            }
        }
        /**
         * .
         * error server
         */
        catch (\Exception $e) {
            return [
                "error"  => json_encode($e->getMessage(), true),
                "status" => 501
            ];
        }
    }
}
