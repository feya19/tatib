<?php

namespace App\Middleware;
use Core\Session;
use Core\Redirect;

class MahasiswaMiddleware extends AuthMiddleware
{
    public static function handle()
    {
        parent::handle();

        if (!Session::get('userdata')['student_id']) {
            Redirect::to('/dashboard', ['warning' => 'Anda Tidak Memiliki Akses']);
        }
    }
}