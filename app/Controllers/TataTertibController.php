<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\PanduanModel;
use Core\Request;

class TataTertibController extends Controller {

    public function index() {
        if (Request::isAjax()) {
            $model = new PanduanModel();
            $limit = Request::get('limit') ?: 10;
            $offset = Request::get('offset') ?: 0;
            $sort = Request::get('sort') ?: 'type_id';
            $order = Request::get('order') ?: 'ASC';
            $search = Request::get('search') ? strtolower(Request::get('search')) : null;

            if ($search) {
                $model->where(function($query) use ($search) {
                    $query->Where('type_id', 'LIKE', "%$search%")
                        ->orWhere('LOWER(type_name)', 'LIKE', "%$search%");
                });
            }

            if ($sort) {
                $model->orderBy($sort, strtoupper($order));
            }
            
            $data = $model->limit($limit)->offset($offset)->get();
            $total = $model->count(); 

            // Menambahkan nomor urut
            foreach ($data as $index => $row) {
                $row['no'] = $offset + $index + 1;
                $data[$index] = $row;
            }

            self::json([
                'total' => $total,
                'rows' => $data,
            ]);
        }
        $title = 'Data Tata Tertib';
        self::render('data_tatib/index', [
            'title' => $title,
        ]);
    }
}
