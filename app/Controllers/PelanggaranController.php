<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Pelanggaran;
use Core\Session;

class PelanggaranController extends Controller {

    public function index() {
        $title = 'Daftar Pelanggaran';
        $model = new Pelanggaran();
        if ($student_id = Session::get('userdata')['student_id']) {
            $model->where('nim', '=', $student_id);
        }
        $data = $model->get();
        self::render('pelanggaran/index', ['title' => $title, 'data' => $data]);
    }
}