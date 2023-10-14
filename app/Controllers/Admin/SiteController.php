<?php

namespace App\Controllers\Admin;

use App\Models\Feature;
use App\Models\LocalAttraction;
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

        $local_attraction = new LocalAttraction;
        $local_attractions = $local_attraction->getAll();

        return view("admin.sites.create", ["features" => $features, "local_attractions" => $local_attractions]);
    }

    public function store()
    {
        $data = request()->all();

        // dd($data);

        $validator = validator($data, [
            "SiteName" => ["required"],
            "SiteDescription" => ["required"],
            "SiteLocation" => ["required"],
            "SiteImage" => ["required", "image"],
            "FeatureIDs" => ["required"],
            "LocalAttractionIDs" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/admin/sites/create");
        }
        
        $data["SiteLocation"] = preg_replace('/width="[^"]*"/', 'width="100%"', $data["SiteLocation"]);

        $upload_file_path = uploadFilePath(getFileExt($data["SiteImage"]["name"]));

        move_uploaded_file($data["SiteImage"]["tmp_name"], $upload_file_path);

        $data["SiteImage"] = $upload_file_path;

        $feature_ids = $data["FeatureIDs"];

        unset($data["FeatureIDs"]);

        $local_attraction_ids = $data["LocalAttractionIDs"];

        unset($data["LocalAttractionIDs"]);

        $site = new Site;
        $site = $site->create($data);

        (new Site)->syncFeatures($site["SiteID"], $feature_ids);
        (new Site)->syncLocalAttractions($site["SiteID"], $local_attraction_ids);

        // TODO: flush message

        return redirect("/admin/sites");
    }

    public function edit($routePrams)
    {

        $site = new Site;
        $site = $site->firstByIDWithRelations($routePrams["site_id"]);

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

        $local_attraction = new LocalAttraction;
        $local_attractions = $local_attraction->getAll();

        foreach($local_attractions as $index => $local_attraction){
            $local_attraction["selected"] = false;
            foreach($site["local_attractions"] as $site_local_attraction){
                if($local_attraction["selected"]){
                    break;
                }
                $local_attraction["selected"] = $site_local_attraction["LocalAttractionID"] == $local_attraction["LocalAttractionID"];
                $local_attractions[$index] = $local_attraction;
            }
        }


        return view("admin.sites.edit", ["site" => $site, "features" => $features, "local_attractions" => $local_attractions]);
    }

    public function update($routePrams)
    {
        $data = request()->all();

        $validator = validator($data, [
            "SiteName" => ["required"],
            "SiteDescription" => ["required"],
            "SiteLocation" => ["required"],
            "OldSiteImage" => ["required"],
            "SiteImage" => ["nullable", "image"],
            "FeatureIDs" => ["required"],
            "LocalAttractionIDs" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/admin/sites/" . $routePrams["site_id"] . "/edit");
        }

        $data["SiteLocation"] = preg_replace('/width="[^"]*"/', 'width="100%"', $data["SiteLocation"]);

        if($data["SiteImage"]["name"]){
            $upload_file_path = uploadFilePath(getFileExt($data["SiteImage"]["name"]));

            move_uploaded_file($data["SiteImage"]["tmp_name"], $upload_file_path);
    
            $data["SiteImage"] = $upload_file_path;
        }else{
            $data["SiteImage"] = $data["OldSiteImage"];

        }
        
        unset($data["OldSiteImage"]);

        $feature_ids = $data["FeatureIDs"];

        unset($data["FeatureIDs"]);

        $local_attraction_ids = $data["LocalAttractionIDs"];

        unset($data["LocalAttractionIDs"]);

        $site = new Site;
        $site = $site->update($routePrams["site_id"], $data);

        (new Site)->syncFeatures($site["SiteID"], $feature_ids);
        (new Site)->syncLocalAttractions($site["SiteID"], $local_attraction_ids);

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
