<?php

declare(strict_types=1);

use App\Router;

Router::get('/', fn() => view('home'));
//Router::get('/', fn()=> require basePath('/controllers/showAds.php'));
//Router::get('/ads/{id}', fn($id)=> require basePath('/controllers/showAd.php'));

Router::get('/ads/{id}', function (int $id) {
    view('/controllers/showAd', ['id' => $id]);
});

