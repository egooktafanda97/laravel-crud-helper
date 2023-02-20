<?php

namespace App\Service\Traits;

trait Actions
{

    public function getData()
    {
        $data = $this->fild();
        $resource = [];
        foreach ($data as $ky => $f) {
            if ($f["request"])
                $resource[] = $f["name"];
        }
        return $resource;
    }
    public function getRouter($index)
    {
        if ($index == "api")
            return $this->api_router();
        else
            return $this->web_router();
    }
    public function http_request()
    {
        $route = $this->getRouter("api");
        $root = [];
        foreach ($route as $key => $r) {
            $ar = ["url" => $r['prefix'] . $r['router']];
            $ar += ["method" => $r["method"]];
            if ($r["method"] == "post") {
                $ar += ["data" => $this->getData()];
            }
            array_push($root, $ar);
        }
        return $root;
    }
}
