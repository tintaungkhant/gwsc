<?php

namespace App\Controllers\Admin;

use App\Models\LocalAttraction;

class LocalAttractionController
{
    public function index()
    {
        $local_attraction = new LocalAttraction;
        $local_attractions = $local_attraction->getAll();

        return view("admin.local-attractions.index", ["local_attractions" => $local_attractions]);
    }

    public function create()
    {
        return view("admin.local-attractions.create");
    }

    public function store()
    {
        $data = request()->all();

        $validator = validator($data, [
            "LocalAttractionName" => ["required"],
            "LocalAttractionImage" => ["required", "image"],
            "LocalAttractionDescription" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/admin/local-attractions/create");
        }

        $upload_file_path = uploadFilePath(getFileExt($data["LocalAttractionImage"]["name"]));

        move_uploaded_file($data["LocalAttractionImage"]["tmp_name"], $upload_file_path);

        $data["LocalAttractionImage"] = $upload_file_path;

        $site = new LocalAttraction;
        $site->create($data);

        // TODO: flush message

        return redirect("/admin/local-attractions");
    }

    public function edit($routePrams)
    {
        $local_attraction = new LocalAttraction;
        $local_attraction = $local_attraction->firstByID($routePrams["local_attraction_id"]);

        // TODO: fail if not found

        return view("admin.local-attractions.edit", ["local_attraction" => $local_attraction]);
    }

    public function update($routePrams)
    {
        $data = request()->all();

        $validator = validator($data, [
            "LocalAttractionName" => ["required"],
            "OldLocalAttractionImage" => ["required"],
            "LocalAttractionImage" => ["nullable", "image"],
            "LocalAttractionDescription" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/admin/local-attractions/" . $routePrams["local_attraction_id"] . "/edit");
        }

        if($data["LocalAttractionImage"]["name"]){
            $upload_file_path = uploadFilePath(getFileExt($data["LocalAttractionImage"]["name"]));

            move_uploaded_file($data["LocalAttractionImage"]["tmp_name"], $upload_file_path);
    
            $data["LocalAttractionImage"] = $upload_file_path;
        }else{
            $data["LocalAttractionImage"] = $data["OldLocalAttractionImage"];

        }
        
        unset($data["OldLocalAttractionImage"]);

        $site = new LocalAttraction;
        $site->update($routePrams["local_attraction_id"], $data);

        // TODO: flush message

        return redirect("/admin/local-attractions");
    }

    public function delete($routePrams)
    {
        $site = new LocalAttraction;
        $site = $site->deleteByID($routePrams["local_attraction_id"]);

        // TODO: fail if not found

        return redirect("/admin/local-attractions");
    }
}
