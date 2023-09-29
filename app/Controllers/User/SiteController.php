<?php

namespace App\Controllers\User;

use App\Models\PitchType;
use App\Models\Review;
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

    public function show($routeParams)
    {
        $site = new Site;
        $site = $site->firstByIDWithRelations($routeParams["site_id"]);

        $pitch_type = new PitchType;
        $pitch_types = $pitch_type->getPitchTypes($routeParams["site_id"]);

        $reviews = new Review;
        $reviews = $reviews->getBySiteID($routeParams["site_id"]);

        return view("user.sites.show", ["site" => $site, "pitch_types" => $pitch_types, "reviews" => $reviews]);
    }

    public function review(){
        $review = new Review;
        $review = $review->create(request()->all());

        return redirect("/sites/".request()->get("SiteID"));
    }
}
