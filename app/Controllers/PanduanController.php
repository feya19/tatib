<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\PanduanModel;

class PanduanController extends Controller {

    // Metode utama untuk menampilkan panduan
    public function index() {
        // Ambil parameter dari URL
        $level = $_GET['level'] ?? ''; 
        $search = $_GET['search'] ?? '';

        // Inisialisasi model Panduan
        $model = new PanduanModel();

        // Mendapatkan data panduan berdasarkan filter
        $violations = $model->getPanduan($level, $search);

        self::render('panduan', ['violations' => $violations]);
    }
}
