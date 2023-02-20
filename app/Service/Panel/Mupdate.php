<?php

namespace App\Service\Panel;

use App\Service\Kernel\Potion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

trait Mupdate
{
    use Potion;
    private $resource;
    public $data_result = false;
    public $save = true;
    public function update($request, $id)
    {
        /**
         * .
         * inisiasi data json
         */
        $data = $this->model->fild();
        $this->resource = $data;
        $req = $request->all();
        $model = $this->getNameSpaceModel($this->model->model_name);

        try {
            /**
             * .
             * get data by id model json
             */
            $Q = $model::find($id);

            if (!$Q)
                return [
                    "status" => $this->num_fatal_error,
                    "error" => "something wrong.! data fonud",
                    "msg" => "check id data"
                ];

            if (!$validation = $this->master_validation($data))
                return [
                    "error"  => "resource error from validation data 'create_master_validation' function",
                    "status" => $this->num_validate_error,
                ];

            $x = [];
            foreach ($data as $filds) {
                /**
                 * .
                 * inisiasi variabel
                 */
                if (!empty($request->{$filds["name"]}) && $request->{$filds["name"]} != null && !empty($validation[$filds["name"]])) {
                    $validate = $validation[$filds["name"]];
                    if (!empty($filds["validate_unique"]))
                        $validate = $validation[$filds["name"]] . $filds["validate_unique"] . ',' . $filds["name"] . ',' . $id;
                    $validator = Validator::make([$filds["name"] => $request->{$filds["name"]}], [$filds["name"] => $validate]);
                    if ($validator->fails()) {
                        return [
                            "error"  => $validator->errors(),
                            "status" => 401,
                        ];
                    }

                    $res = $this->tipe_update($filds["type"], $request, $filds);
                    if (!$res)
                        continue;
                    if ($res)
                        $Q->{$filds['name']} = $res;
                }
            }
            if (!empty($this->model->relation()) && count($this->model->relation()) > 0) {
                foreach ($this->model->relation() as $keys => $r) {

                    if ($Q->{$keys} != null) {
                        $relation_main = $this->getDataRelation($keys);

                        $r_data = $this->getFileRelation($relation_main["file_relation"]['file']);

                        if (!$r_valid =  $this->master_validation($r_data->model->fild()))
                            return [
                                "error"  => "resource error from validation data 'create_master_validation' function",
                                "status" => 401,
                            ];

                        foreach ($r_data->model->fild() as $data_relation) {
                            if (!empty($r_valid[$data_relation['name']])) {
                                if (!empty($request->{$data_relation['name']}) && $request->{$data_relation['name']}) {
                                    $roler_validation = $r_valid[$data_relation['name']];
                                    if (!empty($data_relation["validate_uniq"]))
                                        $roler_validation = $r_valid[$data_relation['name']] . ',' . $data_relation["name"] . ',' . $id;
                                    $r_validator = Validator::make([$data_relation["name"] => $request->{$data_relation["name"]}], [$data_relation["name"] => $roler_validation]);
                                    if ($r_validator->fails()) {
                                        return [
                                            "error"  => $r_validator->errors(),
                                            "status" => 401,
                                        ];
                                    }
                                    $r_res = $this->tipe_update($data_relation['type'], $request, $data_relation);
                                    if ($r_res)
                                        $Q->{$keys}->{$data_relation['name']} = $r_res;
                                }
                            }
                        }
                        try {
                            $Q->{$keys}->save();
                        } catch (\Throwable $th) {
                            continue;
                        }
                    }
                }
            }
            $saves =  $Q->save();
            if ($saves) {
                $this->result = $Q;
                return [
                    "data" => $Q,
                    "status" => 201,
                    "msg" => "success updated"
                ];
            }
            /**
             * .
             * jika save gagal
             */
            else {
                return [
                    "status" => 401,
                    "msg" => "something wrong!!!"
                ];
            }
        }
        /**
         * .
         * error server
         */
        catch (\Exception $e) {
            return [
                "error"  => $e->getMessage(),
                "status" => 501
            ];
        }
    }
}
