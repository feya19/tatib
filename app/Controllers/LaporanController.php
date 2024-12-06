<?php
namespace App\Controllers;

use App\Models\Kelas;
use App\Models\ProgramStudi;
use Core\Controller;
use App\Models\ViewViolationsDetails;
use App\Models\Violations;
use Core\Request;
use Core\Session;
class LaporanController extends Controller {
    public function index() {
        if (Request::isAjax()) {
            $model = new ViewViolationsDetails();
            $limit = Request::get('limit') ?: 10;
            $offset = Request::get('offset') ?: 0;
            $sort = Request::get('sort') ?: 'violation_number';
            $order = Request::get('order') ?: 'DESC';
            $search = Request::get('search') ? strtolower(Request::get('search')) : null;

            if ($search) {
                $model->where(function($query) use ($search) {
                    $query->where('CAST(report_date AS varchar)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(violation_number)', 'LIKE', "%$search%")
                        ->orWhere('nim', 'LIKE', "%$search%")
                        ->orWhere('LOWER(student_class)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(student_name)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(violation_type_name)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(sanction_level)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(status)', 'LIKE', "%$search%");
                });
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
        $title = 'Data Seluruh Pelanggaran Mahasiswa';
        self::render('laporan/index', [
            'title' => $title,
            'status' => Violations::enumStatus(),
            'status_class' => ViewViolationsDetails::enumStatusClass()
        ]);
    }

    public function tambah() {
        $title = 'Buat Laporan';
        self::render('laporan/add', ['title' => $title]);
    }
}
