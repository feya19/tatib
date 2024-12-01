<?php

namespace Core;

class Route
{
    private static array $routes = [];
    private static array $middlewares = [];

    public static function get(string $uri, string $action, $middleware = null): void
    {
        self::$routes['GET'][$uri] = $action;

        if ($middleware) {
            self::$middlewares[$uri] = $middleware;
        }
    }

    public static function post(string $uri, string $action, $middleware = null): void
    {
        self::$routes['POST'][$uri] = $action;

        if ($middleware) {
            self::$middlewares[$uri] = $middleware;
        }
    }

    public static function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        if (!isset(self::$routes[$method][$uri])) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        $action = self::$routes[$method][$uri];

        // Check and execute middleware
        if (isset(self::$middlewares[$uri])) {
            $middlewareClass = self::$middlewares[$uri];

            if (!class_exists($middlewareClass)) {
                http_response_code(500);
                echo "Middleware not found: {$middlewareClass}";
                return;
            }

            $middlewareInstance = new $middlewareClass();
            if (method_exists($middlewareInstance, 'handle')) {
                $middlewareResult = $middlewareInstance->handle();
                if ($middlewareResult === false) {
                    return;
                }
            }
        }

        self::executeAction($action);
    }

    private static function executeAction(string $action): void
    {
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
