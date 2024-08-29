<?php

namespace App\middlewares;

class Authentication
{
    public function handle(string|null $middleware = null): void
    {
        if (!$middleware) {
            return;
        }

        if ($middleware === 'guest' && isset($_SESSION['user'])) {
            redirect('/');
        }elseif ($middleware === 'auth' && !isset($_SESSION['user'])) {
            redirect('/login');
        }
    }
}