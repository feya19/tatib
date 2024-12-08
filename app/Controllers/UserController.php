<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\MahasiswaModel;
use App\Models\DosenModel;
use App\Models\Kelas;
use App\Models\User;
use App\Models\ViewLecturerDetails;
use Core\Session;
use Core\Redirect;
use Core\Request;
use Core\Validation;
use Exception;

class UserController extends Controller {
    
    public function dosen() {
        if (Request::isAjax()) {
            $model = new ViewLecturerDetails();
            $limit = Request::get('limit') ?: 10;
            $offset = Request::get('offset') ?: 0;
            $sort = Request::get('sort') ?: 'nidn';
            $order = Request::get('order') ?: 'ASC';
            $search = Request::get('search') ? strtolower(Request::get('search')) : null;

            if ($search) {
                $model->where(function($query) use ($search) {
                    $query->Where('nidn', 'LIKE', "%$search%")
                        ->orWhere('LOWER(nip)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(username)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(email)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(name)', 'LIKE', "%$search%");
                });
            }

            if ($sort) {
                $model->orderBy($sort, strtoupper($order));
            }
            
            $data = $model->limit($limit)->offset($offset)->get();
            $total = $model->count(); 
            
            
            foreach ($data as &$row) {
                if ($row['is_admin'] == 1) {
                    $row['role'] = 'Admin';
                } elseif ($row['is_sekjur'] == 1) {
                    $row['role'] = 'Sekjur';
                } else if (!empty($row['classes'])) {
                    $row['role'] = 'DPA';
                } else {
                    $row['role'] = 'Dosen Pengajar';
                }
            }

            self::json([
                'total' => $total,
                'rows' => $data,
            ]);
        }
        $title = 'Data Seluruh Dosen';
        self::render('data_user/dosen', [
            'title' => $title,
        ]);
    }

    public function mahasiswa() {
        if (Request::isAjax()) {
            $model = new MahasiswaModel();
            $limit = Request::get('limit') ?: 10;
            $offset = Request::get('offset') ?: 0;
            $sort = Request::get('sort') ?: 'nim';
            $order = Request::get('order') ?: 'ASC';
            $search = Request::get('search') ? strtolower(Request::get('search')) : null;

            if ($search) {
                $model->where(function($query) use ($search) {
                    $query->Where('nim', 'LIKE', "%$search%")
                        ->orWhere('LOWER(username)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(email)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(name)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(class_name)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(program_study_name)', 'LIKE', "%$search%")
                        ->orWhere('LOWER(student_year)', 'LIKE', "%$search%");
                });
            }
            if ($sort) {
                $model->orderBy($sort, strtoupper($order));
            }

            $data = $model->limit($limit)->offset($offset)->get();
            $total = $model->count(); 

            self::json([
                'total' => $total,
                'rows' => $data,
            ]);
        }
        $title = 'Data Seluruh Mahasiswa';
        self::render('data_user/mahasiswa', [
            'title' => $title,
        ]);
    }

    public function addDosen() {
        var_dump($_POST);
    }

    public function addMahasiswa() {
        $postUser = Request::post();
        $postMhs = Request::post();

        $postMhs['class_id'] = (int) $postMhs['class_id'];

        $rules = [
            'nim' => 'required',
            'username' => 'required',
            'password' => 'required',
            'name' => 'required',
            'email' => 'required',
            'class_id' => 'required',
            'student_year' => 'required',
        ];
        
        // var_dump($postMhs); 
        $allowedKeysUser = ['username', 'password', 'email'];

        $modelUser = new User();
        $filteredPostUser = array_intersect_key($postUser, array_flip($allowedKeysUser));

        $var2 = $modelUser->create($filteredPostUser);
        print_r($var2);

        // $validationUser = new Validation($postUser, $rules);
        // $validationMhs = new Validation($postMhs, $rules);
        // if ($validationUser->validate() && $validationMhs->validate()) {
        //     $allowedKeysUser = ['username', 'password', 'email'];
        //     $allowedKeysMhs = ['nim', 'name', 'class_id', 'student_year'];
        //     $filteredPostUser = array_intersect_key($postUser, array_flip($allowedKeysUser));
        //     $filteredPostMhs = array_intersect_key($postMhs, array_flip($allowedKeysMhs));
        //     $modelUser = new User();
        //     $var = $modelUser;
        //     // var_dump($var);
        //     $modelMhs = new MahasiswaModel();
        //     // $modelUser->create($filteredPostUser);
        //     // $modelMhs->create($filteredPostMhs);
        //     Redirect::to('/data_user/mahasiswa', ['success' => 'Berhasil menambahkan data Mahasiswa!']);
        // } else {
        //     Redirect::back(['errors' => $validationUser->errors()]);
        // }
    }
}