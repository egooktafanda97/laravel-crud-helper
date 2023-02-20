<?php

namespace App\Service\Kernel;

use App\Helpers\Helpers;
use Illuminate\Support\Facades\Validator;

trait Potion
{
    public function file_upload($request, $name, $path, $full = true)
    {
        try {
            $uploads = Helpers::Upgambar($request, $name, $path);
            if (!$uploads['status'])
                return false;
            $_get = $uploads[$full ? "full-path" : "fileName"] ?? $path['path'] . "/" . "default.jpg";
            return $_get;
        } catch (\Throwable $th) {
            return "default.jpg";
        }
    }

    public function auto($req, $data)
    {
        if ($this->test) return $req[$data['name']];
        /**
         * .
         * cek config
         */
        try {
            if (array_key_exists('config', $data)) {
                /**
                 * .
                 * cek value
                 */
                if (array_key_exists('def_value',  $data['config'])) {
                    $def_val = $data['config']['def_value'];
                    /**
                     * .
                     * compile data, ada pada configure Helper 
                     */
                    $v = $this->CostumAutoData($data['config']['case'], $def_val);
                    if (!$v)
                        return $req[$data['name']] ?? "";
                    /**
                     * .
                     * validasi 
                     */
                    $validator = Validator::make([$data['name'] => $v], [$data['name'] => $data['validate']]);
                    if ($validator->fails()) {
                        return [
                            "error"  => $validator->errors(),
                            "status" => $this->num_validate_error,
                        ];
                    }
                    return $v ? $v : '';
                } else {
                    return [
                        "error"  => "error automatic data",
                        "status" => $this->num_universal_error,
                    ];
                }
            }
        } catch (\Throwable $th) {
            return [
                "error"  => $th->getMessage(),
                "status" => $this->num_fatal_error,
            ];
        }
    }
    public function tipe($type, $request, $data)
    {
        switch ($type) {
                /**
             * .
             * tipe gambar
             */
            case 'image':
                if (!$up_file = $this->file_upload($request, $data['name'], $data['path']))
                    return $data['path'] . "/" . "default.jpg";
                return $up_file;
                break;
                /**
                 * .
                 * tipe static
                 */
            case 'static':
                if (!empty($request[$data['name']]))
                    return $request[$data['name']];
                return $data['value'] ?? "";
                break;
                /**
                 * .
                 * tipe forgn key
                 */
            case 'key':
                if (array_key_exists('relation', $data)) {
                    $key_id = $this->relation_insert($request, $data['relation']);
                    if (array_key_exists('status', $data) && $key_id['status'] == $this->num_query_error)
                        return [
                            "error"  => $key_id['error'],
                            "status" => $this->num_query_error,
                        ];
                    return $key_id;
                }
                return  $request[$data['name']];
                break;
                /**
                 * .
                 * tipe otomatis terisi , setingan ada pada configure pada heper
                 */
            case 'auto':
                return $this->auto($request, $data);
                break;
                /**
                 * .
                 * encrypt pada password
                 */
            case 'ecrypt':
                return bcrypt($request[$data['name']]) ?? "";
                break;
                /**
                 * .
                 * ambil pada parent value nya
                 */
            case 'paret_value':
                if (!empty($request[$data['value_parent']]))
                    return $request[$data['value_parent']] ?? "";
                return $request->{$data['value_parent']} ?? "";
                break;
                /**
                 * .
                 * jika case tidak ada
                 */
            default:
                if (empty($request[$data['name']]))
                    return "";
                return $request[$data['name']];

                break;
        }
    }
    public function tipe_update($type, $request, $data)
    {
        switch ($type) {
                /**
             * .
             * tipe gambar
             */
            case 'image':
                if (!$up_file = $this->file_upload($request, $data['name'], $data['path']))
                    return false;
                return $up_file;
                break;
                /**
                 * .
                 * tipe static
                 */
            case 'static':
                return false;
                break;
                /**
                 * .
                 * tipe forgn key
                 */
            case 'key':
                if (array_key_exists('relation', $data)) {
                    $key_id = $this->relation_insert($request, $data['relation']);
                    if (array_key_exists('status', $data) && $key_id['status'] == $this->num_query_error)
                        return [
                            "error"  => $key_id['error'],
                            "status" => $this->num_query_error,
                        ];
                    return $key_id;
                }
                return  $request[$data['name']];
                break;
                /**
                 * .
                 * tipe otomatis terisi , setingan ada pada configure pada heper
                 */
            case 'auto':
                return $this->auto($request, $data) ?? false;
                break;
                /**
                 * .
                 * encrypt pada password
                 */
            case 'ecrypt':
                if (!empty($request[$data['name']])) {
                    return bcrypt($request[$data['name']]) ?? false;
                }
                return  false;
                break;
                /**
                 * .
                 * ambil pada parent value nya
                 */
            case 'paret_value':
                if (!empty($request[$data['value_parent']])) {
                    return bcrypt($request[$data['value_parent']]) ?? false;
                }
                return  false;
                break;
                /**
                 * .
                 * jika case tidak ada
                 */
            default:
                if (empty($request[$data['name']]))
                    return false;
                return $request[$data['name']];
                break;
        }
    }
    public function run_data($request, $data)
    {
        $result = [];
        $object = [];
        foreach ($data as $res) {
            $_value_type = $res['type'] ?? false;
            $status_request = $res['request'] ?? false; // apakah input post atau tidak
            if (empty($request[$res['name']]) && $status_request != false)
                continue;
            $results = $this->tipe($_value_type, $request, $res) ?? [];

            if (gettype($results) == "array" &&  array_key_exists('type', $results) && $results['type'] == "foreign") {
                $obj = $results['obj'];
                $object += [$results['class'] => $obj];
                $r = $results['result']['result'] ?? $results['result'];
                $results = $r;
            }
            if (gettype($results) == "array" && array_key_exists('error', $results))
                return  $results;
            if ($res['name'])
                $result[$res['name']] = $results;
        }
        return [
            "result" => $result,
            "object" => $object,
        ];
    }
}
