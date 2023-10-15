<?php

namespace App\Models;

class RSSFeed extends Model
{
    protected $table = "rss_feeds";

    protected $primaryKey = "RSSFeedID";

    public function getAll()
    {
        $query = "SELECT * FROM $this->table ORDER BY $this->primaryKey ASC";

        return db()->query($query)->get();
    }
}
