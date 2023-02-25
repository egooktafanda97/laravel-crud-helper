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
                $this->result = [
                    "delete" => $deleted,
                    "data" => $deletes,
                ];
                return [
                    "data" => $deletes,
                    "status" => 200,
                    "msg" => "delete success!"
                ];
            } else {
                return [
                    "data" => $deletes,
                    "status" => 401,
                    "msg" => "delete error!"
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
    public function restore($id)
    {
        try {
            $model = $this->getNameSpaceModel($this->model->model_name);
            $relation = $this->model->relation();
            $restore = $model::find($id);

            if (!$restore)
                return [
                    "status" => $this->num_universal_error,
                    "error" => "something wrong.! data fonud",
                    "msg" => "check id data"
                ];
            if (count($relation) > 0)
                foreach ($relation as  $f => $func) {
                    $restore->{$f}()->withTrashed()->restore();
                }
            $rest =  $restore->withTrashed()->restore();
            if ($rest) {
                $this->result = [
                    "restore" => $rest,
                    "data" => $restore,
                ];
                return [
                    "data" => $restore,
                    "status" => 200,
                    "msg" => "restore success!"
                ];
            } else {
                return [
                    "data" => $restore,
                    "status" => 401,
                    "msg" => "restore error!"
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

    public function get_all_temp()
    {
        try {
            $model = $this->getNameSpaceModel($this->model->model_name);
            $relation = $this->model->relation();
            $withTrashed = $model::withTrashed()->get();
            return $withTrashed;
            if (!$withTrashed)
                return [
                    "status" => $this->num_universal_error,
                    "error" => "something wrong.! data fonud",
                    "msg" => "check id data"
                ];
            if (count($relation) > 0)
                $withTrashed  =  $withTrashed->with($this->getListRelationName())->withTrashed()->restore();

            $withTrashed =  $withTrashed->get();
            if ($withTrashed) {
                $this->result = $withTrashed;
                return [
                    "data" => $withTrashed,
                    "status" => 200,
                    "msg" => "delete success!"
                ];
            } else {
                return [
                    "data" => $withTrashed,
                    "status" => 401,
                    "msg" => "delete error!"
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
