<?php

namespace App\Models;

use Core\Model;

class User extends Model {
    protected string $table = 'Users'; 
    protected string $primaryKey = 'user_id';
}
