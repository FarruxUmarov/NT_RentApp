<?php

namespace App;

use PDO;

class User
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function create(
        string $username,
        string $position,
        string $gender,
        string $phone,
        string $email,
        string $password): false|array

    {
        $query = "INSERT INTO `users` (`username`, `position`, `gender`, `phone`, 'email', 'password', `created_at`) Values (:username, :position, :gender, :phone, :email, :password, NOW())";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function get(int $id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function update(int $id, string $username, string $position, string $gender, string $phone): void
    {
        $query = "Update users Set username = :username, position = :position, gender = :gender, phone = :phone, updated_at= NOW()
    WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phone', $phone);

        $stmt->execute();

    }

    public function delete(int $id)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }


}