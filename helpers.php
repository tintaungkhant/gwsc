<?php

use App\Utils\Db;
use App\Utils\Request;
use App\Utils\Session;

function config($key, $default = null)
{
    $configPath = 'configs/';
    $keys = explode('.', $key);
    $config = [];

    foreach ($keys as $part) {
        if (!isset($config[$part])) {
            $filePath = $configPath . $part . '.php';

            if (file_exists($filePath)) {
                $config[$part] = require $filePath;
            } else {
                return $default;
            }
        }

        $config = $config[$part];
    }

    return $config;
}

function dataGet($array, $path, $default = null)
{
    $keys = explode('.', $path);

    foreach ($keys as $key) {
        if (isset($array[$key])) {
            $array = $array[$key];
        } else {
            return $default;
        }
    }

    return $array;
}

function dataSet(&$array, $path, $value) {
    $keys = explode('.', $path);
    $temp = &$array;

    foreach ($keys as $key) {
        if (!isset($temp[$key]) || !is_array($temp[$key])) {
            $temp[$key] = [];
        }
        $temp =& $temp[$key];
    }

    $temp = $value;
}

function session(){
    return (new Session);
}

function view($key)
{
    $filePath = str_replace(".", "/", $key);
    return require_once "views/" . $filePath . ".php";
}

function redirect($route)
{
    header("Location:$route");
    die;
}

function publicPath($path)
{
    return "public/" . $path;
}

function request()
{
    return (new Request);
}

function db()
{
    return (new Db)->connect();
}

function adminAuth()
{
    if (!isset($_SESSION["admin"]) || empty($_SESSION["admin"])) {
        redirect("/admin/login");
    };
}

function userAuth()
{
    if (!isset($_SESSION["admin"]) || empty($_SESSION["admin"])) {
        redirect("/user/login");
    };
}
