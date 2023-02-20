<?php

namespace App\Service\Template;

class MiddelwareTemplate
{
    public $template = [
        "api_super_admin" => [
            "api",
            "role:super-admin"
        ],

        "api_admin" => [
            "api",
            "role:admin"
        ],
    ];
    public function getTemplate($name)
    {
        return $this->template[$name];
    }
}
