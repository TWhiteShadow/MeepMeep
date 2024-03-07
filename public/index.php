<?php

require "../autoloader.php";

use App\Database\Database;
use App\DependencyInjection\Container;
use App\Event\EmailListener;
use App\Router\Router;  
use App\Event\EventDispatcher;
use App\Event\Mail;

$eventDispatcher = new EventDispatcher();
$emailListener = new EmailListener(new Mail());

$eventDispatcher->addListener('car.created', [$emailListener, 'onCarCreated']);
$eventDispatcher->addListener('car.updated', [$emailListener, 'onCarUpdated']);
$eventDispatcher->addListener('car.deleted', [$emailListener, 'onCarDeleted']);

$container = new Container();

$container->addService('App\Controller\HomeController', new App\Controller\HomeController(new Database()));
$container->addService('App\Controller\CarController', new App\Controller\CarController(new Database(), $eventDispatcher));

$router = new Router($_SERVER["REQUEST_URI"], $container);

$router->get("/", "App\Controller\HomeController@index", "welcome");

$router->get("/meepmeep", "App\Controller\HomeController@index", "meepmeep");
$router->get("/cars", "App\Controller\CarController@index", "cars");
$router->get("/cars/{id}", "App\Controller\CarController@show", "show_car");
$router->put("/cars/{id}", "App\Controller\CarController@api_update", "api_update_car");
$router->post("/cars", "App\Controller\CarController@api_store", "api_store_car");
$router->get("/car/{id}/edit", "App\Controller\CarController@edit", "edit_car");
$router->post("/car/{id}/update", "App\Controller\CarController@update", "update_car");
$router->get("/404", "App\Controller\HomeController@notFound", "404_page");


$router->get("/test", "App\Controller\HomeController@test", "test");



$router->run();