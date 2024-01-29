<?php
$projectName = "MeepMeep 🚗";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title><?= $projectName ?></title>
</head>

<body>
    <h1><?= $projectName ?></h1>
    <div class="cars-container">
        <?php
        $array = json_decode(file_get_contents("../cars.json"), true);
        
        // print_r($array);
        //
        foreach ($array as $car) {
        ?>
            <div class="car">
                <h2><?= $car["Name"] ?></h2>
                <p><?= $car["Miles_per_Gallon"] ?></p>
                <p><?= $car["Cylinders"] ?></p>
                <p><?= $car["Displacement"] ?></p>
                <p><?= $car["Horsepower"] ?></p>
                <p><?= $car["Weight_in_lbs"] ?></p>
                <p><?= $car["Acceleration"] ?></p>
                <p><?= $car["Year"] ?></p>
                <p><?= $car["Origin"] ?></p>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>