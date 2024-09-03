<?php

namespace App;

use JetBrains\PhpStorm\NoReturn;
use PDO;

class Auth
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }
    #[NoReturn] public function login(): void
    {
        $phone = $_POST['phone'];
        $password = $_POST['password'];
//        $user = $phone . $password;
//        dd($user);

        $result = (new User())->getUser($phone);

        if (password_verify($password, $result->password)) {
            $_SESSION['user'] = ['username'=>$result->username, 'id'=>$result->id];
            header('location: /');
        } else {
            $_SESSION['error'] = "Wrong phone number or password !!!";
            header('location: /login');
        }
        exit();
    }


}