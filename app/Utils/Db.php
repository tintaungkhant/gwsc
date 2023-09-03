<?php

namespace App\Utils;

use Exception;
use mysqli;

class Db
{
    public function connect()
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
}
