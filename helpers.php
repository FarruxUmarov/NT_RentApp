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

function view(string $path, array $args = []): void
{
    $filePath = basePath('/public/pages/' . $path . '.php');
    if (!file_exists($filePath)){
        echo "Required view file not found: $filePath";
        return;
    }

    if (is_array($args)) {
        extract($args);
    }
    require $filePath;
}

function viewPartials(string $path, array $args = []): void
{
    if (is_array($args)) {
        extract($args);
    }
    require basePath('/public/partials/' . $path . '.php');
}

function viewController(string $path, array $args = []): void
{
    if (is_array($args)) {
        extract($args);
    }
    require basePath('/controllers/' . $path . '.php');
}