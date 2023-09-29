<?php

namespace App\Controllers\User;

use App\Models\Admin;
use App\Models\User;

class LoginController
{
    public function index()
    {
        return view("user.login");
    }

    public function login(){
        $data = request()->all();

        $validator = validator($data, [
            "UserEmail" => ["required"],
            "UserPassword" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/login");
        }

        $email = $data["UserEmail"];
        $password = $data["UserPassword"];

        $user = new User;
        $user = $user->firstByUsernameAndPassword($email, hash("md5", $password));

        if($user){
            session()->set("user", $user);
            
            return redirect("/");
        }else{
            setErrorMessages([
                "common" => ["Your account credential is wrong!"]
            ]);

            return redirect("/login");
        }
    }
}
