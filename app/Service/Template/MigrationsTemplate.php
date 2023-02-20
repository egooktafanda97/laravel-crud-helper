<?php

namespace App\Service\Template;

class MigrationsTemplate
{
    public $template = [
        /*0*/
        "foreign" => [
            "type" => "unsignedBigInteger",
            "param" => "unsigned,index",
        ],
        /*1*/
        "str_200" => [
            "type" => "string",
            "size" => "200"
        ],
        /*2*/
        "str_null_20" => [
            "type" => "string",
            "size" => "20",
            "param" => "nullable"
        ],
        /*3*/
        "str_null_200" => [
            "type" => "string",
            "size" => "200",
            "param" => "nullable"
        ],
        /*4*/
        "time_null" => [
            "type" => "time",
            "param" => "nullable"
        ],
        /*5*/
        "str_uniq_200" => [
            "type" => "string",
            "size" => "100",
            "param" => "unique",
        ],
        /*6*/
        "date_null" => [
            "type" => "date",
            "param" => "nullable"
        ],
        /*7*/
        "f_key" => [
            "type" => "unsignedBigInteger",
        ],
        /*8*/
        "f_key_null" => [
            "type" => "unsignedBigInteger",
            "param" => "nullable"
        ],
        /*9*/
        "boll" => [
            "type" => "boolean",
            "param" => "default"
        ],
        /*10*/
        "text_null" => [
            "type" => "text",
            "param" => "nullable"
        ],
        /*11*/
        "str_null_200*0" => [
            "type" => "string",
            "size" => "100",
            "param" => "nullable,default|0",
        ],
        /*12*/
        "str_null_10" => [
            "type" => "string",
            "size" => "10",
            "param" => "nullable,default|0",
        ],
        /*13*/
        "big_int" => [
            "type" => "bigInteger",
        ],
        /*14*/
        "int*0" => [
            "type" => "integer",
            "param" => "default|0",
        ],
        /*15*/
        "longText_null" =>  [
            "type" => "longText",
            "param" => "nullable",
        ],
        /*16*/
        "int_null" => [
            "type" => "integer",
            "param" => "nullable",
        ],
        /*17*/
        "str_16" => [
            "type" => "string",
            "size" => "16"
        ],
        /*18*/
        "str_uniq_16" => [
            "type" => "string",
            "size" => "16",
            "param" => "unique",
        ],
        /*19*/
        "f_key_uniq" => [
            "type" => "unsignedBigInteger",
            "param" => "unique,unsigned,index",
        ],
        /*20*/
        "bool*1" => [
            "type" => "boolean",
            "param" => "default|1"
        ],
        /*21*/
        "str_uniq_null_16" => [
            "type" => "string",
            "size" => "16",
            "param" => "unique,nullable",
        ],
        /*22*/
        "date_time" => [
            "type" => "dateTime"
        ],
    ];
    public function getTemplate($name_template)
    {
        return $this->template[$name_template];
    }
    public function ref($index)
    {
        return [
            "str"   => "string",
            "int" => "integer",
            "null" => "nullable",
            "uniq" => "unique",
            "bool" => "boolean"
        ][$index] ?? [];
    }
    public function newTemplate($str)
    {
        $expld = explode("_", $str);
        $mg = [];
        $mg["type"] = $this->ref($expld[0]);
        if (!empty($expld[1]) && !empty($this->ref($expld[1])))
            $mg["param"] = $this->ref($expld[1]);
        else
            $mg["size"] = $expld[1];
        if (!empty($expld[2]))
            $mg["size"] = $expld[2];
        return $mg;
    }
}
