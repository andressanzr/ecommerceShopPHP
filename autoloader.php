<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
    $path = "";
    if (is_int(strpos($className, "Controller"))) {
        $path = "controllers/";
    } else if (is_int(strpos($className, "View"))) {
        $path = "views/";
    } else {
        $path = "models/";
    }


    $extension = ".php";
    $fullPath = $path . $className . $extension;

    if (!file_exists($fullPath)) {
        return false;
    } else {
        include_once $fullPath;
    }
}
