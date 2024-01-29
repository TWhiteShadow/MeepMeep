<?php

namespace App\Controller;
use App\Env;
class HomeController
{
   

    public function index(){

        include "meep.php";
    }

    public function show($id){

        $array = json_decode(file_get_contents("../cars.json"), true);
        foreach ($array as $key => $value) {
            if ($value["id"] == $id) {
                $car = $value;
                break;
            }
        }
        if (isset($car)){
            include "carInfo.php";
        }else{
            header("Location: /404");
        }
    }

    public function test()
    {
        include "test.php";
    }



    public function notFound()
    {
        include "404_page.php";
    }

    public function searchImg(string $query){
        $query_string = str_replace(" ", "+", $query);
        // URL de l'API
        $url = 'https://www.google.com/search?client=ubuntu-sn&hs=SV9&sca_esv=602312445&channel=fs&q=' . $query_string . '&tbm=isch';

        // Construire l'URL avec les paramètres
        $request_url = $url;

        // Initialiser la session cURL
        $ch = curl_init($request_url);

        // Configurer les options de cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Exécuter la requête cURL et récupérer la réponse
        $response = curl_exec($ch);

        // Gérer les erreurs
        if (curl_errno($ch)) {
            // Fermer la session cURL
            curl_close($ch);
            return null;
        }

        // Fermer la session cURL
        curl_close($ch);
        return $response;
    }
}