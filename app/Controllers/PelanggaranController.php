<?php
namespace App\Controllers;

use App\Models\ViewViolationsDetails;
use App\Models\Violations;
use Core\Controller;
use Core\Request;
use Core\Session;

class PelanggaranController extends Controller
{

    public function index()
    {
        if (Request::isAjax()) {
            $model = new ViewViolationsDetails();
            $limit = Request::get('limit') ?: 10;
            $offset = Request::get('offset') ?: 0;
            $sort = Request::get('sort') ?: 'violation_number';
            $order = Request::get('order') ?: 'DESC';
            $search = Request::get('search') ? strtolower(Request::get('search')) : null;

            if ($student_id = Session::get('userdata')['student_id']) {
                $model->where('reporter_id', '=', $student_id);
            }
            if ($search) {
                $model->where(function ($query) use ($search) {
                    $query->where('CAST(report_date AS varchar)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(violation_number)', 'LIKE', "%$search%")
                        ->orWhere('name', 'LIKE', "%$search%")
                        ->orWhere('LOWER(violation_type_name)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(sanction_level)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(status)', 'LIKE', "%$search%");
                });
            }
            if ($sort) {
                $model->orderBy($sort, strtoupper($order));
            }

            $data = $model->limit($limit)->offset($offset)->get();
            $total = $model->count();

            self::json([
                'total' => $total,
                'rows' => $data,
            ]);
        }
        $title = 'Riwayat Pelanggaran';
        self::render('pelanggaran/index', [
            'title' => $title,
            'status' => Violations::enumStatus(),
            'status_class' => ViewViolationsDetails::enumStatusClass(),
        ]);
    }
}
