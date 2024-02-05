<?php

namespace App\Router;

use App\DependencyInjection\Container;

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

    public function execute(Container $container): void
    {
      $params = explode("@", $this->action);
      $controllerId = $params[0];

      if ($container->hasService($controllerId)) {
        $controller = $container->getService($controllerId);
        $method = $params[1];

        if (isset($this->matches[1])) {
          $controller->$method($this->matches[1]);
        } else {
          $controller->$method();
        }
      } else {
        throw new \InvalidArgumentException("Controller with ID '$controllerId' not found in the container.");
      }
    }

}