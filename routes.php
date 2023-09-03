<?php

use App\Controllers\HomeController;

return [
    [
        "middleware" => "",
        "prefix" => "/admin",
        "routes" => [
            "/" => [HomeController::class, "index"],
            "/login" => [HomeController::class, "login"],
        ]
    ]
];