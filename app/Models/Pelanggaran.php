<?php

namespace App\Models;

use Core\Model;

class Pelanggaran extends Model {
    protected string $table = 'Violations'; 
    protected string $primaryKey = 'violation_id';
}