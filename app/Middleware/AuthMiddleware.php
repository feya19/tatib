<?php

namespace App\Middleware;

class AuthMiddleware
{
    public static function handle()
    {
        session_start();

        if (!isset($_SESSION['userdata'])) {
            header('Location: /login');
            exit();
        }
    }
}
