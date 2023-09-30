<?php

namespace App\Controllers\User;

class LogoutController
{
    public function index()
    {
        session()->set("user", []);

        return redirect("/login");
    }
}
