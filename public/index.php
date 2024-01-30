<?php

require "../autoloader.php";


use App\Router\Router;

$url = $_SERVER["REQUEST_URI"];
// Instantiate the Router
$router = new Router($url);

$router->get("/", "App\Controller\HomeController@index", "welcome");
$router->get("/meepmeep", "App\Controller\HomeController@index", "meepmeep");
$router->get("/car/{id}", "App\Controller\CarController@show", "show_car");
$router->get("/car/{id}/edit", "App\Controller\CarController@edit", "edit");
$router->post("/car/{id}/update", "App\Controller\CarController@update", "update_car");
$router->get("/404", "App\Controller\HomeController@notFound", "404_page");


$router->get("/test", "App\Controller\HomeController@test", "test");



$router->run();
