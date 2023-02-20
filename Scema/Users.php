<?php

namespace Scema;


use App\Service\Classes\ModelActions;

use App\Service\Polymorphism\Scema;



class Users extends ModelActions implements Scema
{

    public $name = "user";
    public $table = "users";
    public $model = "User";
    /*
    |   NAMA CONTROLLER
    */
    public $controller = "UserController";
    /*
    |   EMD NAMA CONTROLLER
    */
    public $name_space = [];

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @return  array NAMA FILD DATABASE
     */
    public function fild(): array
    {
        return [
            [
                "name" =>  "name",
                "migration" => $this->migrate->newTemplate('str_100'),
                "value_parent" => "nama",
                "type" => "string",
                "request" => false,
                "validate" => "nullable",
            ],
            [
                "name" => "email",
                "migration" => $this->migrate->getTemplate("str_uniq_200"),
                "validate" => $this->validate->getTemplate("req_uniq"),
                "validate_uniq" => "users",
                "type" => "string",
                "request" => true,
            ],
            [
                "name" => "password",
                "migration" => $this->migrate->newTemplate('str_100'),
                "validate" => $this->validate->getTemplate("req"),
                "type" => "ecrypt",
                "request" => true,
            ],
            [
                "name" => "foto",
                "migration" => $this->migrate->newTemplate('str_null_100'),
                "validate" => "nullable",
                "type" => "image",
                "path" => "imags/foto",
                "request" => true,
            ],
            [
                "name" => "status",
                "migration" => $this->migrate->newTemplate('str_100'),
                "validate" => $this->validate->getTemplate("null"),
                "type" => "static",
                "value" => "pending",
                "request" => false,
            ]
        ];
    }
    /*
    |   EMD NAMA FILD
    */

    /**
     * @return  array INISIAL CONFIGURASI RELASI
     */
    public function relation(): array
    {
        return [];
    }
    /*
    |   EMD INISIAL CONFIGURASI RELASI
    */

    /**
     * @return  array INISIAL ROUTER API
     */
    public function api_router(): array
    {
        return  [];
    }
}
