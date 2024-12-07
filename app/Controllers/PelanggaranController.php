<?php
namespace App\Controllers;

use App\Models\ViewViolationsDetails;
use App\Models\Violations;
use Core\Controller;
use Core\Redirect;
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

            // Get status and date filter from request
            $status = Request::get('status') ?: null;
            $tanggal = Request::get('tanggal') ?: null;

            // Filter by student_id if present
            if ($student_id = Session::get('userdata')['student_id']) {
                $model->where('nim', '=', $student_id);
            }

            // Apply status filter if selected and not 'semua'
            if ($status && $status !== 'semua') {
                $model->where('status', '=', $status);
            }

            // Apply date filter if selected
            if ($tanggal) {
                $model->where('report_date', '=', $tanggal);
            }

            // Apply search filter
            if ($search) {
                $model->where(function ($query) use ($search) {
                    $query->where('CAST(report_date AS varchar)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(violation_number)', 'LIKE', "%$search%")
                        ->orWhere('reporter_name', 'LIKE', "%$search%")
                        ->orWhere('LOWER(violation_type_name)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(sanction_level)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(status)', 'LIKE', "%$search%");
                });
            }

            // Apply sorting
            if ($sort) {
                $model->orderBy($sort, strtoupper($order));
            }

            // Get data and total count
            $data = $model->limit($limit)->offset($offset)->get();
            $total = $model->count();

            // Return the data in JSON format
            self::json([
                'total' => $total,
                'rows' => $data,
            ]);
        }

        // Render the view for non-AJAX requests
        $title = 'Riwayat Pelanggaran';
        self::render('pelanggaran/index', [
            'title' => $title,
            'status' => Violations::enumStatus(),
            'status_class' => ViewViolationsDetails::enumStatusClass(),
        ]);
    }

    public function detail($id)
    {
        $data['title'] = 'Informasi Pelanggaran';
        $model = new ViewViolationsDetails();
        $data['model'] = $model->find($id);
        if (empty($data['model'])) {
            Redirect::to('/dashboard', ['error' => 'Data tidak ditemukan']);
        }
        $data['model']->statusClass = ViewViolationsDetails::enumStatusClass($data['model']->status);
        $data['model']->statusText = Violations::enumStatus($data['model']->status);
        $data['views'] = ViewViolationsDetails::enumStatusViews($data['model']->status);

        self::render('detail_pelanggaran/index', $data);
    }
}
