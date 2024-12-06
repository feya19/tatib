<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\MahasiswaModel;
use App\Models\DosenModel;
use Core\Session;

class UserController extends Controller {

    public function mahasiswa() {
        $title = 'Data Mahasiswa';
        $model = new MahasiswaModel();
        $data = $model->get();
        self::render('data_user/mahasiswa', ['title' => $title, 'data' => $data]);
    }
    
    public function dosen() {
        $title = 'Data Dosen';
        $model = new DosenModel();
        $data = $model->get();
        self::render('data_user/dosen', ['title' => $title, 'data' => $data]);
    }
}