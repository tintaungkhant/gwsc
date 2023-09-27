<?php

namespace App\Controllers\Admin;

use App\Models\AvailableSite;
use App\Models\PitchType;
use App\Models\Site;

class AvailableSiteController
{
    public function index()
    {
        $available_site = new AvailableSite;
        $available_sites = $available_site->getAllWithRelations();

        return view("admin.available-sites.index", ["available_sites" => $available_sites]);
    }

    public function create()
    {
        $site = new Site;
        $sites = $site->getAll();

        $pitch_type = new PitchType;
        $pitch_types = $pitch_type->getAll();

        return view("admin.available-sites.create", ["sites" => $sites, "pitch_types" => $pitch_types]);
    }

    public function store()
    {
        $data = request()->all();

        $validator = validator($data, [
            "SiteID" => ["required"],
            "PitchTypeID" => ["required"]
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/admin/available-sites/create");
        }

        $site = new AvailableSite;
        $site = $site->createOrUpdate($data);

        // TODO: flush message

        return redirect("/admin/available-sites");
    }

    public function edit($routePrams)
    {

        $available_site = new AvailableSite;
        $available_site = $available_site->firstByIDWithRelations($routePrams["available_site_id"]);

        // TODO: fail if not found

        $site = new Site;
        $sites = $site->getAll();

        foreach ($sites as $index => $site) {
            $site["selected"] = $available_site["SiteID"] === $site["SiteID"];

            $sites[$index] = $site;
        }

        $pitch_type = new PitchType;
        $pitch_types = $pitch_type->getAll();

        foreach ($pitch_types as $index => $pitch_type) {
            $pitch_type["selected"] = $available_site["PitchTypeID"] === $pitch_type["PitchTypeID"];

            $pitch_types[$index] = $pitch_type;
        }

        return view("admin.available-sites.edit", ["available_site" => $available_site, "sites" => $sites, "pitch_types" => $pitch_types]);
    }

    public function update($routePrams)
    {
        $data = request()->all();

        $available_site = new AvailableSite;
        $available_site = $available_site->update($routePrams["available_site_id"], $data);

        // TODO: flush message

        return redirect("/admin/available-sites");
    }

    public function delete($routePrams)
    {
        $available_site = new AvailableSite;
        $available_site = $available_site->deleteByID($routePrams["available_site_id"]);

        // TODO: fail if not found

        return redirect("/admin/available-sites");
    }
}
