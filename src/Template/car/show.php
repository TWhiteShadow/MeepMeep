<?php
$projectName = "🚗 MeepMeep 🚗";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css">
    <title><?=$projectName?></title>
</head>
<body class="carInfo">
    <a href="/"><h1><?=$projectName?></h1></a>
    <div class="cars-container">
        <?php ?>
        <div class="car car-info">
            <div class="car-header">
                <div class="car-image">
                    <img src="<?=$car['photo']?>" alt="<?=ucwords($car["Name"])?> image">
                </div>
                <h2><?= ucwords($car["Name"])?></h2>
            </div>
            <div class="car-content car-content-info">
                <div>
                    <p>Horsepower (@rpm) : <span><?=$car["Horsepower"]?></span></p>
                    <p>Miles per gallon : <span><?=$car["Miles_per_Gallon"]?></span></p>
                </div>
                <div>

                    <p>Cylinders : <span><?=$car["Cylinders"]?></span></p>
                    <p>Displacement : <span><?=$car["Displacement"]?></span></p>
                </div>
                <div>
                    <p>Weight (in lb) : <span><?=$car["Weight_in_lbs"]?></span></p>
                    <p>Acceleration (0 - 60 mph) : <span><?=$car["Acceleration"]?></span></p>
                </div>
                <div>
                    <p>Origin : <span><?=$car["Origin"]?></span></p>
                    <p>Year : <span><?=$car["Year"]?></span></p>
                </div>
                    
            </div>
            <div class="learn-more-container">
                <a class="learn-more" href='car/<?=$car['id']?>'>
                    <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                    </span>
                    <span class="learn-more-text">Book now!</span>
                </a>
            </div>
            <a class="editBtn" href='<?=$car['id']?>/edit'>
                <svg height="1em" viewBox="0 0 512 512">
                    <path
                    d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"
                    ></path>
                </svg>
            </a>

        </div>
    </body>
</html>