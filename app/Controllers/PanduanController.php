<?php
namespace App\Controllers;

use App\Models\PanduanModel;
use Core\Controller;

class PanduanController extends Controller
{

    public function index()
    {
        $title = 'Panduan Tata Tertib';
        $level = $_GET['level'] ?? '';
        $search = $_GET['search'] ?? '';

        $model = new PanduanModel();

        $violations = $model->getPanduan($level, $search);
        $levels = $model->getLevels();
        $sanctions = $model->getSanctions();

        self::render('panduan', [
            'violations' => $violations,
            'levels' => $levels,
            'sanctions' => $sanctions,
            'title' => $title,
        ]);
    }
}
