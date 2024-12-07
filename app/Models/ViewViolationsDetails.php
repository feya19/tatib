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
}
