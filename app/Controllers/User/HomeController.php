<?php

namespace App\Controllers\User;

use App\Models\Site;

class HomeController
{
    public function index()
    {
        $top_site = new Site;
        $top_sites = $top_site->getAllTopViewedAvailableSites();

        $site = new Site;
        $sites = $site->getAllAvailableSites();

        return view("user.home", ["top_sites" => $top_sites, "sites" => $sites]);
    }
}
