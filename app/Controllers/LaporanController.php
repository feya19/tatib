<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Pelanggaran;
use Core\Session;

class LaporanController extends Controller {

    public function index() {
        $title = 'Daftar Pelanggaran';
        $model = new Pelanggaran();
        if (Session::get('userdata')['is_admin'] === true) {
            $is_admin = Session::get('userdata')['is_admin'];
            $model->where('is_admin', '=', $is_admin);
        }
        $data = $model->get();
        self::render('laporan/index', ['title' => $title, 'data' => $data]);
    }
}