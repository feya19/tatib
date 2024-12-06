<?php
namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\PanduanModel;
use App\Models\ViewViolationsDetails;
use App\Models\Violations;
use Core\Controller;
use Core\Redirect;
use Core\Request;
use Core\Session;
use Core\Validation;

class PelaporanController extends Controller
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

            if ($lecturer_id = Session::get('userdata')['lecturer_id']) {
                $model->where('reporter_id', '=', $lecturer_id);
            }
            if ($search) {
                $model->where(function ($query) use ($search) {
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
        $title = 'Riwayat Pelaporan';
        self::render('pelaporan/index', [
            'title' => $title,
            'status' => Violations::enumStatus(),
            'status_class' => ViewViolationsDetails::enumStatusClass(),
        ]);
    }

    public function tambah()
    {
        if (Request::isAjax()) {
            $model = Request::get('type') == 'nim' ? new MahasiswaModel() : new PanduanModel();
            $search = strtolower(Request::get('search'));
            if ($search) {
                $field = $model instanceof MahasiswaModel ? ['nim', 'name'] : ['type_name'];
                $model->where("LOWER($field[0])", 'LIKE', "%$search%");
                if (isset($field[1])) {
                    $model->orWhere("LOWER($field[1])", 'LIKE', "%$search%");
                }
            }
            $data = array_map(function($row) {
                if (Request::get('type') == 'nim') {
                    return [
                        'id' => $row['nim'],
                        'text' => $row['nim'] . ' - '. $row['name']
                    ];
                } else {
                    return [
                        'id' => $row['type_id'],
                        'text' => $row['type_name']
                    ];
                }
            }, $model->limit(50)->get());
            return self::json($data);
        }
        self::render('pelaporan/add', ['title' => 'Buat Laporan']);
    }

    public function store()
    {
        $post = Request::post();
        $files = Request::file();

        $rules = [
            'nim' => 'required',
            'violation_type_id' => 'required',
            'report_date' => 'required',
            'photo_evidence' => 'required_file|mimes:image/jpeg,image/jpg,image/png|max_size:2048',
        ];
        
        $validation = new Validation(array_merge($post, $files), $rules);

        if ($validation->validate()) {
            $userdata = Session::get('userdata');
            $post['reporter_id'] = $userdata['lecturer_id'];

            $violationType = new PanduanModel();
            $sanction = $violationType->findSactionById($post['violation_type_id']);
            $post['sanction_id'] = $sanction['sanction_id'];

            // Handle file upload
            $photo = $files['photo_evidence'];
            $destination = '/uploads/violations/';
            $filename = time() . '_' . $photo['name']; // Generate a unique file name.

            if (move_uploaded_file($photo['tmp_name'], __DIR__ . '/../../public'.$destination . $filename)) {
                $post['photo_evidence'] = $destination . $filename;
            } else {
                Redirect::back(['errors' => 'Gagal mengunggah bukti pelanggaran.']);
            }

            $model = new Violations();
            $model->create($post);
            Redirect::to('/pelaporan', ['success' => 'Berhasil menambahkan laporan!']);
        } else {
            Redirect::back(['errors' => $validation->errors()]);
        }
    }
}
