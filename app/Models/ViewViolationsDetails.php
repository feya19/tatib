<?php

namespace App\Models;

use Core\Model;

class ViewViolationsDetails extends Model
{
    protected string $table = 'ViolationsDetails';
    protected string $primaryKey = 'violation_id';
    const FILE_PATH = 'detail_pelanggaran/';

    public static function enumStatusClass(string $status = ''): array|string
    {
        $classes = [
            'new' => 'info',
            'rejected' => 'danger',
            'process' => 'warning',
            'action_rejected' => 'danger',
            'done' => 'success',
        ];

        return $classes[$status] ?? $classes;
    }
    
    public static function enumStatusViews(string $status = ''): array
    {
        $baseViews = [
            'view/detail_pelanggaran',
            'view/verifikasi_laporan',
        ];

        $views = [
            'new' => $baseViews,
            'rejected' => $baseViews,
            'process' => [
                ...$baseViews,
                'view/pelaksanaan_sanksi'
            ],
            'action_rejected' => [
                ...$baseViews,
                'view/pelaksanaan_sanksi',
                'view/verifikasi_pelaksanaan'
            ],
            'done' => [
                ...$baseViews,
                'view/pelaksanaan_sanksi',
                'view/verifikasi_pelaksanaan',
                'view/dokumen_pembebasan'
            ],
        ];

        return $views[$status] ?? $views;
    }


    public static function enumStatusForms(string $status = ''): array
    {
        $views = [
            'new' => [
                'view/detail_pelanggaran',
                'form/verifikasi_laporan'
            ],
            'process' => [
                'student' => [
                    'view/detail_pelanggaran',
                    'form/pelaksanaan_sanksi'
                ],
                'lecturer' => [
                    'view/detail_pelanggaran',
                    'view/pelaksanaan_sanksi',
                    'form/verifikasi_pelaksanaan'
                ]
            ]
        ];

        return $views[$status] ?? $views;
    }

    function getTotalPelanggaranMahasiswa($student_id): int {
        return count($this->where('nim', '=', $student_id)->get());
    } 

    function getTanggunganPelanggaranMahasiswa($student_id): int {
        return count(
            $this->where('nim', '=', $student_id)
                 ->where('status', '!=', 'done')
                 ->get()
        );
    }
    

    function getPenyelesaianPelanggaranMahasiswa($student_id): int {
        return  $this->where('nim', '=', $student_id)
                ->where('status', '=', 'done')
                ->count();
    }
    
    function getTotalPelaporanDosen($lecturer_id): int {
        return count($this->where('reporter_id', '=', $lecturer_id)->get());
    }
    
    function getPelaporanDiterimaDosen($lecturer_id): int {
        return 
            $this->where('reporter_id', '=', $lecturer_id)
            ->where('status', '=', 'done')
            ->count();
    }
    
    function getPelaporanDitolakDosen($lecturer_id): int {
        return
            $this->where('reporter_id', '=', $lecturer_id)
            ->where('status', '=', 'rejected')
            ->count();
    }
    
    function getTotalPelanggaranKelasDPA($lecturer_id): int {
        return $this->where('dpa_id', '=', $lecturer_id)->count();
    }

    function getLaporanPerluKonfirmasiDPA($lecturer_id): int {
        return count(
            $this->where('dpa_id', '=', $lecturer_id)
            ->where('status', '=', 'new')
            ->get()
        );
    }

    function getLaporanTerkonfirmasiDPA($lecturer_id): int {
        return count(
            $this->where('dpa_id', '=', $lecturer_id)
            ->where('status', '=', 'done')
            ->get()
        );
    }
}
