<?php
namespace App\Controllers;

use Core\Controller;
use app\Models\Pelanggaran;

class PelanggaranController extends Controller {

    public function index() {
        

        self::render('pelanggaran/index');
    }
}