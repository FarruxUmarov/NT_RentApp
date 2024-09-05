<?php

declare(strict_types=1);


use App\Router;
use Controller\AdController;
use Controller\AdminController;
use Controller\AuthController;

Router::get('/', fn() => viewController('home')); // home

// CreateAd
Router::get('/ads/{id}', fn(int $id)=> (new AdController())->show($id));
Router::get('/ads/create', fn() => (new AdController())->create());
Router::post('/ads/create', fn() => (new AdController())->store());

// Update
Router::get('/ads/update/{id}', fn(int $id) => (new AdController())->update($id));
Router::patch('/ads/update/{id}', fn(int $id) => (new AdController())->edit($id));

// Status
Router::get('/status', fn() => view('dashboard/create_status'));

// Login
Router::get('/login', fn() => view('auth/login'), 'guest');
Router::post('/login', fn() => (new AuthController())->login());

// Register
Router::get('/register', fn() => view('auth/register'));
Router::post('/register', fn() => (new AuthController())->register());

// logout
Router::get('/logout', fn() => (new AuthController())->logout());

//Delete
Router::get('/ads/delete/{id}', fn($id) => (new AdController())->delete($id));
Router::delete('/ads/delete/{id}', fn($id) => (new AdController())->delete($id));

// admin and profile
Router::get('/admin', fn() => view('dashboard/home'), 'auth');
Router::get('/profile', fn() => (new \Controller\UserController())->loadProfile(), 'auth');

//Branch
Router::get('/branches', fn()=> (new \Controller\BranchController())->branchShow());
Router::get('/admin-ads', fn() => (new AdminController())->index());
//Router::post('/branches/create', fn() => (new AdController())->store());

Router::errorResponse(404,'Not Found');



