<?php

namespace App\Middleware;
use Core\Session;
use Core\Redirect;

class DpaMiddleware extends DosenMiddleware
{
    public static function handle()
    {
        parent::handle();

        if (empty(Session::get('userdata')['classes'])) {
            Redirect::to('/dashboard', ['warning' => 'Anda Tidak Memiliki Akses']);
        }
    }
}
