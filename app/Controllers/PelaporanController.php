<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Pelanggaran;
use Core\Session;

class PelaporanController extends Controller {

    public function index() {
        $title = 'Riwayat Pelaporan';
        $model = new Pelanggaran();
        if ($lecturer_id = Session::get('userdata')['lecturer_id']) {
            $model->where('reporter_id', '=', $lecturer_id);
        }
        $data = $model->get();
        self::render('pelaporan/index', ['title' => $title, 'data' => $data]);
    }

    public function tambah() {
        $title = 'Buat Laporan';
        self::render('pelaporan/add', ['title' => $title]);
    }
}