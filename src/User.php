<?php

namespace App;

use PDO;

// UsersGateway
class User
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function insertUser(
        string $username,
        string $gender,
        int    $phone,
        string $password): bool
    {
        $query = "INSERT INTO users (username, gender, phone, password, created_at) 
                  VALUES (:username, :gender, :phone, :password, NOW())";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    }

    public function getUser(int $phone)
    {
        return $this->pdo->query("SELECT * FROM users WHERE phone = {$phone}")->fetch();
    }

    public function getUsers()
    {
        $query = "SELECT *, ads.id AS id, ads.address AS address, ads_image.name AS image
                    FROM ads 
                    JOIN branch ON branch.id  = ads.branch_id
                     JOIN ads_image ON ads.id = ads_image.ads_id";
        return $this->pdo->query($query)->fetchAll();
    }
    public function getUsersBranch(): bool|array
    {
        return $this->pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteUsers(int $id): bool
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function updateUser(
        int    $id,
        string $username,
        string $position,
        string $gender,
        int    $phone,
        string $password): bool
    {
        $query = "UPDATE users SET username = :username, position = :position, gender = :gender, phone = :phone, password = :password, updated_at = NOW() WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    }

    public function register(): void
    {
        $_SESSION['error'] = null;
        if ($this->isUserExists()) {
            $_SESSION['error'] = "This User already exists";
            header('location: /register');

        } else {
            $user = $this->create();
            $_SESSION['user'] = $user->username;
            header('location: /');
        }
        exit();
    }

public function logout(): void
    {
        session_destroy();
        header('location: /');
        exit();
    }

    public function isUserExists(): bool
    {
        if (isset($_POST['phone'])) {
            $phone = $_POST['phone'];
            return (bool)$this->getUser($phone);
        }
        return false;
    }

    public function create()
    {
        $username = $_POST['username'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (strlen($phone) == 9) {
            $this->insertUser($username, $gender, $phone, $password);
            return $this->getUser($phone);
        }
        $_SESSION['error'] = "Wrong information entered";
        header('location: /register');
        exit();
    }
}
