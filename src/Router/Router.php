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
                    // print_r($route);
                    if($route->getPath() === ""){
                        // Si c'est la route par défault ( "/" ) et qu'on est en localhost
                        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                        $path = explode("/", $url); 
                        // var_dump($path, "<br>");
                        $path = "/";
                        $newurl = $path;
                        // var_dump($newurl, "<br>");
                        return $newurl;
                    }
                    $url =  $route->getPath();
                    if($id !== null){
                        $url = str_replace("{id}", $id, $url);
                    }
                    return $url;
                }
            }
        }

        return null; 
    }


    public static function assets(string $folder, string $filename)
    {
        $baseUrl = $_SERVER['SCRIPT_NAME'];
        $url = str_replace("index.php", "", $baseUrl);
        $url .= $folder . "/" . $filename;
        return $url;
    }

    public static function redirect(string $route, int $nbPathToDelete)
    {

        $domain = 'http://' . $_SERVER['HTTP_HOST'];

        // Construisez l'URL de redirection en utilisant les fonctions de routage
        $path = implode('/', array_slice(explode('/', $_SERVER['REQUEST_URI']), 0, -$nbPathToDelete)) . '/' . $route;
        $url = $domain . str_replace("//","/", $path);
        // Effectuez la redirection
        header('Location: ' . $url);
        exit;
    }
    


}
