<?php
namespace App\Controllers;

use Core\Controller;

class DashboardController extends Controller {

    public function index() {
        self::render('dashboard');
    }
}
