<?php

namespace App\Models;

use Core\Model;

class Mahasiswa extends Model {
    protected string $table = 'Students'; 
    protected string $primaryKey = 'nim';
}
