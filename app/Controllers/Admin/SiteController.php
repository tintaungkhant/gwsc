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

        return view("admin.sites.index");
    }

    public function create(){
        return view("admin.sites.create");
    }

    public function store(){
        // TODO: validation
        $data = request()->all();

        $site = new Site;
        $site->create($data);

        // TODO: flush message

        return redirect("/admin/sites");
    }
}
