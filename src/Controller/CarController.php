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
        foreach ($array as $key => $value) {
            if ($value["id"] == $id) {
                $carExist = true;
                $value["Name"] = $_POST['Name'];
                $value["Miles_per_Gallon"] = $_POST['Miles_per_Gallon'];
                $value["Cylinders"] = $_POST['Cylinders'];
                $value["Displacement"] = $_POST['Displacement'];
                $value["Horsepower"] = $_POST['Horsepower'];
                $value["Weight_in_lbs"] = $_POST['Weight_in_lbs'];
                $value["Acceleration"] = $_POST['Acceleration'];
                $value["Year"] = $_POST['Year'];
                $value["Origin"] = $_POST['Origin'];
                $value["photo"] = $_POST['photo'];

                break;
            }
        }
        if ($carExist === true) {
            file_put_contents("../../cars.json", json_encode($array, JSON_PRETTY_PRINT));
            // Rediriger ou afficher la page mise à jour
            Router::redirect(Router::use('show_car', $id), 3);
        } else {
            Router::redirect(Router::use('welcome'), 3);
        }
    }
}