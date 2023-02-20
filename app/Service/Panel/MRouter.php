<?php

namespace App\Service\Panel;

trait MRouter
{
    public $routs = [];
    public $scema_path = "Model";
    // public $scme_path_dirname = "";

    public function initRouter($route)
    {
        switch ($route) {
            case 'api':
                $this->routs = $this->model->api_router();
                break;

            default:
                $this->routs = $this->model->web_router();
                break;
        }
    }
    public function getInstanceRouter()
    {
        $router = $this->routs;
        $arr_route = [];
        if (!$router)
            return false;
        foreach ($router as $key_rout => $v_rout) {
            $middelType = gettype($v_rout['middleware']);
            $middel = [];
            $prefix = $v_rout['prefix'];
            $method = $v_rout['method'];
            $rout = $v_rout['router'];
            $class = $v_rout["controller"];
            $middel = $v_rout['middleware'];
            if (count($arr_route) > 0) {
                $switch_group = false;
                $indexs = 0;
                foreach ($arr_route as  $va) {
                    if ($va['middleware'] == $middel) {
                        $switch_group = true;
                        $arr_route[$indexs]['rute'][] = [
                            "method" => $method,
                            "rout" => $rout,
                            "function" => $key_rout,
                            "class" => $class
                        ];
                    }
                    $indexs++;
                }
                if ($switch_group == false) {
                    array_push($arr_route, [
                        "middleware" => $middel,
                        "prefix" => $prefix,
                        "rute" => [
                            [
                                "method" => $method,
                                "rout" => $rout,
                                "function" => $key_rout,
                                "class" => $class
                            ]
                        ],
                    ]);
                }
            } else {
                array_push($arr_route, [
                    "middleware" => $middel,
                    "prefix" => $prefix,
                    "rute" => [
                        [
                            "method" => $method,
                            "rout" => $rout,
                            "function" => $key_rout,
                            "class" => $class
                        ]
                    ],
                ]);
            }
        }
        return $arr_route;
    }
    // public function getScemaPath()
    // {
    //     return storage_path($this->scema_path);
    // }
    // public function setScemaPathDirname($path)
    // {
    //     $this->scme_path_dirname = $path;
    // }
    // public  function getScemaPathDirname()
    // {
    //     $pth = $this->scme_path_dirname;
    //     return dirname(__FILE__) .  $pth;
    // }
    // public function RouterFormating(): array
    // {
    //     $dir = new DirectoryIterator($this->getScemaPathDirname());
    //     $RouterFormat = [];
    //     foreach ($dir as $fileinfo) {
    //         if (!$fileinfo->isDot()) {
    //             $f = explode(".", $fileinfo->getFilename());
    //             $resources = new ManagementCrud($f[0]);
    //             $pathJson =  self::getScemaPath();
    //             $resources->instance($pathJson);
    //             $resources->setNameSpaceController("\\Modules\\V1\\Http\\Controllers\\");
    //             $format = $resources->getInstanceRouter("api");
    //             array_push($RouterFormat, $format);
    //         }
    //     }
    //     return $RouterFormat;
    // }
}
