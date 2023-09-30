<?php

namespace App\Controllers\Admin;

use App\Models\Admin;

class LogoutController
{
    public function index()
    {
        session()->set("admin", []);

        return redirect("/admin/login");
    }
}
