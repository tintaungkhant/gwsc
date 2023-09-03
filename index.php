<?php

require_once "autoload.php";
require_once "helpers.php";

$routes = reigsterRoutes();

$uri = $_SERVER['REQUEST_URI'];

matchRoute($routes, $uri);

function reigsterRoutes(){
    $route_groups = require_once "routes.php";

    $routes =[];

    foreach($route_groups as $route_group){
        foreach($route_group["routes"] as $route => $action){
            $route_name = $route === "/" ? $route_group["prefix"] : $route_group["prefix"].$route;
            $routes[$route_name] = [
                "middleware" => $route_group["middleware"],
                "action" => $action,
            ];
        }
    }

    return $routes;
}

function matchRoute($routes, $uri){
    if (array_key_exists($uri, $routes)) {
        $route = $routes[$uri];
    
        $controller =  $route["action"][0];
        $action = $route["action"][1];
    
        (new $controller)->$action();
    } else {
        header("HTTP/1.0 404 Not Found");
        echo '404 - Page not found';
    }
}