<?php

declare(strict_types=1);

namespace Controller;

use App\Ads;
use App\Session;
use App\User;

class UserController
{
    public function loadProfile(): void
    {
        $ads = (new Ads())->getUsersAds((int)(new Session())->getId());
        view('profile', ['ads' => $ads]);
    }

    public function getAllUser(): void
    {
        $users = (new User())->getUsers();
        view('adminUsers', ['users' => $users]);

    }

//    public function updateUser(int $id): void
//    {
//        $users = (new User())->updateUser($id);
//        return;
//    }
}