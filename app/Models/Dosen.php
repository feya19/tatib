<?php

namespace App\Models;

use Core\Model;

class Dosen extends Model {
    protected string $table = 'Lecturers'; 
    protected string $primaryKey = 'nidn';
}
