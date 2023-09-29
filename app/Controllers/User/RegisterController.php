<?php

namespace App\Controllers\User;

use App\Models\PitchType;
use App\Models\Site;
use App\Models\User;

class RegisterController
{
    public function index()
    {
        return view("user.register");
    }

    public function register()
    {
        $data = request()->all();

        $validator = validator($data, [
            "UserFirstName" => ["required"],
            "UserLastName" => ["required"],
            "UserEmail" => ["required"],
            "UserPassword" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/register");
        }

        $data["UserPassword"] = hash("md5", $data["UserPassword"]);

        $user = new User;
        $user = $user->create($data);

        session()->set("user", $user);

        return redirect("/");
    }
}
