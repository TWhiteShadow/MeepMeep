<?php

require "../autoloader.php";


use App\Database\Database;
use App\DependencyInjection\Container;
use App\Router\Router;

$container = new Container();

$container->addService('App\Controller\HomeController', new App\Controller\HomeController(new Database()));
$container->addService('App\Controller\CarController', new App\Controller\CarController(new Database()));

$router = new Router($_SERVER["REQUEST_URI"], $container);

$router->get("/", "App\Controller\HomeController@index", "welcome");
$router->get("/meepmeep", "App\Controller\HomeController@index", "meepmeep");
$router->get("/car/{id}", "App\Controller\CarController@show", "show_car");
$router->get("/car/{id}/edit", "App\Controller\CarController@edit", "edit_car");
$router->post("/car/{id}/update", "App\Controller\CarController@update", "update_car");
$router->get("/404", "App\Controller\HomeController@notFound", "404_page");


$router->get("/test", "App\Controller\HomeController@test", "test");



$router->run();
