<?php

namespace App\middlewares;

class Authentication
{
    public function handle(string|null $meddleware = null): void
    {
        if (!$meddleware) {
            return;
        }

        if ($meddleware === 'guest' && isset($_SESSION['user'])) {
            redirect('/');
        }elseif ($meddleware === 'auth' && !isset($_SESSION['user'])) {
            require('/login');
        }
    }
}