<?php

namespace App\Controllers\Admin;

use App\Models\Feature;

class FeatureController
{
    public function index()
    {
        $admin = new Feature;
        $features = $admin->getAll();

        return view("admin.features.index", ["features" => $features]);
    }

    public function create()
    {
        return view("admin.features.create");
    }

    public function store()
    {
        $data = request()->all();

        $validator = validator($data, [
            "FeatureName" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/admin/features/create");
        }

        $site = new Feature;
        $site->create($data);

        // TODO: flush message

        return redirect("/admin/features");
    }

    public function edit($routePrams)
    {
        $feature = new Feature;
        $feature = $feature->firstByID($routePrams["feature_id"]);

        // TODO: fail if not found

        return view("admin.features.edit", ["feature" => $feature]);
    }

    public function update($routePrams)
    {
        $data = request()->all();

        $validator = validator($data, [
            "FeatureName" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/admin/features/" . $routePrams["feature_id"] . "/edit");
        }

        $site = new Feature;
        $site->update($routePrams["feature_id"], $data);

        // TODO: flush message

        return redirect("/admin/features");
    }

    public function delete($routePrams)
    {
        $site = new Feature;
        $site = $site->deleteByID($routePrams["feature_id"]);

        // TODO: fail if not found

        return redirect("/admin/features");
    }
}
