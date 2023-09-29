<?php

namespace App\Models;

class Review extends Model
{
    protected $table = "reviews";

    protected $primaryKey = "ReviewID";

    public function getBySiteID($site_id){
        $query = "SELECT $this->table.*, users.* 
        FROM $this->table 
        JOIN users ON $this->table.UserID = users.UserID 
        WHERE SiteID = $site_id 
        ORDER BY ReviewID";

        $reviews = db()->query($query)->get();

        return $reviews;
    }
}
