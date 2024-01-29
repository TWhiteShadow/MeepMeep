<?php
$projectName = "MeepMeep 🚗";
$numberOfCards = 9;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title><?=$projectName?></title>
</head>
<body>
    <h1><?=$projectName?></h1>
    <div class="cars-container">
    <?php
        $array = json_decode(file_get_contents("../cars.json"), true);
        shuffle($array);
        $array = array_slice($array, 0, $numberOfCards);
        foreach ($array as $car) { ?>
            <div class="car">
                <div class="car-header">
                    <img src="" alt="meep">
                    <h2><?= ucwords($car["Name"])?></h2>
                </div>
                <div class="car-content">
                    <p>Horsepower (@rpm) : <span><?=$car["Horsepower"]?></span></p>
                    <p>Miles per gallon : <span><?=$car["Miles_per_Gallon"]?></span></p>
                    <p>Cylinders : <span><?=$car["Cylinders"]?></span></p>
                    <p>Displacement : <span><?=$car["Displacement"]?></span></p>
                    <p>Weight (in lb) : <span><?=$car["Weight_in_lbs"]?></span></p>
                    <p>Acceleration (0 - 60 mph) : <span><?=$car["Acceleration"]?></span></p>
                    <p>Year : <span><?=$car["Year"]?></span></p>
                    <p>Origin : <span><?=$car["Origin"]?></span></p>
                    <button>Book Now</button>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>