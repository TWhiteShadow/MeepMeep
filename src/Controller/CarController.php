<?php

namespace App\Controller;

use App\Router\Router;
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
        //var_dump($_POST);
        $carExist = false;
        $array = json_decode(file_get_contents("../cars.json"), true);
        foreach ($array as &$car) {
            if ($car["id"] == $id) {
                $carExist = true;
                $car["Name"] = $_POST['Name'];
                $car["Miles_per_Gallon"] = $_POST['Miles_per_Gallon'];
                $car["Cylinders"] = $_POST['Cylinders'];
                $car["Displacement"] = $_POST['Displacement'];
                $car["Horsepower"] = $_POST['Horsepower'];
                $car["Weight_in_lbs"] = $_POST['Weight_in_lbs'];
                $car["Acceleration"] = $_POST['Acceleration'];
                $car["Year"] = $_POST['Year'];
                $car["Origin"] = $_POST['Origin'];
                $car["photo"] = $_POST['photo'];

                break;
            }
        }
        if ($carExist === true) {
            // include "update.php";
            // file_put_contents("../../cars.json", json_encode($array, JSON_PRETTY_PRINT));
            // Rediriger ou afficher la page mise à jour
        } else {
            Router::redirect(Router::use('welcome'), 3);
        }
    }
}