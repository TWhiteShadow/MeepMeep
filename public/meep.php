<?php
$numberOfCards = 27;
$pageName = 'Browse';
$projectName = "🚗 MeepMeep 🚗"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title><?=$projectName?> - <?=$pageName?></title>
</head>
<body>
    <a href="/"><h1><?=$projectName?></h1></a>
    
    <div class="cars-container">
        <?php
        shuffle($cars);
        $cars = array_slice($cars, 0, $numberOfCards);
        foreach ($cars as $car) { ?>
            <div class="car">
                <div class="car-header">
                    <div class="car-image">
                        <img src="<?=$car['photo']?>" alt="<?=ucwords($car["Name"])?> image">
                    </div>
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
                </div>
                <div class="learn-more-container">
                    <a class="learn-more" href='car/<?=$car['id']?>'>
                        <span class="circle" aria-hidden="true">
                            <span class="icon arrow"></span>
                        </span>
                        <span class="learn-more-text">Book now!</span>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
</body>
</html>