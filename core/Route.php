<?php

namespace Core;

class Route {
    private static array $routes = [];

    public static function get(string $uri, string $action): void {
        self::$routes['GET'][$uri] = $action;
    }

    public static function post(string $uri, string $action): void {
        self::$routes['POST'][$uri] = $action;
    }

    public static function dispatch(): void {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        if (!isset(self::$routes[$method][$uri])) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        $action = self::$routes[$method][$uri];
        self::executeAction($action);
    }

    private static function executeAction(string $action): void {
        [$controller, $method] = explode('@', $action);
        $controllerClass = "App\\Controllers\\{$controller}";

        if (!class_exists($controllerClass)) {
            http_response_code(500);
            echo "Controller not found: {$controller}";
            return;
        }

        $controllerInstance = new $controllerClass();

        if (!method_exists($controllerInstance, $method)) {
            http_response_code(500);
            echo "Method not found: {$method}";
            return;
        }

        // Call the controller method
        $controllerInstance->$method();
    }
}
