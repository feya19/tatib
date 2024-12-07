<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\DosenModel;
use App\Models\MahasiswaModel;
use App\Models\Violations;
use App\Models\ViewViolationsDetails;

class DashboardController extends Controller {

    public function index() {
        $modelDosen = new DosenModel();
        $modelMahasiswa = new MahasiswaModel();
        $modelPelanggaran = new Violations();
        $modelDetailPelanggaran = new ViewViolationsDetails();
        self::render('dashboard', [
            'modelDosen' => $modelDosen,
            'modelMahasiswa' => $modelMahasiswa,
            'modelPelanggaran' => $modelPelanggaran,
            'modelDetailPelanggaran' => $modelDetailPelanggaran
        ]);
    }
}
