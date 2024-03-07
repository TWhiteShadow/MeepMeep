<?php
// src/DependencyInjection/SimpleContainer.php
namespace App\DependencyInjection;

class Container
{
    private $services = [];

    public function addService(string $id, $service): void
    {
        $this->services[$id] = $service;
    }

    public function getService(string $id)
    {
        if ($this->hasService($id)) {
            return $this->services[$id];
        }

        throw new \InvalidArgumentException("Le Service avec l'ID '$id' nn'est pas dans le container");
    }

    public function hasService(string $id): bool
    {
        return array_key_exists($id, $this->services);
    }
}
