<?php

namespace App\Middleware;

use Core\Redirect;
use Core\Session;

class AuthMiddleware
{
    public static function handle()
    {
        if (!Session::has('userdata')) {
            Redirect::to('login');
        }
    }
}
