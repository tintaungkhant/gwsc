<?php

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

function view($key)
{
    $filePath = str_replace(".", "/", $key);
    return require_once "views/" . $filePath . ".php";
}

function db()
{
    $host = config("database.host");
    $port = config("database.port");
    $username = config("database.username");
    $password = config("database.password");
    $database = config("database.database");

    $db = new mysqli($host, $username, $password, $database, $port);

    if ($db->connect_error) {
        throw new Exception($db->connect_error);
    }

    return $db;
}

function redirect($route)
{
    header("Location:$route");
    die;
}

function publicPath($path){
    return "public/".$path;
}

function doSomething()
{
    return "HIIII";
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
