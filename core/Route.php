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

        // Search for matching route
        foreach (self::$routes[$method] ?? [] as $route => $action) {
            $pattern = preg_replace('#\{([^}]+)\}#', '([^/]+)', $route);
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); // Remove full match
                $params = $matches;

                // Check and execute middleware
                if (isset(self::$middlewares[$route])) {
                    $middlewareClass = self::$middlewares[$route];

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

                self::executeAction($action, $params);
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }

    private static function executeAction(string $action, array $params = []): void
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

        // Call the controller method with parameters
        call_user_func_array([$controllerInstance, $method], $params);
    }
}
