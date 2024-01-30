<?php

namespace App\Controller;

class CarController
{
    private string $path = "../src/Template/car/";
    public function index()
    {
        include "meep.php";
    }

    public function show($id)
    {

        $array = json_decode(file_get_contents("../cars.json"), true);
        foreach ($array as $key => $value) {
            if ($value["id"] == $id) {
                $car = $value;
                break;
            }
        }
        if (isset($car)) {
            include $this->path."show.php";
        } else {
            header("Location: /404");
        }
    }

    public function edit($id)
    {

        $array = json_decode(file_get_contents("../cars.json"), true);
        foreach ($array as $key => $value) {
            if ($value["id"] == $id) {
                $car = $value;
                break;
            }
        }
        if (isset($car)) {
            include $this->path . "edit.php";
        } else {
            header("Location: /404");
        }
    }

    public function update($id)
    {
        var_dump($_POST);
        
        $array = json_decode(file_get_contents("../cars.json"), true);
        foreach ($array as $key => $value) {
            if ($value["id"] == $id) {
                $car = $value;
                break;
            }
        }
        if (isset($car)) {
            include "show.php";
        } else {
            header("Location: /404");
        }
    }
}