<?php

namespace App\Controllers\Admin;

use App\Models\PitchType;

class PitchTypeController
{
    public function index()
    {
        $pitch_type = new PitchType;
        $pitch_types = $pitch_type->getAll();

        return view("admin.pitch-types.index", ["pitch_types" => $pitch_types]);
    }

    public function create()
    {
        return view("admin.pitch-types.create");
    }

    public function store()
    {
        $data = request()->all();

        $validator = validator($data, [
            "PitchTypeName" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/admin/pitch-types/create");
        }

        $site = new PitchType;
        $site->create($data);

        // TODO: flush message

        return redirect("/admin/pitch-types");
    }

    public function edit($routePrams)
    {
        $pitch_type = new PitchType;
        $pitch_type = $pitch_type->firstByID($routePrams["pitch_type_id"]);

        // TODO: fail if not found

        return view("admin.pitch-types.edit", ["pitch_type" => $pitch_type]);
    }

    public function update($routePrams)
    {
        $data = request()->all();

        $validator = validator($data, [
            "PitchTypeName" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/admin/pitch-types/" . $routePrams["pitch_type_id"] . "/edit");
        }

        $site = new PitchType;
        $site->update($routePrams["pitch_type_id"], $data);

        // TODO: flush message

        return redirect("/admin/pitch-types");
    }

    public function delete($routePrams)
    {
        $site = new PitchType;
        $site = $site->deleteByID($routePrams["pitch_type_id"]);

        // TODO: fail if not found

        return redirect("/admin/pitch-types");
    }
}
