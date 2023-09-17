<?php

namespace App\Controllers\Admin;

use App\Models\Admin;
use App\Models\Site;

class SiteController
{
    public function index()
    {
        $site = new Site;
        $sites = $site->get();

        return view("admin.sites.index", ["sites" => $sites]);
    }

    public function create()
    {
        return view("admin.sites.create");
    }

    public function store()
    {
        $data = request()->all();

        $validator = validator($data, [
            "SiteName" => ["required"],
            "SiteDescription" => ["required"],
            "SiteLocation" => ["required"],
            "SiteImage" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/admin/sites/create");
        }

        $site = new Site;
        $site->create($data);

        // TODO: flush message

        return redirect("/admin/sites");
    }

    public function edit($routePrams)
    {
        $site = new Site;
        $site = $site->firstByID($routePrams["site_id"]);

        // TODO: fail if not found

        return view("admin.sites.edit", ["site" => $site]);
    }

    public function update($routePrams)
    {
        $data = request()->all();

        $validator = validator($data, [
            "SiteName" => ["required"],
            "SiteDescription" => ["required"],
            "SiteLocation" => ["required"],
            "SiteImage" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/admin/sites/" . $routePrams["site_id"] . "/edit");
        }

        $site = new Site;
        $site->update($routePrams["site_id"], $data);

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
