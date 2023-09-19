<?php

namespace App\Controllers\Admin;

use App\Models\Admin;

class AdminController
{
    public function index()
    {
        $admin = new Admin;
        $admins = $admin->getAll();

        return view("admin.admins.index", ["admins" => $admins]);
    }

    public function create()
    {
        return view("admin.admins.create");
    }

    public function store()
    {
        $data = request()->all();

        $validator = validator($data, [
            "AdminUsername" => ["required"],
            "AdminPassword" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/admin/admins/create");
        }

        $data["AdminPassword"] = hash("md5", $data["AdminPassword"]);

        $site = new Admin;
        $site->create($data);

        // TODO: flush message

        return redirect("/admin/admins");
    }

    public function edit($routePrams)
    {
        $admin = new Admin;
        $admin = $admin->firstByID($routePrams["admin_id"]);

        // TODO: fail if not found

        return view("admin.admins.edit", ["admin" => $admin]);
    }

    public function update($routePrams)
    {
        $data = request()->all();

        $validator = validator($data, [
            "AdminUsername" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/admin/admins/" . $routePrams["admin_id"] . "/edit");
        }

        if(isset($data["AdminPassword"]) && !empty($data["AdminPassword"])){
            $data["AdminPassword"] = hash("md5", $data["AdminPassword"]);
        }else{
            unset($data["AdminPassword"]);
        }

        $site = new Admin;
        $site->update($routePrams["admin_id"], $data);

        // TODO: flush message

        return redirect("/admin/admins");
    }

    public function delete($routePrams)
    {
        $site = new Admin;
        $site = $site->deleteByID($routePrams["admin_id"]);

        // TODO: fail if not found

        return redirect("/admin/admins");
    }
}
