<?php

declare(strict_types=1);

use App\Router;

Router::get('/', fn() => viewController('home')); // home
//Router::get('/', fn()=> viewController('showAds'));
Router::get('/ads/{id}', fn($id)=> viewController('showAd', ['id' => $id]));
Router::get('/ads/create', fn() => view('dashboard/create_ad'));
Router::post('/ads/create', fn() => viewController('createAd'));
Router::errorResponse(404,'Not Found');

//Router::get('/ads/{id}', function (int $id) {
//    view('/controllers/showAd', ['id' => $id]);
//});

