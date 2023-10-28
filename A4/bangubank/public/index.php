<?php

require_once __DIR__ . "/../vendor/autoload.php";
use App\Session\Session;
Session::startSession();
//to show errors in web browsers
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


$routes = require_once __DIR__ . "/../routes/web.php";
$requestURI = $_SERVER['REQUEST_URI'];
$request = explode("?", $requestURI)[0];
if(isset($routes[$request]))
{
    $controllerName = $routes[$request][0] ?? null;
    $controllerMethod = $routes[$request][1] ?? null;
    if($controllerName && $controllerMethod)
    {
        $newControllerObject = new $controllerName();
        $newControllerObject->$controllerMethod();
    }
}
else{
    echo("404 not found");
}
