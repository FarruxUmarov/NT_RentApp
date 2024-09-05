<?php

namespace App\middlewares;

use App\Session;

class Authentication
{
    public function handle(string|null $middleware = null): void
    {
        if (!$middleware) {
            return;
        }

        if ($middleware === 'guest' && (new Session())->getUser()) {
            redirect('/');
        }elseif ($middleware === 'auth' && !(new Session())->getUser()) {
            redirect('/login');
        }
    }
}