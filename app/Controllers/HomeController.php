<?php

namespace App\Controllers;

use App\Models\Kelas;
use Core\Controller;
use App\Models\ViewUserDetails;
use Core\Redirect;
use Core\Request;
use Core\Session;
use Helpers\Pdf;
use Core\Validation;

class HomeController extends Controller {

    public function index() {
        $userModel = new ViewUserDetails();
        $data['examples'] = $userModel->all();
        $data['title'] = "Home Page";

        self::view('home', $data);
    }

    public function pdf() {
        $html = "<h1>PDF Example</h1><p>This is a sample PDF content.</p>";
        Pdf::generatePdf($html, 'example.pdf');
    }

    public function login() {
        if (Session::has('userdata')) {
            Redirect::to('dashboard');
        }
        self::view('login');
    }

    public function authenticate() {
        $data = Request::post();
    
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
    
        $validation = new Validation($data, $rules);
    
        if ($validation->validate()) {
            $userModel = new ViewUserDetails();
            $user = $userModel->findByUsername($data['username']);
            if ($user && password_verify($data['password'], $user['password'])) {
                if ($user['lecturer_id']) {
                    $classModel = new Kelas();
                    $user['classes'] = $classModel->where('dpa_id', '=', $user['lecturer_id'])->get();
                }
                Session::set('userdata', $user);
                Redirect::to('/dashboard', ['success' => 'Login successful!']);
            } else {
                Redirect::back(['errors' => 'Invalid username or password.']);
            }
        } else {
            Redirect::back(['errors' => $validation->errors()]);
        }
    }   

    public function logout() {
        Session::destroy();
        Redirect::to('/login');
    }
    
    public function profil() {
        self::render('profil');
    }
}
