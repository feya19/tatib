<?php

namespace App\Middleware;
use Core\Session;
use Core\Redirect;

class AdminMiddleware extends AuthMiddleware
{
    public static function handle()
    {
        parent::handle();

        if (!Session::get('userdata')['is_admin']) {
            Redirect::to('/dashboard', ['warning' => 'Anda Tidak Memiliki Akses']);
        }
    }
}