<?php

namespace App\Service\Template;

class ValidationTemplate
{
    public $template = [

        "str_null" => "string|nullable",

        "file" => "nullable|mimes:jpg,png,jpeg,JPG,PNG,JPEG,pdf,PDF,zip,ZIP",

        "req" => "required",

        "req_uniq" => "required|unique:",

        "str_req_min6" => "required|string|min:6",
        /*5*/
        "email_uniq" => "required|email|unique:",

        "null" => "nullable",

        "int_null" => "integer|nullable",
        /*8*/
        "req_int" => "required|integer",

        "str_uniq" => "string|unique:",

        "str_req" => "required|string",

        "confirm_password" => "required|string|confirmed|min:6",

        "date_null" => 'date|nullable',

        "req_bool"  => 'required|boolean',

        "img_req"    => "required|mimes:jpg,png,jpeg,ico,JPG,PNG,JPEG",

        "img_null"    => "nullable|mimes:jpg,png,jpeg,ico,JPG,PNG,JPEG",
    ];
    public function getTemplate($name_template)
    {
        return $this->template[$name_template];
    }
}
