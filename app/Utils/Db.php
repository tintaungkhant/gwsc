<?php

namespace App\Utils;

use Exception;
use mysqli;

class Db
{
    public $db;

    public $query;

    public $result;

    public $insertId;

    public function connect()
    {
        $host = config("database.host");
        $port = config("database.port");
        $username = config("database.username");
        $password = config("database.password");
        $database = config("database.database");

        $this->db = new mysqli($host, $username, $password, $database, $port);

        if ($this->db->connect_error) {
            throw new Exception($this->db->connect_error);
        }

        return $this;
    }

    public function query($query)
    {
        $this->result = $this->db->query($query);

        $this->insertId = $this->db->insert_id;

        return $this;
    }

    public function first(){
        return mysqli_fetch_assoc($this->result);
    }

    public function get(){
        return mysqli_fetch_all($this->result, MYSQLI_ASSOC);
    }
}
