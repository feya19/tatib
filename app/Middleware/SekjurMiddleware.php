<?php

namespace App\Middleware;
use Core\Session;
use Core\Redirect;

class SekjurMiddleware extends DosenMiddleware
{
    public static function handle()
    {
        parent::handle();

        if (!Session::get('userdata')['is_sekjur']) {
            Redirect::to('/dashboard', ['warning' => 'Anda Tidak Memiliki Akses']);
        }
    }
}
