<?php

namespace App\Service\provider;

use App\Service\Kernel\Controller;
use DirectoryIterator;

class ServiceConfig
{
    public static $filePath = "/../../../Scema/";
    public static $filePathBackSlash = "Scema\\";

    public static function setPathScema($path, $backSlesh)
    {
        self::$filePath = $path;
        self::$filePathBackSlash = $backSlesh;
    }

    public static function getFilepath()
    {
        return static::$filePath;
    }
    public static function instanceRouter($type_router)
    {
        $path = static::getFilepath();
        $dir = new DirectoryIterator(dirname(__FILE__) . $path);
        $RouterFormat = [];
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                $f = explode(".", $fileinfo->getFilename());
                $control = new Controller(static::$filePathBackSlash . $f[0]);
                $control->initRouter($type_router);
                $format = $control->getInstanceRouter();
                array_push($RouterFormat, $format);
            }
        }
        return $RouterFormat;
    }
}
