<?php

namespace Core;

abstract class Controller {
    public static function view(string $view, array $data = []) {
        extract($data);
        include __DIR__ . '/../app/Views/' . $view . '.php';
    }

    public static function render(string $contentView, array $data = []) {
        // Load header
        self::view('layouts/header', $data);

        // Load main content
        self::view($contentView, $data);

        // Load footer
        self::view('layouts/footer', $data);
    }

    public static function json(array $data, int $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }

}
