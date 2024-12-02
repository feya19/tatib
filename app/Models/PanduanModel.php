<?php
namespace App\Models;

use Core\Model;

class PanduanModel extends Model {

    protected string $table = 'ViolationTypes'; // Nama tabel dalam database

    // Mendapatkan data berdasarkan filter
    public function getPanduan($level = '', $search = ''): array {
        // Mulai query dasar dengan join ke tabel Levels
        $sql = "SELECT vt.type_id, vt.type_name, l.level_name 
                FROM {$this->table} vt
                JOIN Levels l ON vt.level_id = l.level_id
                WHERE 1=1";
        $params = [];

        // Filter berdasarkan level jika disediakan
        if (!empty($level)) {
            $sql .= " AND l.level_name = :level";
            $params['level'] = $level;
        }

        // Tambahkan filter pencarian jika tersedia
        if (!empty($search)) {
            $sql .= " AND vt.type_name LIKE :search";
            $params['search'] = '%' . $search . '%';
        }

        // Eksekusi query dan kembalikan hasilnya
        return $this->query($sql, $params);
    }
}