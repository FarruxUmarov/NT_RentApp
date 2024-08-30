<?php

namespace Controller;

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            view('auth/login');
            exit();
        }


        (new \App\Auth())->login();
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            view('auth/register');
            exit();
        }

        (new \App\User())->register();
    }

        public function logout(): void
    {
        session_destroy();
        redirect('/');
    }

}