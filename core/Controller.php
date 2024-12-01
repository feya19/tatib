<?php

namespace Core;

class Controller {
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

    public static function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function setSession(string $key, $value) {
        self::startSession();
        $_SESSION[$key] = $value;
    }

    public static function getSession(string $key, $default = null) {
        self::startSession();
        return $_SESSION[$key] ?? $default;
    }

    public static function hasSession(string $key) {
        self::startSession();
        return isset($_SESSION[$key]);
    }

    public static function unsetSession(string $key) {
        self::startSession();
        unset($_SESSION[$key]);
    }

    public static function destroySession() {
        self::startSession();
        session_unset();
        session_destroy();
    }

    public static function redirect(string $url, array $flash = []) {
        self::startSession();
        if (!empty($flash)) {
            $_SESSION['flash'] = $flash;
        }
        header("Location: $url");
        exit;
    }

    public static function redirectBack(array $flash = []) {
        self::startSession();
        if (!empty($flash)) {
            $_SESSION['flash'] = $flash;
        }
        $referer = $_SERVER['HTTP_REFERER'] ?? '/';
        header("Location: $referer");
        exit;
    }

    public static function withOld(array $oldValues) {
        self::startSession();
        $_SESSION['old_values'] = $oldValues;
    }

    public static function old(string $key, string $default = '') {
        self::startSession();
        return $_SESSION['old_values'][$key] ?? $default;
    }

    public static function getFlash(string $key) {
        self::startSession();
        $flash = $_SESSION['flash'][$key] ?? null;
        if (isset($_SESSION['flash'][$key])) {
            unset($_SESSION['flash'][$key]); // Clear the flash message after retrieval
        }
        return $flash;
    }

    public static function getAllFlashes(): array {
        self::startSession();
        $flashes = $_SESSION['flash'] ?? [];
        unset($_SESSION['flash']); // Clear all flash messages after retrieval
        return $flashes;
    }

    public static function clearOldValues() {
        self::startSession();
        unset($_SESSION['old_values']);
    }

    public static function clearFlash() {
        self::startSession();
        unset($_SESSION['flash']);
    }
}
