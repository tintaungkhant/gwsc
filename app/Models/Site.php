<?php

namespace App\Models;

class Site extends Model
{
    protected $table = "Sites";

    protected $primaryKey = "SiteID";

    public function create($data)
    {
        $data = $this->generateInsertData($data);

        $columns = $data["columns"];
        $values = $data["values"];

        $query = "INSERT INTO Sites ($columns) VALUES ($values)";

        $id = db()->query($query)->insertId;

        return $this->firstByID($id);
    }

    public function update($id, $data)
    {
        $columns = $this->generateUpdateData($data);

        $query = "UPDATE Sites SET $columns WHERE SiteID = '$id'";

        db()->query($query);

        return $this->firstByID($id);
    }

    public function firstByID($id)
    {
        $query = "SELECT * FROM $this->table WHERE $this->primaryKey = '$id'";

        return db()->query($query)->first();
    }

    public function get()
    {
        $query = "SELECT * FROM $this->table ORDER BY $this->primaryKey DESC";

        return db()->query($query)->get();
    }

    public function deleteByID($id){
        $query = "DELETE FROM $this->table WHERE $this->primaryKey = '$id'";

        return db()->query($query);
    }
}
