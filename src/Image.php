<?php

namespace App;

use PDO;

class Image
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function addImage(int $adsId, string $name)
    {
        $query = "INSERT INTO ads_image (ads_id, name) VALUES (:ads_id, :name)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':ads_id', $adsId);
        $stmt->bindParam(':name', $name);

        return $stmt->execute();
    }
}