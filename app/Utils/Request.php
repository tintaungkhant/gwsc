<?php

namespace App\Utils;

class Request
{
    public function get($key, $default = null)
    {
        $get = $_GET ? $_GET : [];
        $post = $_POST ? $_POST : [];

        $data = array_merge($get, $post);

        return isset($data[$key]) ? $data[$key] : $default;
    }

    public function method(){
        return $_SERVER["REQUEST_METHOD"];
    }
}
