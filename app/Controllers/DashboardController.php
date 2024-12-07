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
        $modelDetailPelanggaranDosen = new ViewViolationsDetails();
        $modelDetailPelanggaranDosen1 = new ViewViolationsDetails();
        $modelDetailPelanggaranDosen2 = new ViewViolationsDetails();
        $modelDetailPelanggaranDPA = new ViewViolationsDetails();
        $modelDetailPelanggaranDPA1 = new ViewViolationsDetails();
        $modelDetailPelanggaranDPA2 = new ViewViolationsDetails();
        $modelDetailPelanggaranMhs = new ViewViolationsDetails();
        $modelDetailPelanggaranMhs1 = new ViewViolationsDetails();
        $modelDetailPelanggaranMhs2 = new ViewViolationsDetails();
        self::render('dashboard', [
            'modelDosen' => $modelDosen,
            'modelMahasiswa' => $modelMahasiswa,
            'modelPelanggaran' => $modelPelanggaran,
            'modelDetailPelanggaranDosen' => $modelDetailPelanggaranDosen,
            'modelDetailPelanggaranDosen1' => $modelDetailPelanggaranDosen1,
            'modelDetailPelanggaranDosen2' => $modelDetailPelanggaranDosen2,
            'modelDetailPelanggaranDPA' => $modelDetailPelanggaranDPA,
            'modelDetailPelanggaranDPA1' => $modelDetailPelanggaranDPA1,
            'modelDetailPelanggaranDPA2' => $modelDetailPelanggaranDPA2,
            'modelDetailPelanggaranMhs' => $modelDetailPelanggaranMhs,
            'modelDetailPelanggaranMhs1' => $modelDetailPelanggaranMhs1,
            'modelDetailPelanggaranMhs2' => $modelDetailPelanggaranMhs2
        ]);
    }
}
