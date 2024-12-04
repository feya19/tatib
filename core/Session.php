<?php 

namespace Core;

class Session {
    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set(string $key, $value) {
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, $default = null) {
        self::start();
        return $_SESSION[$key] ?? $default;
    }

    public static function has(string $key) {
        self::start();
        return isset($_SESSION[$key]);
    }

    public static function unset(string $key) {
        self::start();
        unset($_SESSION[$key]);
    }

    public static function destroy() {
        self::start();
        session_unset();
        session_destroy();
    }

    
    public static function withOld(array $oldValues) {
        self::start();
        $_SESSION['old_values'] = $oldValues;
    }

    public static function old(string $key, string $default = '') {
        self::start();
        return $_SESSION['old_values'][$key] ?? $default;
    }

    public static function getFlash(string $key) {
        self::start();
        $flash = $_SESSION['flash'][$key] ?? null;
        if (isset($_SESSION['flash'][$key])) {
            unset($_SESSION['flash'][$key]); // Clear the flash message after retrieval
        }
        return $flash;
    }

    public static function getAllFlashes(): array {
        self::start();
        $flashes = $_SESSION['flash'] ?? [];
        unset($_SESSION['flash']); // Clear all flash messages after retrieval
        return $flashes;
    }

    public static function clearOldValues() {
        self::start();
        unset($_SESSION['old_values']);
    }

    public static function clearFlash() {
        self::start();
        unset($_SESSION['flash']);
    }
}