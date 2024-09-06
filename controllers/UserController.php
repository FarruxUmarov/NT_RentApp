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
        $user = (new User())->getUsers();
        view('profile', ['users' => $user]);

    }
}