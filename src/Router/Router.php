<?php

namespace App\Router;

class Router
{
    public $url;
    public $routes = [];

    public function __construct($url)
    {
        $this->url = trim($url,'/');

    }

    public function post(string $path, string $action)
    {
        $this->routes['POST'][] = new Route($path,$action);
    }
    public function get(string $path, string $action)
    {
        $this->routes['GET'][] = new Route($path,$action);
    }

    public function run()
    {
        
       
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
       
            if($route->matches($this->url)){
                $route->execute();
            }
        }   

        // return header("HTTP/1.0 404 Not Found");
    }

}

