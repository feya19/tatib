<?php
namespace Core;

class Request {
    
    public static function get(string $key = null, $default = null) {
        if (is_null($key)) {
            return filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS) ?? [];
        }
        return isset($_GET[$key]) ? htmlspecialchars(trim($_GET[$key]), ENT_QUOTES, 'UTF-8') : $default;
    }

    public static function post(string $key = null, $default = null) {
        if (is_null($key)) {
            return filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS) ?? [];
        }
        return isset($_POST[$key]) ? htmlspecialchars(trim($_POST[$key]), ENT_QUOTES, 'UTF-8') : $default;
    }

    public static function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }

    public static function is(string $path) {
        $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $normalizedPath = rtrim($currentPath, '/');
        $normalizedInputPath = rtrim($path, '/');

        // Handle wildcard matching
        if (str_contains($normalizedInputPath, '*')) {
            $pattern = str_replace('*', '', $normalizedInputPath);
            return stripos($normalizedPath, $pattern) === 0;
        }

        return $normalizedPath === $normalizedInputPath;
    }
}
