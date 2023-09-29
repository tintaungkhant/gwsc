<?php

namespace App\Controllers\User;

use App\Models\PitchType;
use App\Models\Site;

class SiteController
{
    public function index($routeParams)
    {
        $pitch_type_id = isset($routeParams["PitchTypeID"]) && !empty($routeParams["PitchTypeID"]) ? $routeParams["PitchTypeID"] : "";
        $site_name = isset($routeParams["SiteName"]) && !empty($routeParams["SiteName"]) ? $routeParams["SiteName"] : "";

        $site = new Site;
        $sites = $site->getAllAvailableSites($pitch_type_id, $site_name);

        $pitch_type = new PitchType;
        $pitch_types = $pitch_type->getAll();

        return view("user.sites.index", ["sites" => $sites, "pitch_types" => $pitch_types, "pitch_type_id" => $pitch_type_id, "site_name" => $site_name]);
    }

    public function show($routePram)
    {
        $site = new Site;
        $site = $site->firstByIDWithRelations($routePram["site_id"]);

        return view("user.sites.show", ["site" => $site]);
    }
}
