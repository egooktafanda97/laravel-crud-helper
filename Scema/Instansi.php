<?php

namespace Scema;


use App\Service\Classes\Models;
use App\Service\Polymorphism\Scema;

class Instansi extends Models implements Scema
{
    // !=============================INISIASI===============================>
    public $name = "instansi";
    public $table = "instansi";

    public $deleted_at = true;

    // public $primary = "id";
    // ^END
    // !=============================CONTROLLER===============================>
    // * ORIGINAL PATH CONTROLLER
    public $controller_location = "\Api\Http\Module\Instansi\Controller\\";

    // * NAMA CONTROLLER
    public $controller = "InstansiController";
    /**
     * ^END NAMA CONTROLLER 
     */
    // !===============================MODEL==============================>
    public $model_name = "Instansi";
    public $model_location = "\Api\Http\Module\Instansi\Models\\";
    /** 
     * ^END MODEL CONFIG 
     */
    public $name_space = [];
    public $protected = [
        "hidden" => ["uuid"],
    ];

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
                /** NAMA FILD */
                "name" =>  "user_id",
                /** JIKA FOREIGN KEY INSERT before / after  */
                "control_insert" => "before",
                /** PELABELAN BOLEH KOSONG JIKA TIDAK DIGUNAKAN */
                "label" => "",
                /** TYPE DATA */
                "type" => "key",
                /** TEMPLATING MIGRATION DATABASE */
                "migration" => $this->migrate->getTemplate("foreign"),
                /** TEMPLATING MIGRATION DATABASE / STRING VALIDASI */
                "validate" => "integer",
                /** REQUET INPUT ATAU OTOMATIS TERISI */
                "request" => false,
                /** DEFENISIKAN RELASI DATA JIKA FILD FOREIGN KEY */
                "relation" => Models::def_relation("users", "users", "users", "id", true)
            ],
            [
                "name" => "name",
                "label" => "",
                "type" => "string",
                "request" => true,
                "migration" => $this->migrate->newTemplate("str_null_100"),
                "validate" => "string|nullable",
            ],
            "status" => [
                "name" => "status",
                "label" => "",
                "type" => "static",
                "value" => "pending",
                "request" => false,
                "migration" => $this->migrate->newTemplate("str_null_10"),
                "validate" => "string|nullable",
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
        return [
            "users" => [
                "hirarky" => "before",
                "model" => "User",
                "namespace" => "\App\Models\\",
                "foreign" => "user_id",
                "relation" => "belongsTo",
                "delete" => true,
                "file_relation" => ["name" => "Users", "file" => "Users"]
            ],
        ];
    }
    /*
    |   EMD INISIAL CONFIGURASI RELASI
    */

    /**
     * @return  array INISIAL ROUTER API
     */
    public function api_router(): array
    {
        return   [
            "get" => [
                "method" => "get",
                "router" => "/",
                "prefix" => "instansi",
                "middleware" => $this->middleware->getTemplate("api_admin"),
                "controller" => $this->controller_location . $this->controller,
            ],
            "getById" => [
                "method" => "get",
                "router" => "/id/{args}",
                "prefix" => "instansi",
                "middleware" => $this->middleware->getTemplate("api_admin"),
                "controller" => $this->controller_location . $this->controller,
            ],
            "getByUid" => [
                "method" => "get",
                "router" => "/uid/{args}",
                "prefix" => "instansi",
                "middleware" => $this->middleware->getTemplate("api_admin"),
                "controller" => $this->controller_location . $this->controller,
            ],
            "getByAuth" => [
                "method" => "get",
                "router" => "/me",
                "prefix" => "instansi",
                "middleware" => $this->middleware->getTemplate("api_admin"),
                "controller" => $this->controller_location . $this->controller,
            ],
            "store" => [
                "method" => "post",
                "router" => "/store",
                "prefix" => "instansi",
                "middleware" => $this->middleware->getTemplate("api_admin"),
                "controller" => $this->controller_location . $this->controller,
            ],
            "update" => [
                "method" => "post",
                "router" => "/update/{id}",
                "prefix" => "instansi",
                "middleware" => $this->middleware->getTemplate("api_admin"),
                "controller" => $this->controller_location . $this->controller,
            ],
            "destroy" => [
                "method" => "delete",
                "router" => "/destroy/{id}",
                "prefix" => "instansi",
                "middleware" => $this->middleware->getTemplate("api_admin"),
                "controller" => $this->controller_location . $this->controller,
            ],
            "getTemp" => [
                "method" => "get",
                "router" => "/restore",
                "prefix" => "instansi",
                "middleware" => $this->middleware->getTemplate("api_admin"),
                "controller" => $this->controller_location . $this->controller,
            ],
        ];
    }
}
