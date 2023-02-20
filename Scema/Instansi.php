<?php

namespace Scema;


use App\Service\Classes\ModelActions;
use App\Service\Polymorphism\Scema;



class Instansi extends ModelActions implements Scema
{

    public $name = "instansi";
    public $table = "instansi";
    public $model_name = "Instansi";
    /*
    |   NAMA CONTROLLER
    */
    public $controller = "InstansiController";
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
                "relation" => ModelActions::def_relation("users", "users", "users", "id", true)
            ],
            [
                "name" => "nama",
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
                "request" => true,
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
            "get" => ModelActions::def_router("get", "instansi", "/", $this->middleware->getTemplate("api_admin"), $this->controller_location . $this->controller),
            "getById" => ModelActions::def_router(
                "get",
                "instansi",
                "/id/{slug}",
                $this->middleware->getTemplate("api_admin"),
                $this->controller_location . $this->controller,
            ),
            "getByAuth" => [
                "method" => "get",
                "router" => "/show",
                "prefix" => "instansi",
                "middleware" => $this->middleware->getTemplate("api_admin"),
                "controller" => $this->controller_location . $this->controller,
            ],
            "getByIdAndSource" => [
                "method" => "get",
                "router" => "/source/{slug}",
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
            "delete" => [
                "method" => "delete",
                "router" => "/delete/{id}",
                "prefix" => "instansi",
                "middleware" => $this->middleware->getTemplate("api_admin"),
                "controller" => $this->controller_location . $this->controller,
            ],
        ];
    }
}
