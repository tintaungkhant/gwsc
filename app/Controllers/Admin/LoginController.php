<?php

namespace App\Controllers\Admin;

use App\Models\Admin;

class LoginController
{
    public function index()
    {
        return view("admin.login");
    }

    public function login(){
        $data = request()->all();

        $validator = validator($data, [
            "AdminUserName" => ["required"],
            "AdminPassword" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/admin/login");
        }

        $username = $data["AdminUserName"];
        $password = $data["AdminPassword"];

        $admin = new Admin;
        $admin = $admin->firstByUsernameAndPassword($username, hash("md5", $password));

        if($admin){
            session()->set("admin", $admin);
            
            return redirect("/admin/sites");
        }else{
            setErrorMessages([
                "common" => ["Your account credential is wrong!"]
            ]);

            return redirect("/admin/login");
        }
    }
}
