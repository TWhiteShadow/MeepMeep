<?php

namespace App\Database;

final class Database
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = $this->connect();
    }

    private function connect(): \PDO
    {
        try {
            $user = getenv('DB_USERNAME');
            $pass = getenv('DB_PASSWORD');
            $dbName = getenv('DB_NAME');
            $dbHost = getenv('DB_HOST');

            return new \PDO("mysql:host=$dbHost;dbname=$dbName;charset=UTF8", $user, $pass);
        } catch (\Exception $exception) {
            echo 'Erreur lors de la connexion à la base de données. : ' . $exception->getMessage();
            exit;
        }
    }

    public function prepare(string $sql): \PDOStatement
    {
        return $this->pdo->prepare($sql);
    }

}
