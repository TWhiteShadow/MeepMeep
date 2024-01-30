<?php

require_once "../autoloader.php";

use App\Router\Router;
use App\Controller\CarController;


$projectName = "🚗 MeepMeep 🚗";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/index.css">
    <title><?= $projectName ?></title>
</head>

<body class="carInfo">
    <a href="/">
        <h1><?= $projectName ?></h1>
    </a>
    <div class="cars-container">
        <?php ?>
        <div class="car car-info">
            <form action="/<?= Router::use("update_car", $car['id']) ?>" method="post">
                <div class="car-header">
                    <div class="car-image">
                        <img id="previewPicture" src="<?= $car['photo'] ?>" alt="<?= ucwords($car["Name"]) ?> image">
                    </div>
                    <div class="input-group">
                    <div>
                        <input onchange="updatePreviewPicture()" id="inputPicture" required="" type="text" name="photo" autocomplete="off" class="input" value="<?= !empty($car["photo"]) ? $car["photo"] : "" ?>">
                        <label class="user-label">Picture :</label>
                    </div>
                        </div>

                        <div class="input-group">
                        <div>
                            <input required="" type="text" name="Name" autocomplete="off" class="input" value="<?= !empty($car["Name"]) ? $car["Name"] : "" ?>">
                            <label class="user-label">Name :</label>
                        </div>
                        </div>
                </div>
                <div class="car-content car-content-info">
                    <div>
                        <div class="input-group">
                        <div>
                            <input required="" type="text" name="Horsepower" autocomplete="off" class="input" value="<?= !empty($car["Horsepower"]) ? $car["Horsepower"] : "" ?>">
                            <label class="user-label">Horsepower (@rpm) :</label>
                        </div>
                        </div>

                        <div class="input-group">
                        <div>
                            <input required="" type="text" name="Miles_per_Gallon" autocomplete="off" class="input" value="<?= !empty($car["Miles_per_Gallon"]) ? $car["Miles_per_Gallon"] : "" ?>">
                            <label class="user-label">Miles per gallon :</label>
                        </div>
                        </div>
                    </div>
                    <div>
                        <div class="input-group">
                        <div>
                            <input required="" type="text" name="Cylinders" autocomplete="off" class="input" value="<?= !empty($car["Cylinders"]) ? $car["Cylinders"] : "" ?>">
                            <label class="user-label">Cylinders :</label>
                        </div>
                        </div>
                        
                        <div class="input-group">
                        <div>
                            <input required="" type="text" name="Displacement" autocomplete="off" class="input" value="<?= !empty($car["Displacement"]) ? $car["Displacement"] : "" ?>">
                            <label class="user-label">Displacement :</label>
                        </div>
                        </div>
                    </div>
                    <div>
                        <div class="input-group">
                        <div>
                            <input required="" type="text" name="Weight_in_lbs" autocomplete="off" class="input" value="<?= !empty($car["Weight_in_lbs"]) ? $car["Weight_in_lbs"] : "" ?>">
                            <label class="user-label">Weight (in lb) :</label>
                        </div>
                        </div>
                        
                        <div class="input-group">
                        <div>
                            <input required="" type="text" name="Acceleration" autocomplete="off" class="input" value="<?= !empty($car["Acceleration"]) ? $car["Acceleration"] : "" ?>">
                            <label class="user-label">Acceleration (0 - 60 mph) :</label>
                        </div>
                        </div>
                    </div>
                    <div>
                        <div class="input-group">
                        <div>
                            <input required="" type="text" name="Origin" autocomplete="off" class="input" value="<?= !empty($car["Origin"]) ? $car["Origin"] : "" ?>">
                            <label class="user-label">Origin :</label>
                        </div>
                        </div>

                        <div class="input-group">
                        <div>
                            <input required="" type="text" name="Year" autocomplete="off" class="input" value="<?= !empty($car["Year"]) ? $car["Year"] : "" ?>">
                            <label class="user-label">Year :</label>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="submit-button-container">
                    <button class="submit-button" type="submit">Validate Changes</button>
                </div>
            </form>
        </div>
        <script type="text/javascript">
            function updatePreviewPicture(){
                console.log(document.getElementById('inputPicture').value);
                document.getElementById('previewPicture').src = document.getElementById('inputPicture').value;
            };
        </script>
</body>

</html>