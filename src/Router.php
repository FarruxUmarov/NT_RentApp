<?php

declare(strict_types=1);

namespace App;

use App\middlewares\Authentication;

class Router
{
    protected object|null $updates;

    public function __construct()
    {
        $this->updates = json_decode(file_get_contents('php://input'));
    }

    public function getResourceId(): false|int
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = explode('/', $uri);
        $resourceId = $path[count($path) - 1];

        return is_numeric($resourceId) ? (int)$resourceId : false;
    }

    public function sendResponse($data): void
    {
        header("Content-Type: application/json; charset=UTF-8");

        echo json_encode($data);
    }

    public function getUpdates()
    {
        return $this->updates;
    }

    public function getResourceName()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = explode('/', $uri);
        $resourceId = $path[count($path) - 2];
    }

    public static function get($path, $callback, string|null $middleware = null)
    {
        if ($path === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
            (new Authentication())->handle($middleware);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ((new self())->getResourceId()) {
                $path = str_replace('{id}', (string)(new self())->getResourceId(), $path);
                if ($path === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
                    $callback((new self())->getResourceId());
                    exit();
                }
            }
            if ($path === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
                $callback();
                exit();
            }
        }

        return (new Router());
    }

    public static function patch($path, $callback, string|null $middleware = null): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($_POST['_method'] === 'patch') {
                if ((new self())->getResourceId()) {
                    $path = str_replace('{id}', (string)(new self())->getResourceId(), $path);
                    if ($path === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
                        $callback((new self())->getResourceId());
                        exit();
                    }
                }
                if ($path === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
                    (new Authentication())->handle($middleware);
                    $callback();
                    exit();
                }
            }
        }
    }

    public static function deleteBranch($path, $callback, string|null $middleware = null): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($_POST['_method'] === 'delete') {
                if ((new self())->getResourceId()) {
                    $path = str_replace('{id}', (string)(new self())->getResourceId(), $path);
                    if ($path === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
                        $callback((new self())->getResourceId());
                        exit();
                    }
                }
                if ($path === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
                    (new Authentication())->handle($middleware);
                    $callback();
                    exit();
                }
            }
        }
    }


    public static function post($path, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === $path ) {
            $callback();
        }
    }

    public static function errorResponse(int $code, $message = 'Error bad message'): void
    {
        http_response_code($code);
        if ($code === 404) {
            view('404');

        }
        exit();
    }

    public static function delete($path, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'delete' && $_SERVER['REQUEST_URI'] === $path ) {
            $callback();
        }
    }
}
