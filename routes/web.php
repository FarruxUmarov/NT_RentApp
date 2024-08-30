<?php

declare(strict_types=1);


use App\Router;
use Controller\AdController;
use Controller\AuthController;

Router::get('/', fn() => viewController('home')); // home

Router::get('/ads/{id}', fn(int $id)=> (new AdController())->show($id));

Router::get('/ads/create', fn() => view('dashboard/create_ad'));
Router::post('/ads/create', fn() => (new AdController())->createAd());

Router::get('/status', fn() => view('dashboard/create_status'));

Router::get('/login', fn() => view('auth/login'), 'guest');
Router::post('/login', fn() => (new AuthController())->login());

Router::get('/register', fn() => view('auth/register'));
Router::post('/register', fn() => (new AuthController())->register());

Router::get('/logout', fn() => (new AuthController())->logout());


Router::get('/admin', fn() => view('dashboard/home'), 'auth');
Router::get('/profile', fn() => (new \Controller\UserController())->loadProfile(), 'auth');


Router::errorResponse(404,'Not Found');



