<?php

namespace App\Service\Panel;

use Illuminate\Support\Facades\Validator;
use App\Service\Kernel\Fx;
use App\Service\Kernel\Potion;

trait RelationInsert
{
    use Potion;
    private $resource;
    public function relation_insert($request, $relation_config)
    {
        // try {
        $relation_main = $this->getDataRelation($relation_config['relation_index']);

        $relations = $this->getFileRelation($relation_main["file_relation"]['file']);
        $data_relation = $relations->model->fild();
        if (!$data_relation || count($data_relation) == 0)
            return [
                "error"  => [],
                "status" => 401,
            ];
        // ===========================================================================
        /**
         * .
         * inisiasi data utama pada fild_relation ship json
         */

        if (!$validation = $this->master_validation($data_relation)) {
            return [
                "error"  => "resource error from validation data 'create_master_validation' function",
                "status" => 401,
            ];
        }
        // $r_validate = $request->all();


        $r_validate = $request->all();
        $create_scema =  $validation;
        $validator = Validator::make($r_validate, $create_scema);
        if ($validator->fails()) {
            return [
                "error"  => $validator->errors(),
                "status" => $this->num_validate_error,
            ];
        }
        return [
            "result" => $this->run_data($request, $data_relation),
            "obj" => $relations,
            "status" => $this->num_success,
            "type" => "foreign",
            "class" => $relation_config['relation_index']
        ];
        // } catch (\Exception $e) {
        //     /**
        //      * .
        //      * jika gagal query
        //      */
        //     return [
        //         "error"  => $e->getMessage(),
        //         "status" => 501
        //     ];
        // }
    }
}
