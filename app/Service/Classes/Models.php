<?php

namespace App\Service\Classes;

use App\Service\Traits\Actions;
use App\Service\Template\MigrationsTemplate;
use App\Service\Template\ValidationTemplate;
use App\Service\Template\MiddelwareTemplate;

class Models
{
    use Actions;

    public $primary = "id";
    public $model_location = "\App\Models\\";
    public $controller_location = "\App\Http\Controllers\\";

    // Templating
    public $migrate;
    public $validate;
    public $middleware;

    public function __construct()
    {
        $this->migrate = new MigrationsTemplate();
        $this->validate = new ValidationTemplate();
        $this->middleware = new MiddelwareTemplate();
    }

    protected static function def_relation($table, $function, $relation_key, $key, $delete = false): array
    {
        return [
            "table" => $table,
            "function" => $function, // function model
            "relation_index" => $relation_key, // key dari data Relations
            "foreign" => [
                "key" => $key, // foreign primary relasi
                "table" => $table,
                "auto_delete_relation" => $delete
            ]
        ];
    }
    protected static function def_router($method, $prefix, $router, $middleware, $controller): array
    {
        return [
            "method" => $method,
            "router" => $router,
            "prefix" => $prefix,
            "middleware" =>  $middleware,
            "controller" => $controller,
        ];
    }
}
