<?php

namespace App\Middleware;
use Core\Session;
use Core\Redirect;

class DosenMiddleware extends AuthMiddleware
{
    public static function handle()
    {
        parent::handle();

        if (!Session::get('userdata')['lecturer_id']) {
            Redirect::to('/dashboard', ['warning' => 'Anda Tidak Memiliki Akses']);
        }
    }
}
