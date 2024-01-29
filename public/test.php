<?php

// Afficher la réponse
use App\Controller\HomeController;

// Instancier le HomeController
$homeController = new HomeController();
$array = json_decode(file_get_contents("../cars.json"), true);
foreach ($array as &$car) {
    $query = $car['Name'] . " " . $car['Year'];
    // Appeler la fonction searchImg
    $response = $homeController->searchImg($query);

    if ($response != null) {
        // Créer un objet DOMDocument
        $dom = new DOMDocument;

        // Charger le code HTML dans le DOMDocument
        libxml_use_internal_errors(true); // Désactiver les erreurs libxml générées pour le chargement HTML
        $dom->loadHTML($response);
        libxml_use_internal_errors(false); // Réactiver les erreurs libxml

        // Créer un objet DOMXPath
        $xpath = new DOMXPath($dom);

        // Utiliser XPath pour extraire la première image dans /html/body/div[3]
        $images = $xpath->query('/html/body/div[3]//img');

        if ($images->length > 0) {
            $firstImageSrc = $images->item(0)->getAttribute('src');
            echo "<img src=" . $firstImageSrc . ">";

            // Ajouter le lien de l'image au tableau de la voiture
            $car['photo'] = $firstImageSrc;
        } else {
            echo "aucune image";
            $car['photo'] = null;
        }
    } else {
        echo "aucun resultat";
        $car['photo'] = null;
    }
}

// Mettre à jour le fichier JSON avec les nouvelles informations
file_put_contents("../cars.json", json_encode($array, JSON_PRETTY_PRINT));
