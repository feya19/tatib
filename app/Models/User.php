<?php

namespace App\Models;

use Core\Model;

class User extends Model {
    protected string $table = 'Users';      // Define the table name
    protected string $primaryKey = 'id';    // Define the primary key (if different from default)
}
