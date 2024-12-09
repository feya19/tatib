<?php
namespace App\Controllers;

use App\Models\ViewViolationsDetails;
use Core\Controller;
use App\Models\Violations;
use Core\Redirect;
use Core\Request;
use Core\Session;
use Core\Validation;

class VerifikasiController extends Controller {

    public function kelas() {
        if (Request::isAjax()) {
            [$data, $total] = $this->dataTable('class');
            self::json([
                'total' => $total,
                'rows' => $data,
            ]);
        }

        $title = 'Riwayat Laporan Pelanggaran Mahasiswa';
        self::render('verifikasi/kelas', [
            'title' => $title,
            'status' => Violations::enumStatus(),
            'status_class' => ViewViolationsDetails::enumStatusClass(),
        ]);
    }
    
    public function jurusan() {
        if (Request::isAjax()) {
            [$data, $total] = $this->dataTable('sekjur');
            self::json([
                'total' => $total,
                'rows' => $data,
            ]);
        }

        $title = 'Riwayat Laporan Pelanggaran Mahasiswa';
        self::render('verifikasi/jurusan', [
            'title' => $title,
            'status' => Violations::enumStatus(),
            'status_class' => ViewViolationsDetails::enumStatusClass(),
        ]);
    }

    private function processViolation($id, $redirectUrl, $accessCheckCallback, $statusLevels) {
        $data['title'] = 'Informasi Pelanggaran';
        $model = new ViewViolationsDetails();
        $data['model'] = $model->find($id);
    
        if (empty($data['model'])) {
            Redirect::to($redirectUrl, ['error' => 'Data tidak ditemukan']);
        }
    
        if (!$accessCheckCallback($data['model'])) {
            Redirect::to($redirectUrl, ['error' => 'Anda tidak memiliki akses']);
        }
    
        $data['model']->statusClass = ViewViolationsDetails::enumStatusClass($data['model']->status);
        $data['model']->statusText = Violations::enumStatus($data['model']->status);
        $data['views'] = ViewViolationsDetails::enumStatusForms($data['model']->status);
        if (isset($data['views']['lecturer'])) {
            $data['views'] = $data['views']['lecturer'];
        }
        $data['back'] = $redirectUrl;
        self::render('verifikasi/proses', $data);
    }
    
    public function prosesKelas($id) {
        $this->processViolation($id, '/verifikasi/kelas', function($model) {
            return $model->dpa_id == Session::get('userdata')['lecturer_id'] && in_array($model->sanction_level, ['V', 'IV', 'III']);
        }, ['V', 'IV', 'III']);
    }
    
    public function prosesJurusan($id) {
        $this->processViolation($id, '/verifikasi/jurusan', function($model) {
            return Session::get('userdata')['is_sekjur'] && in_array($model->sanction_level, ['I', 'II']);
        }, ['I', 'II']);
    }
    
    private function submitViolation($id, $redirectUrl) {
        $post = Request::post();
        $rules = ['type' => 'required'];
    
        if ($post['type'] == 'rejected' || $post['type'] == 'process') {
            if ($post['type'] == 'rejected') {
                $rules['verification_comment'] = 'required';
            }
            
            $validation = new Validation($post, $rules);

            if (!$validation->validate()) {
                Redirect::back(['errors' => $validation->errors()]);
            }
    
            $model = new Violations();
            $data = $model->find($id);
    
            if (empty($data)) {
                Redirect::to($redirectUrl, ['error' => 'Data tidak ditemukan']);
            }
    
            $data->status = $post['type'];
            $data->verifier_id = Session::get('userdata')['lecturer_id'];
            $data->verification_comment = $post['verification_comment'] ?? null;
            $data->assigned_date = date('Y-m-d H:i:s');
            $data->save();
            Redirect::to($redirectUrl, ['success' => 'Laporan berhasil '.($post['type'] == 'process' ? 'diproses' : 'ditolak')]);
        } else if ($post['type'] == 'action_rejected' || $post['type'] == 'done') {
            if ($post['type'] == 'action_rejected') {
                $rules['comment'] = 'required';
            }
            $validation = new Validation($post, $rules);

            if (!$validation->validate()) {
                Redirect::back(['errors' => $validation->errors()]);
            }
    
            $model = new Violations();
            $data = $model->find($id);
    
            if (empty($data)) {
                Redirect::to($redirectUrl, ['error' => 'Data tidak ditemukan']);
            }
    
            $data->status = $post['type'];
            $data->comment = $post['comment'] ?? null;
            $data->action_verified_at = date('Y-m-d H:i:s');
            $data->save();
            Redirect::to($redirectUrl, ['success' => 'File berhasil '.($post['type'] == 'process' ? 'diproses' : 'ditolak')]);
        } else {
            Redirect::back(['errors' => 'Invalid type.']);
        }
    }
    
    public function submitKelas($id) {
        $this->submitViolation($id, '/verifikasi/kelas');
    }
    
    public function submitJurusan($id) {
        $this->submitViolation($id, '/verifikasi/jurusan');
    }
    

    private function dataTable(string $type) {
        $model = new ViewViolationsDetails();
        $limit = Request::get('limit') ?: 10;
        $offset = Request::get('offset') ?: 0;
        $sort = Request::get('sort') ?: 'violation_number';
        $order = Request::get('order') ?: 'DESC';
        $search = Request::get('search') ? strtolower(Request::get('search')) : null;
        
        $model->where(function($query) {
            $query->where('status', '=', 'new')
                ->orWhere(function($q) {
                $q->where('status', '=', 'process')
                    ->where('verifier_id', '=', Session::get('userdata')['lecturer_id'])
                    ->where('sanction_action_file IS NOT NULL');
                });
        });
        if ($type == 'class') {
            $model->where('dpa_id', '=', Session::get('userdata')['lecturer_id']);
            $model->whereIn('sanction_level', ['V', 'IV', 'III']);
        } else {
            $model->whereIn('sanction_level', ['II', 'I']);
        }

        if ($search) {
            $model->where(function ($query) use ($search) {
                $query->where('CAST(report_date AS varchar)', 'LIKE', "%$search%")
                    ->orWhere('LOWER(violation_number)', 'LIKE', "%$search%")
                    ->orWhere('LOWER(reporter_name)', 'LIKE', "%$search%")
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
        $total = $model->count();
        return [$data, $total];
    }
}