<?php

namespace App\Models;

use Core\Model;

class MahasiswaModel extends Model {
    protected string $table = 'StudentDetails'; 
    protected string $primaryKey = 'nim';

    function getTotalMahasiswa(): int {
        return $this->count();
    }
}
