<?php

declare(strict_types=1);


use App\Router;
use Controller\AdController;
use Controller\AdminController;
use Controller\AuthController;
use Controller\BranchController;
use Controller\UserController;

//dd($_POST);

Router::get('/', fn() => (new AdController())->home()); // home

// CreateAd
Router::get('/ads/{id}', fn(int $id)=> (new AdController())->show($id));
Router::get('/ads/create', fn() => (new AdController())->create(), 'auth');
Router::post('/ads/create', fn() => (new AdController())->store(), 'auth');

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
Router::get('/branch/{id}', fn(int $id)=> (new \Controller\BranchController())->show($id), 'auth');

Router::get('/adminBranch/create', fn()=> (new \Controller\BranchController())->create(),'auth');
Router::post('/adminBranch/create', fn() => (new \Controller\BranchController())->storeBranch(), 'auth');
Router::get('/adminBranches', fn()=> (new \Controller\BranchController())->getAllBranches(), 'auth');
Router::get('/branches', fn()=> (new \Controller\BranchController())->homeBranches());

Router::deleteBranch('/branch/delete/{id}', fn($id) => (new BranchController())->deleteBranch($id));  // delete branch _method bilan
//Router::delete('/branch/delete/{id}', fn($id) => (new BranchController())->deleteBranch($id));  // delete branch form bilan

//User
Router::get('/user', fn() => (new UserController())->getAllUser());
Router::patch('/user/{id}', fn() => (new UserController()));
//Router::get('/admin-ads', fn() => (new AdminController())->index());

Router::get('/search', fn() => (new AdController())->search());

Router::errorResponse(404,'Not Found');



