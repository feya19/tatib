<?php

namespace App\Models;

use Core\Model;

class Violations extends Model {
    protected string $table = 'Violations'; 
    protected string $primaryKey = 'violation_id';

    public static function enumStatus(string $status = ''): array|string
    {
        $array = [
            'new' => 'Baru',
            'rejected' => 'Ditolak',
            'process' => 'Diproses',
            'action_rejected' => 'File Ditolak',
            'done' => 'Selesai'
        ];

        return $array[$status] ?? $array;
    }

    function getTotalPelanggaran(): int {
        return $this->count();
    }
}
