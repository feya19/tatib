<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\User;
use Helpers\Pdf;
use Core\Validation;

class HomeController extends Controller {

    public function index() {
        $userModel = new User();
        $data['examples'] = $userModel->all();
        $data['title'] = "Home Page";

        self::view('home', $data);
    }

    public function pdf() {
        $html = "<h1>PDF Example</h1><p>This is a sample PDF content.</p>";
        Pdf::generatePdf($html, 'example.pdf');
    }

    public function login() {
        self::view('login');
    }

    public function authenticate() {
        $data = self::post();
    
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
    
        $validation = new Validation($data, $rules);
    
        if ($validation->validate()) {
            $userModel = new User();
            $user = $userModel->findByUsername($data['username']);
            if ($user && password_verify($data['password'], $user['password'])) {
                self::setSession('userdata', $user);
                self::redirect('/dashboard', ['success' => 'Login successful!']);
            } else {
                self::redirectBack(['errors' => 'Invalid username or password.']);
            }
        } else {
            self::redirectBack(['errors' => $validation->errors()]);
        }
    }

    public function logout() {
        self::destroySession();
        self::redirect('login');
    }
}
