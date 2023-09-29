<?php

namespace App\Controllers\User;

use App\Models\Site;

class HomeController
{
    public function index()
    {
        $site = new Site;
        $sites = $site->getAllAvailableSites();

        return view("user.home", ["sites" => $sites]);
    }
}
