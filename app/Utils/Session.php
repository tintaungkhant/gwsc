<?php

namespace App\Utils;

class Session
{
    public function get($path, $default=[])
    {
        return dataGet($_SESSION, $path, $default);
    }

    public function set($path, $value)
    {
        return dataSet($_SESSION, $path, $value);
    }

    public function forget($path){
        return dataSet($_SESSION, $path, null);
    }
}
