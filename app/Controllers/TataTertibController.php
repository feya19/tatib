<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\PanduanModel;

class TataTertibController extends Controller {

    public function index() {
        $title = 'Data Tata Tertib';
        $model = new PanduanModel();
        $data = $model->get();
        self::render('data_tatib/index', ['title' => $title, 'data' => $data]);
    }
}
