<?php

namespace App\Models;

use Core\Model;

class DosenModel extends Model {
    protected string $table = 'Lecturers'; 
    protected string $primaryKey = 'nidn';

    function getTotalDosen(): int {
        return $this->count();
    }
}
