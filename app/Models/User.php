<?php

namespace App\Models;

use Core\Model;

class User extends Model {
    protected string $table = 'Users'; 
    protected string $primaryKey = 'id';
    protected string $viewTable = 'UserDetails';

    public function findByUsername(string $username) {
        $sql = "SELECT TOP 1 * FROM {$this->viewTable} WHERE username = :username";
        $data = $this->query($sql, ['username' => $username]);
        return !empty($data) ? $data[0] : $data;
    }
}
