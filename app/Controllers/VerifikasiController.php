<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Violations;
use Core\Session;

class VerifikasiController extends Controller {

    public function kelas() {
        $title = 'Riwayat Laporan Pelanggaran Mahasiswa';
        $model = new Violations();
        $data = $model->get();
        self::render('verifikasi/kelas', ['title' => $title, 'data' => $data]);
    }
    
    public function jurusan() {
        $title = 'Riwayat Laporan Pelanggaran Mahasiswa';
        $model = new Violations();
        $data = $model->get();
        self::render('verifikasi/jurusan', ['title' => $title, 'data' => $data]);
    }
}