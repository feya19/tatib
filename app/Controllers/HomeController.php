<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\User;
use Helpers\Pdf;

class HomeController extends Controller {

    public function index() {
        $userModel = new User();
        $data['examples'] = $userModel->all();
        $data['title'] = "Home Page";

        self::render('home', $data);
    }

    public function pdf() {
        $html = "<h1>PDF Example</h1><p>This is a sample PDF content.</p>";
        Pdf::generatePdf($html, 'example.pdf');
    }
}
