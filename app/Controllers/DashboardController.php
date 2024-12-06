<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\DosenModel;
use App\Models\MahasiswaModel;
use App\Models\Violations;

class DashboardController extends Controller {

    public function index() {
        $modelDosen = new DosenModel();
        $modelMahasiswa = new MahasiswaModel();
        $modelPelanggaran = new Violations();
        $totalDosen = $modelDosen->getTotalDosen();
        $totalMahasiswa = $modelMahasiswa->getTotalMahasiswa();
        $totalPelanggaran = $modelPelanggaran->getTotalPelanggaran();
        self::render('dashboard', [
            'totalDosen' => $totalDosen,
            'totalMahasiswa' => $totalMahasiswa,
            'totalPelanggaran' => $totalPelanggaran
        ]);
    }
}
