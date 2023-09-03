<?php

namespace App\Models;

class Site {
    protected $table = "Sites";

    protected $primaryKey = "SiteID";

    public function create($data){
        $i = 0;

        $columns = "";
        $values = "";
        
        foreach($data as $key => $value){
            $columns .= $key;
            if($i < count($data) - 1){
                $columns .= ", ";
            }

            $values .= "'". $value."'";
            if($i < count($data) - 1){
                $values .= ", ";
            }

            $i++;
        }

        $query = "INSERT INTO Sites ($columns) VALUES ($values)";

        $id = db()->query($query)->insertId;

        return $this->firstById($id);
    }

    public function firstById($id){
        $query = "SELECT * FROM $this->table WHERE $this->primaryKey = '$id'";

        return db()->query($query)->first();
    }

    public function get(){
        $query = "SELECT * FROM $this->table ORDER BY $this->primaryKey DESC";

        return db()->query($query)->get();
    }
}