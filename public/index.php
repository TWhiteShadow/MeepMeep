<?php

require "../autoloader.php";


use App\Router\Router;

$url = $_SERVER["REQUEST_URI"];
// Instantiate the Router
$router = new Router($url);

$router->get("/test", "App\Controller\HomeController@test");
$router->get("/", "App\Controller\HomeController@index");
$router->run();
