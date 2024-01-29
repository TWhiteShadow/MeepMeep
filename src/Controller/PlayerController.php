<?php

namespace App\Controller;

use App\Model\Player;
use App\Database\Database;

final readonly class PlayerController
{

    public function index(){

        include "allPlayers.php";
    }

    public static function getAll() : array
    {
        $connexion = Database::connect();
        $request = $connexion->prepare('SELECT * FROM player');
        $request->execute();
        return $request->fetchAll();
    }

    public static function store(Player $player): bool
    {
        $connexion = Database::connect();
        $request = $connexion->prepare('INSERT INTO player (namePlayer) VALUES (:name);');
        $playerName = $player->getName();
        $request->bindParam('name', $playerName);
        return $request->execute();
    }

    public function create()
    {
        include 'addPlayer.php';
    }

}