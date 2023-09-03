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
        // TODO: validation

        var_dump(request()->all());

        $username = request()->get("AdminUserName");
        $password = request()->get("AdminPassword");

        $admin = new Admin;
        $admin = $admin->firstByUsernameAndPassword($username, hash("md5", $password));

        if($admin){
            session()->set("admin", $admin);
            return redirect("/admin");
        }else{
            // TODO: flush message
        }
    }
}
