<?php

declare(strict_types=1);

use App\Ads;

function dd($args)
{
    echo '<pre>';
    var_dump($args);
    echo '</pre>';
    die();

}

function getAds(): array
{
    return (new \App\Ads())->getAds();

}

function basePath($path): string
{
    return __DIR__ . $path;

}

function view(string $path, array $args)
{

    extract($args);

    return require basePath('/public/' . $path);
}