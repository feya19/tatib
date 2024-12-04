<?php

namespace Core;
use Core\Session;

class Redirect {
    public static function to(string $url, array $flash = []) {
        Session::start();
        if (!empty($flash)) {
           Session::set('flash', $flash);
        }
        header("Location: $url");
        exit;
    }

    public static function back(array $flash = []) {
        Session::start();
        if (!empty($flash)) {
           Session::set('flash', $flash);
        }
        $referer = $_SERVER['HTTP_REFERER'] ?? '/';
        header("Location: $referer");
        exit;
    }
}