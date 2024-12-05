<?php

namespace App\Models;

use Core\Model;

class ViewUserDetails extends Model {
    protected string $table = 'UserDetails'; 

    public function findByUsername(string $username) {
        $sql = "SELECT TOP 1 * FROM {$this->table} WHERE username = :username";
        $data = $this->query($sql, ['username' => $username]);
        return !empty($data) ? $data[0] : $data;
    }
}
    