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

function view(string $path, array $args = null, bool $loadFromPublic = true): void
{
    if ($loadFromPublic) {
        $file = "/resources/views/pages/$path.php";
    } else {
        $file = "/public/pages/$path.php";
    }

    $filePath = basePath($file);

    if (!file_exists($filePath)) {
        echo "Required view not found: $filePath";
        return;
    }

    if (is_array($args)) {
        extract($args);
    }
    require $filePath;
}

function viewPartials(string $path, array|null $args = null, bool $loadFromPublic = true): void
{
    if (is_array($args)) {
        extract($args);
    }

    if ($loadFromPublic) {
        $file = "/public/partials/$path.php";
    } else {
        $file = "/resources/views/partials/$path.php";
    }

    require basePath($file);
}

function viewController(string $path, array $args = []): void
{
    if (is_array($args)) {
        extract($args);
    }
    require basePath('/controllers/' . $path . '.php');
}

function redirect(string $url): void
{
header('Location: ' . $url);
exit();
}


function getUserNameFromSession()
{
    if (isset($_SESSION['user'])) {
        return $_SESSION['user'];
    }

    return '';
}