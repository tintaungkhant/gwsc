<?php

namespace App\Controllers\User;

use App\Models\LocalAttraction;
use App\Models\Site;

class LocalAttractionController
{
    public function show($routePram)
    {
        $local_attraction = new LocalAttraction;
        $local_attraction = $local_attraction->firstByID($routePram["local_attraction_id"]);

        return view("user.local_attractions.show", ["local_attraction" => $local_attraction]);
    }
}
