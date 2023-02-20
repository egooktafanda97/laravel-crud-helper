<?php

namespace App\Service\Panel;

use App\Service\Kernel\Potion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

trait MInsert
{
    use Potion;
    private $resource;
    public $save = true;
    public function insert($request)
    {
        /** 
         * ===================
         *  */
        $data = $this->model->fild();
        $this->resource = $data;
        $req = $request->all();

        if (!$validation = $this->master_validation($data)) {
            return [
                "error"  => "resource error from validation data 'create_master_validation' function",
                "status" => $this->num_validate_error,
            ];
        }
        /** 
         * ===================
         *  */
        $validator = Validator::make($req, $validation);
        if ($validator->fails()) {
            return [
                "error"  => $validator->errors(),
                "result" => $data,
                "status" => $this->num_validate_error,
            ];
        }
        /** 
         * ===================
         *  */
        $object_create =  $this->run_data($request, $data);
        if (!empty($object_create['error']))
            return $object_create;
        $result_data = $object_create['result'];
        if (!empty($result_data['error']))
            return $result_data;
        if (!$result_data)
            return [
                "status" => $this->num_validate_query,
                "response" => $result_data,
                "error" => 'something wrong..!'
            ];
        /** 
         * ===================
         *  */

        if ($this->save == true) {
            $new_data = [];
            foreach ($data as $ky => $va) {
                $new_data[$va['name']] = $va;
            }
            DB::beginTransaction();
            try {
                foreach ($result_data as $k => $d) {
                    if (array_key_exists('type', $new_data[$k]) && array_key_exists('control_insert', $new_data[$k])) {
                        if ($new_data[$k]['type'] == 'key' && $new_data[$k]['control_insert'] == 'before') {
                            $child_obj = $object_create['object'] ?? [];
                            if (count($child_obj) == 0)
                                continue;
                            $child_obj = $child_obj[$new_data[$k]['relation']['relation_index']];
                            $index_relation = $this->getDataRelation($new_data[$k]['relation']['relation_index']);
                            $models = $child_obj->getNameSpaceModel($index_relation['model']);
                            $ins = new $models($result_data[$k]);
                            $ins->save();
                            $result_data[$k] = $ins->id;
                        }
                    }
                }

                $modeling = $this->getNameSpaceModel($this->model->model_name);
                $inserts = new $modeling($result_data);
                $inserts->save();
                $gate = $modeling::where('id', $inserts->id);
                //  belum selesai
                if (count($this->getListRelationName()) > 0) {
                    $gate = $gate->with($this->getListRelationName());
                }
                $gate = $gate->first();
                DB::commit();
                if ($result_data) {
                    $dataName = $this->model->name ?? "";
                    $this->result = $gate;
                    return [
                        "status" => $this->num_success,
                        "data" => $gate,
                        "msg" => "data " . $dataName . " successfully input."
                    ];
                } else {
                    return [
                        "status" =>  $this->num_fatal_error,
                        "error" => 'something wrong insert error..! ',
                        "data" => $result_data,
                    ];
                }
            } catch (\Throwable $th) {
                DB::rollback();
                return [
                    "status" => $this->num_fatal_error,
                    "error" => $th->getMessage(),
                ];
            }
        }
    }
    public function setInsert($save)
    {
        $this->save = $save;
    }
}
