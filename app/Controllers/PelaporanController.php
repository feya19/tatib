<?php
namespace App\Controllers;

use App\Models\Kelas;
use App\Models\ProgramStudi;
use Core\Controller;
use App\Models\ViewViolationsDetails;
use Core\Request;
use Core\Session;
class PelaporanController extends Controller {
    public function index() {
        if (Request::isAjax()) {
            $model = new ViewViolationsDetails();
            $limit = $_GET['limit'] ?? 10;
            $offset = $_GET['offset'] ?? 0;
            $sort = $_GET['sort'] ?? null;
            $order = $_GET['order'] ?? 'asc';
            $search = $_GET['search'] ?? null;

            if ($lecturer_id = Session::get('userdata')['lecturer_id']) {
                $model->where('reporter_id', '=', $lecturer_id);
            }
            if ($search) {
                $model->where('column_name', 'LIKE', "%$search%"); // Replace `column_name` with the searchable column
            }
            if ($sort) {
                $model->orderBy($sort, strtoupper($order));
            }

            $data = $model->limit($limit)->offset($offset)->get();
            $total = $model->count(); // Add a count method to your Model to get the total rows

            self::json([
                'total' => $total,
                'rows' => $data,
            ]);
        }
        $title = 'Riwayat Pelaporan';
        $kelasModel = new Kelas();
        $prodiModel = new ProgramStudi();
        self::render('pelaporan/index', [
            'title' => $title,
            'kelas' => $kelasModel->all(),
            'prodi' => $prodiModel->all()
        ]);
    }

    public function tambah() {
        $title = 'Buat Laporan';
        self::render('pelaporan/add', ['title' => $title]);
    }
}