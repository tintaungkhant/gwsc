<?php

namespace App\Models;

trait ModelTrait {
    public function getAll()
    {
        $query = "SELECT * FROM $this->table ORDER BY $this->primaryKey DESC";

        return db()->query($query)->get();
    }

    public function firstByID($id)
    {
        $query = "SELECT * FROM $this->table WHERE $this->primaryKey = '$id'";

        return db()->query($query)->first();
    }

    public function create($data)
    {
        $data = $this->generateInsertData($data);

        $columns = $data["columns"];
        $values = $data["values"];

        $query = "INSERT INTO $this->table ($columns) VALUES ($values)";

        $id = db()->query($query)->insertId;

        return $this->firstByID($id);
    }

    public function update($id, $data)
    {
        $columns = $this->generateUpdateData($data)["columns"];

        $query = "UPDATE $this->table SET $columns WHERE $this->primaryKey = '$id'";

        db()->query($query);

        return $this->firstByID($id);
    }

    public function deleteByID($id){
        $query = "DELETE FROM $this->table WHERE $this->primaryKey = '$id'";

        return db()->query($query);
    }    
}