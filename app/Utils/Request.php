<?php

namespace App\Utils;

class Request
{
    public function all(){
        $get = $_GET ? $_GET : [];
        $post = $_POST ? $_POST : [];
        $file = $_FILES ? $_FILES : [];

        return array_merge($get, $post, $file);
    }

    public function get($key, $default = null)
    {
        $data = $this->all();

        return isset($data[$key]) ? $data[$key] : $default;
    }

    public function method(){
        return $_SERVER["REQUEST_METHOD"];
    }
}
