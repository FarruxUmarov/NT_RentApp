<?php

declare(strict_types=1);

namespace App;
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

    public static function get($path, $callback): void
    {
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
    }
//    public static function get($path, $callback): void
//    {
//        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//            if ((new self())->getResourceId()) {
//                $path = str_replace('id', (string)(new self())->getResourceId(), $path);
//            }
//        }
//    }
    public static function post($path, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === $path) {
            $callback();
        }
    }
}
