<?php

namespace App\Controller;
require '../config/parameters.php';

use App\Router\Router;
use App\Database\Database;
use App\Entity\Car;
use DateTime;
use PDO;

class CarController
{
    public function __construct(private Database $db){}
    private string $path = "../src/Template/car/";
    public function index()
    {
        if ($_GET['type'] == "json") {
            $carStatement = $this->db->prepare("SELECT * FROM cars");
            $carStatement->execute();
            $carsData = $carStatement->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($carsData);

            // $cars = [];
            // foreach ($carsData as $carData) {
            //     $car = new Car();
            //     $car->setId($carData['id'])
            //     ->setName($carData['Name'])
            //     ->setMilesPerGallon($carData['Miles_per_Gallon'])
            //     ->setCylinders($carData['Cylinders'])
            //     ->setDisplacement($carData['Displacement'])
            //     ->setHorsepower($carData['Horsepower'])
            //     ->setWeightInLbs($carData['Weight_in_lbs'])
            //     ->setAcceleration($carData['Acceleration'])
            //     ->setYear($carData['Year'] ? new DateTime($carData['Year']) : null)
            //     ->setOrigin($carData['Origin'])
            //     ->setPhoto($carData['photo']);

            //     $cars[] = $car;
            // }
            // var_dump($cars);
        }
    }


    public function show($id)
    {
        $car = $this->db->prepare("SELECT * FROM cars WHERE id = :id");
        $car->bindParam(":id", $id);
        $car->execute();
        $car = $car->fetch();

        if (isset($car)) {
            if (isset($_GET['type']) && $_GET['type'] == "json") {
                echo json_encode($car);
            }else{
                include $this->path."show.php";
            }
        } else {
            header("Location: /404");
        }
    }

    public function edit($id)
    {
    
        $car = $this->db->prepare("SELECT * FROM cars WHERE id = :id");
        $car->bindParam(":id", $id);
        $car->execute();
        $car = $car->fetch();

        if (isset($car)) {
            include $this->path . "edit.php";
        } else {
            header("Location: /404");
        }
    }

    public function api_store($id){
        if ($_REQUEST['type'] == "json") {
            $car = json_decode($_REQUEST['content']);
            // var_dump($car);
            if (isset($car)) {
                $name = $car->Name;
                $Miles_per_Gallon = $car->Miles_per_Gallon;
                $Cylinders = $car->Cylinders;
                $Displacement = $car->Displacement;
                $Horsepower = $car->Horsepower;
                $Weight_in_lbs = $car->Weight_in_lbs;
                $Acceleration = $car->Acceleration;
                $Year = $car->Year;
                $Origin = $car->Origin;
                $photo = $car->photo;

                $store = $this->db->prepare("INSERT INTO cars (Name, Miles_per_Gallon, Cylinders, Displacement, Horsepower, Weight_in_lbs, Acceleration, Year, Origin, photo)
                VALUES (:name, :mpg, :cylinders, :displacement, :hp, :weight, :accel, :year, :origin, :photo)");
                $store->bindParam(":name", $name, PDO::PARAM_STR);
                $store->bindParam(":mpg", $Miles_per_Gallon);
                $store->bindParam(":cylinders", $Cylinders);
                $store->bindParam(":displacement", $Displacement);
                $store->bindParam(":hp", $Horsepower);
                $store->bindParam(":weight", $Weight_in_lbs);
                $store->bindParam(":accel", $Acceleration);
                $store->bindParam(":year", $Year);
                $store->bindParam(":origin", $Origin);
                $store->bindParam(":photo", $photo);

                $store->execute();

                echo "Voiture ajoutée";
            }else{
                echo "Aucune voiture ajoutée";
            }
        }
    }

    public function api_update($id)
    {
        if ($_REQUEST['type'] == "json") {
            $car = json_decode($_REQUEST['content']);
            // var_dump($car);
            if (isset($car)) {
                $name = $car->Name;
                $Miles_per_Gallon = $car->Miles_per_Gallon;
                $Cylinders = $car->Cylinders;
                $Displacement = $car->Displacement;
                $Horsepower = $car->Horsepower;
                $Weight_in_lbs = $car->Weight_in_lbs;
                $Acceleration = $car->Acceleration;
                $Year = $car->Year;
                $Origin = $car->Origin;
                $photo = $car->photo;

                $update = $this->db->prepare("UPDATE cars SET Name = :name, Miles_per_Gallon = :mpg, Cylinders = :cylinders, Displacement = :displacement,
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

                echo "Voiture mise à jours";
            } else {
                echo "Aucune voiture mise à jours";
            }
        }
    }

    public function update($id)
    {

        $car = $this->db->prepare("SELECT * FROM cars WHERE id = :id");
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
            
            $update = $this->db->prepare("UPDATE cars SET Name = :name, Miles_per_Gallon = :mpg, Cylinders = :cylinders, Displacement = :displacement,
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