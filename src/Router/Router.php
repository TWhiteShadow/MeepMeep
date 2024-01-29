<?php

namespace App\Router;

class Router
{
    public $url;
    static public $routes = [];

    public function __construct($url)
    {
        $this->url = trim($url,'/');

    }

    public function post(string $path, string $action, string $name) : void
    {
        self::$routes['POST'][] = new Route($path, $action, $name); 
    }

    public function get(string $path, string $action, string $name) : void
    {
        self::$routes['GET'][] = new Route($path, $action, $name); 
    }

    public function run()
    {
        $matched = false;
        foreach(self::$routes[$_SERVER['REQUEST_METHOD']] as $route){
            if ($route->matches($this->url)) {
                $route->execute();
                $matched = true;
            }
        }

        if (!$matched) {
            header("Location: /404");
            exit();
        }
    }

    public static function use(string $routeName, int $id = null) : ?string
    {
        foreach (self::$routes as $methodRoutes) {
            foreach ($methodRoutes as $route) {
                if ($route->getName() === $routeName) {
                    if($route->getPath() === ""){
                        // Si c'est la route par défault ( "/" ) et qu'on est en localhost
                        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                        $path = explode("/", $url);
                        array_pop($path);
                        $newurl = implode("/",$path);
                        return $newurl;
                    }
                    $url =  $route->getPath();
                    if($id !== null){
                        $url = str_replace(":id", $id, $url);
                    }
                    return $url;
                }
            }
        }

        return null; 
    }

    


}
