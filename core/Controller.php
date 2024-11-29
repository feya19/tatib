<?php

namespace Core;

class Controller {
    public static function view(string $view, array $data = []): void {
        extract($data);
        include __DIR__.'/../app/Views/' . $view . '.php';
    }

    public static function render(string $contentView, array $data = []): void {
        // Load header
        self::view('layouts/header', $data);

        // Load main content
        self::view($contentView, $data);

        // Load footer
        self::view('layouts/header', $data);
    }
}
