<?php

namespace App\Utils;

class Session
{
    public function get($path)
    {
        return dataGet($_SESSION, $path);
    }

    public function set($path, $value)
    {
        return dataSet($_SESSION, $path, $value);
    }
}
