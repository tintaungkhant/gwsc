<?php

require_once "autoload.php";
require_once "helpers.php";

session_start();

$routes = reigsterRoutes();

$uri = $_SERVER['REQUEST_URI'];

$uri = rtrim($uri, '/');

$routePrams = [];

matchRoute($routes, $uri, $routePrams);

function reigsterRoutes()
{
    $route_groups = require_once "routes.php";

    $routes = [];

    foreach ($route_groups as $route_group) {
        foreach ($route_group["routes"] as $route => $action) {
            $route_name = $route === "/" ? $route_group["prefix"] : $route_group["prefix"] . $route;
            $routes[$route_name] = [
                "middleware" => $route_group["middleware"],
                "action" => $action,
            ];
        }
    }

    return $routes;
}

function matchRoute($routes, $uri, &$routePrams)
{
    foreach ($routes as $route_name => $route) {
        if (checkIfMatch($route_name, $uri, $routePrams)) {
            $middleware = $route["middleware"];
            if($middleware){
                (new $route["middleware"])->handle();
            }

            $controller =  $route["action"][0];
            $action = $route["action"][1];

            (new $controller)->$action($routePrams);
            return;
        } else {
            $routePrams = [];
        }
    }

    header("HTTP/1.0 404 Not Found");
    echo '404 - Page not found';
    return;
}

function checkIfMatch($route_name, $uri, &$routePrams)
{
    $route_name = explode("/", $route_name);

    $queryParams = array_merge($routePrams, getParamArray($uri));

    $trimedUri = strstr($uri, '?', true);

    $uri = $trimedUri ? $trimedUri : $uri;
    
    $uri = explode("/", $uri);

    $match = true;

    if (count($route_name) === count($uri)) {
        foreach ($route_name as $index => $segment) {
            if ($match) {
                if (str_contains($segment, "{")) {
                    $routePrams[extractSegmentWord($segment)] = $uri[$index];
                } else {
                    $match = $segment == $uri[$index];
                }
            }
        }
    } else {
        $match = false;
    }

    if($match){
        $routePrams = array_merge($queryParams, $routePrams);
    }

    return $match;
}

function extractSegmentWord($segment)
{
    $pattern = '/\{(.*?)\}/';
    preg_match($pattern, $segment, $matches);
    return $matches[1];
}

function getParamArray($uri){
    $params = [];

    $pos = strpos($uri, '?');

    $queryString = "";

    if ($pos !== false) {
        $queryString = substr($uri, $pos + 1);
    }

    if($queryString){
        $queryParts = explode('&', $queryString);

        foreach ($queryParts as $part) {
            list($key, $value) = explode('=', $part);
            $params[$key] = urldecode($value);
        }
    }    
    
    return $params;
}