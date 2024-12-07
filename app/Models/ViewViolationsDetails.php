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


    public static function enumStatusForms(): array
    {
        return [
            'new' => 'form/verifikasi_laporan',
            'process' => [
                'student' => 'form/pelaksanaan_sanksi',
                'lecturer' => 'form/verifikasi_pelaksanaan'
            ]
        ];
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
        return count(
            $this->where('nim', '=', $student_id)
                 ->where('status', '=', 'done')
                 ->get()
        );
    }
    
    function getTotalPelaporanDosen($lecturer_id): int {
        return count($this->where('reporter_id', '=', $lecturer_id)->get());
    }
    
    function getPelaporanDiterimaDosen($lecturer_id): int {
        return count(
            $this->where('nim', '=', $lecturer_id)
            ->where('status', '=', 'process')
            ->get()
        );
    }
    
    function getPelaporanDitolakDosen($lecturer_id): int {
        return count(
            $this->where('nim', '=', $lecturer_id)
            ->where('status', '=', 'rejected')
            ->get()
        );
    }
    
    function getTotalPelanggaranKelasDPA($lecturer_id): int {
        return count($this->where('dpa_id', '=', $lecturer_id)->get());
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
