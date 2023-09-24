<?php

namespace App\Controllers\Admin;

use App\Models\Admin;
use App\Models\Feature;
use App\Models\Site;

class SiteController
{
    public function index()
    {
        $site = new Site;
        $sites = $site->getAll();

        return view("admin.sites.index", ["sites" => $sites]);
    }

    public function create()
    {
        $feature = new Feature;
        $features = $feature->getAll();

        return view("admin.sites.create", ["features" => $features]);
    }

    public function store()
    {
        $data = request()->all();

        $validator = validator($data, [
            "SiteName" => ["required"],
            "SiteDescription" => ["required"],
            "SiteLocation" => ["required"],
            "SiteImage" => ["required"],
            "featureIDs" => ["required"]
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/admin/sites/create");
        }

        $feature_ids = $data["featureIDs"];

        unset($data["featureIDs"]);

        $site = new Site;
        $site = $site->create($data);

        (new Site)->syncFeatures($site["SiteID"], $feature_ids);

        // TODO: flush message

        return redirect("/admin/sites");
    }

    public function edit($routePrams)
    {

        $site = new Site;
        $site = $site->firstByIDWithFeatures($routePrams["site_id"]);

        // TODO: fail if not found

        $feature = new Feature;
        $features = $feature->getAll();

        foreach($features as $index => $feature){
            $feature["selected"] = false;
            foreach($site["features"] as $site_feature){
                if($feature["selected"]){
                    break;
                }
                $feature["selected"] = $site_feature["FeatureID"] == $feature["FeatureID"];
                $features[$index] = $feature;
            }
        }

        return view("admin.sites.edit", ["site" => $site, "features" => $features]);
    }

    public function update($routePrams)
    {
        $data = request()->all();

        $validator = validator($data, [
            "SiteName" => ["required"],
            "SiteDescription" => ["required"],
            "SiteLocation" => ["required"],
            "SiteImage" => ["required"],
            "featureIDs" => ["required"]
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/admin/sites/" . $routePrams["site_id"] . "/edit");
        }

        $feature_ids = $data["featureIDs"];

        unset($data["featureIDs"]);

        $site = new Site;
        $site = $site->update($routePrams["site_id"], $data);

        (new Site)->syncFeatures($site["SiteID"], $feature_ids);

        // TODO: flush message

        return redirect("/admin/sites");
    }

    public function delete($routePrams)
    {
        $site = new Site;
        $site = $site->deleteByID($routePrams["site_id"]);

        // TODO: fail if not found

        return redirect("/admin/sites");
    }
}
