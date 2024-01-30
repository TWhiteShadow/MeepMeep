<?php

namespace App\Controller;
require '../config/parameters.php';

use App\Router\Router;
use App\Database\Database;
use PDO;

class CarController
{
    private string $path = "../src/Template/car/";
    public function index()
    {
        include "meep.php";
    }

    public function show($id)
    {

        $db = Database::connect();
        $car = $db->prepare("SELECT * FROM cars WHERE id = :id");
        $car->bindParam(":id", $id);
        $car->execute();
        $car = $car->fetch();

        if (isset($car)) {
            include $this->path."show.php";
        } else {
            header("Location: /404");
        }
    }

    public function edit($id)
    {

        $db = Database::connect();
        $car = $db->prepare("SELECT * FROM cars WHERE id = :id");
        $car->bindParam(":id", $id);
        $car->execute();
        $car = $car->fetch();

        if (isset($car)) {
            include $this->path . "edit.php";
        } else {
            header("Location: /404");
        }
    }

    public function update($id)
    {

        $db = Database::connect();
        $car = $db->prepare("SELECT * FROM cars WHERE id = :id");
        $car->bindParam(":id", $id);
        $car->execute();
        $car = $car->fetch();

        if (isset($car)) {
            $name = $_POST['Name'];
            $Miles_per_Gallon = $_POST['Miles_per_Gallon'];
            $Cylinders = $_POST['Cylinders'];
            $Displacement = $_POST['Displacement'];
            $Horsepower = $_POST['Horsepower'];
            $Weight_in_lbs = $_POST['Weight_in_lbs'];
            $Acceleration = $_POST['Acceleration'];
            $Year = $_POST['Year'];
            $Origin = $_POST['Origin'];
            $photo = $_POST['photo'];
            
            $update = $db->prepare("UPDATE cars SET Name = :name, Miles_per_Gallon = :mpg, Cylinders = :cylinders, Displacement = :displacement,
            Horsepower = :hp, Weight_in_lbs = :weight, Acceleration = :accel, Year = :year, Origin = :origin, photo = :photo WHERE id = :id");
            $update->bindParam(":name", $name, PDO::PARAM_STR);
            $update->bindParam(":mpg", $Miles_per_Gallon);
            $update->bindParam(":cylinders", $Cylinders);
            $update->bindParam(":displacement", $Displacement);
            $update->bindParam(":hp", $Horsepower);
            $update->bindParam(":weight", $Weight_in_lbs);
            $update->bindParam(":accel", $Acceleration);
            $update->bindParam(":year", $Year);
            $update->bindParam(":origin", $Origin);
            $update->bindParam(":photo", $photo);
            $update->bindParam(":id", $id);

            $update->execute();

            Router::redirect(Router::use('show_car', $id), 3);
        } else {
            Router::redirect(Router::use('welcome'), 3);
        }
    }
}