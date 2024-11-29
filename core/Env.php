<?php

namespace Core;

class Env {
    public static function load(string $filePath = __DIR__ . '/../.env') {
        if (!file_exists($filePath)) {
            throw new \Exception("The .env file is missing.");
        }

        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            // Skip comments
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            // Parse key=value
            [$key, $value] = explode('=', $line, 2);

            // Remove quotes if present
            $value = trim($value);
            if (str_starts_with($value, '"') && str_ends_with($value, '"')) {
                $value = substr($value, 1, -1);
            }

            // Set environment variable
            putenv("$key=$value");
        }
    }

    public static function get(string $key, $default = null) {
        $value = getenv($key);
        return $value !== false ? $value : $default;
    }
}
