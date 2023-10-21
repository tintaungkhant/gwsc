<?php

use App\Utils\Db;
use App\Utils\Request;
use App\Utils\Session;
use App\Utils\Validator;

function config($key, $default = null)
{
    $configPath = __DIR__.'/configs/';
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

function dataSet(&$array, $path, $value)
{
    $keys = explode('.', $path);
    $temp = &$array;

    foreach ($keys as $key) {
        if (!isset($temp[$key]) || !is_array($temp[$key])) {
            $temp[$key] = [];
        }
        $temp = &$temp[$key];
    }

    $temp = $value;
}

function session()
{
    return (new Session);
}

function view($key, $data = [])
{
    $filePath = str_replace(".", "/", $key);

    foreach ($data as $key => $value) {
        $$key = $value;
    }

    return require_once "views/" . $filePath . ".php";
}

function redirect($route)
{
    header("Location:$route");
    die;
}

function publicPath($path)
{
    return PUBLIC_PATH_PREFIX."/public/" . $path;
}

function route($path){
    $path = trim($path, "/");
    return PUBLIC_PATH_PREFIX ."/". $path;
}

function request()
{
    return (new Request);
}

function db()
{
    return (new Db)->connect();
}

function validator($data, $rules)
{
    return new Validator($data, $rules);
}

function setErrorMessages($errors)
{
    return session()->set("errors", $errors);
}

function getErrorMessages()
{
    $errors = session()->get("errors");

    session()->forget("errors");

    return $errors ? $errors : [];
}

function hasErrorMessages()
{
    return !empty(session()->get("errors"));
}

function showErrorBlock()
{
    $mesage = "";
    if (hasErrorMessages()) {
        $mesage = '<div class="rounded-md bg-red-50 p-4 mt-8">
       <div class="flex">
               <div class="flex-shrink-0">
               <i class="fa-regular fa-circle-xmark text-lg text-red-800"></i>
               </div>
               <div class="ml-3">
               <h3 class="text-sm font-medium text-red-800">There were some errors with your submission</h3>
               <div class="mt-2 text-sm text-red-700">
                       <ul role="list" class="list-disc space-y-1 pl-5">';

        foreach (getErrorMessages() as $errors) {
            foreach ($errors as $error) {
                $mesage .= '<li>' . $error . '</li>';
            }
        }

        $mesage .= '</ul>
               </div>
               </div>
       </div>
</div>';
    }

    return $mesage;
}

function truncateLongText($string, $maxLength = 100) {
    if (strlen($string) > $maxLength) {
        $string = substr($string, 0, $maxLength);
        $string .= "...";
    }

    return $string;
}

function dd($value){
    die(var_dump($value));
}

function uploadFilePath($ext=""){
    $path = "public/uploads/";
    if(!$ext){
        return $path;
    }

    $file_name = rand(100,9999).strrev(time()).rand(100,9999).".".$ext;
    return $path.$file_name;
}

function getFileExt($path){
    return strtolower(pathinfo($path)["extension"]);
}

function authUser(){
    return session()->get("user") ? session()->get("user") : [];
}

function authAdmin(){
    return session()->get("admin") ? session()->get("admin") : [];
}