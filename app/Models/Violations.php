<?php

namespace App\Models;

use Core\Model;

class Violations extends Model {
    protected string $table = 'Violations'; 
    protected string $primaryKey = 'violation_id';

    public static function enumStatus(): array {
        return [
            'new' => 'Baru',
            'rejected' => 'Ditolak',
            'process' => 'Diproses',
            'action_rejected' => 'Pelaksanaan Sanksi Ditolak',
            'done' => 'Selesai'
        ];
    }

    function getTotalPelanggaran(): int {
        return $this->count();
    }
}
