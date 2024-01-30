<?php

use App\Router\Router;

// Mettre à jour le fichier JSON avec les nouvelles informations
file_put_contents("../cars.json", json_encode($array, JSON_PRETTY_PRINT));

Router::redirect(Router::use('show_car', $id), 3);
