<?php

declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    view('auth/register');
    exit();
}

(new \App\User())->register();