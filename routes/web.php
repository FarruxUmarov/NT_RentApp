<?php

declare(strict_types=1);

use App\Router;

Router::get('/', fn() => view('home'));
//Router::get('/', fn()=> require basePath('/controllers/showAds.php'));
Router::get('/ads/{id}', fn($id)=> viewController('showAd', ['id' => $id]));
Router::get('/ads/create', fn() => viewController('createAd'));
Router::errorResponse(404,'Not Found');

//Router::get('/ads/{id}', function (int $id) {
//    view('/controllers/showAd', ['id' => $id]);
//});

