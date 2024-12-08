<?php
namespace App\Controllers;

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

            // Data FIlter
            $start_date = Request::get('start_date');
            $end_date = Request::get('end_date');
            $student_year = Request::get('student_year');
            $status = Request::get('status');
            $sanction_level = Request::get('sanction_level');

            // Filter tanggal
            if ($start_date) {
                $model->where('report_date', '>=', $start_date);
            }
            if ($end_date) {
                $model->where('report_date', '<=', $end_date);
            }

            // Filter angkatan
            if ($student_year) {
                $model->where('student_year', '=', $student_year);
            }

            // Filter status
            if ($status) {
                $model->where('status', '=', strtolower($status));
            }

            // Filter sanksi
            if ($sanction_level) {
                $model->where('sanction_level', '=', strtoupper($sanction_level));
            }

            if ($search) {
                $model->where(function($query) use ($search) {
                    $query->Where('LOWER(violation_number)', 'LIKE', "%$search%")
                        ->orWhere('nim', 'LIKE', "%$search%")
                        ->orWhere('LOWER(student_class)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(program_study_name)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(student_name)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(violation_type_name)', 'LIKE', "%$search%");
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

    public function sekjur() {
        if (Request::isAjax()) {
            $model = new ViewViolationsDetails();
            $limit = Request::get('limit') ?: 10;
            $offset = Request::get('offset') ?: 0;
            $sort = Request::get('sort') ?: 'violation_number';
            $order = Request::get('order') ?: 'DESC';
            $search = Request::get('search') ? strtolower(Request::get('search')) : null;

            // Data FIlter
            $start_date = Request::get('start_date');
            $end_date = Request::get('end_date');
            $student_year = Request::get('student_year');
            $status = Request::get('status');
            $sanction_level = Request::get('sanction_level');

            // Filter tanggal
            if ($start_date) {
                $model->where('report_date', '>=', $start_date);
            }
            if ($end_date) {
                $model->where('report_date', '<=', $end_date);
            }

            // Filter angkatan
            if ($student_year) {
                $model->where('student_year', '=', $student_year);
            }

            // Filter status
            if ($status) {
                $model->where('status', '=', strtolower($status));
            }

            // Filter sanksi
            if ($sanction_level) {
                $model->where('sanction_level', '=', strtoupper($sanction_level));
            }

            if ($search) {
                $model->where(function($query) use ($search) {
                    $query->Where('LOWER(violation_number)', 'LIKE', "%$search%")
                        ->orWhere('nim', 'LIKE', "%$search%")
                        ->orWhere('LOWER(student_class)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(program_study_name)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(student_name)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(violation_type_name)', 'LIKE', "%$search%");
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
        self::render('laporan/sekjur', [
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
