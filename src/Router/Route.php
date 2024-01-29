<?php

namespace App\Router;

class Route{
    public string $path;
    public string $action;
    public array $matches;
    public string $name;

    public function __construct($path, $action, $name)
    {
        $this->path = trim($path,'/');
        $this->action = $action;
        $this->name = $name;
    }

    public function getName() : string
    {
		return $this->name;
    }

    public function getPath() : string
    {
		return $this->path;
    }

    public function setPath(string $path) : static
    {
		$this->path = $path;

		return $this;
    }

    public function matches(string $url) : bool
    {   
        $path = preg_replace('#\{(\w+)\}#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";
        
        if (preg_match($pathToMatch, $url, $matches)) {
            $this->matches = $matches; // Assign $matches to $this->matches
            return true;
        }
        return false;
    }

    public function execute() : null
    {
        $params = explode("@", $this->action);
        $controller = new $params[0]();
        $method = $params[1];
        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) :  $controller->$method();
    }


    

	
    

}