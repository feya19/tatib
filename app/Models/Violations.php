<?php

namespace App\Models;

use Core\Model;

class Violations extends Model {
    protected string $table = 'Violations'; 
    protected string $primaryKey = 'violation_id';
}
