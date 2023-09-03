<?php

use App\Controllers\Admin\HomeController;
use App\Controllers\Admin\LoginController;
use App\Controllers\Admin\SiteController;

return [
    [
        "middleware" => "",
        "prefix" => "/admin",
        "routes" => [
            "/" => [HomeController::class, "index"],
            "/login" => [LoginController::class, "index"],
            "/post-login" => [LoginController::class, "login"],
            "/sites" => [SiteController::class, "index"],
            "/sites/create" => [SiteController::class, "create"],
            "/sites/store" => [SiteController::class, "store"],
        ]
    ]
];