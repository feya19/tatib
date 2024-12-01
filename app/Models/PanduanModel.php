<?php
namespace App\Models;

use Core\Model;

class PanduanModel extends Model {

    protected string $table = 'ViolationTypes'; // Nama tabel dalam database

    // Fungsi untuk mengonversi angka Romawi menjadi angka biasa
    public function romanToInt($roman) {
        $romans = [
            'I' => 1,
            'II' => 2,
            'III' => 3,
            'IV' => 4,
            'V' => 5
        ];
        return isset($romans[$roman]) ? $romans[$roman] : null;
    }

    // Mendapatkan data berdasarkan filter
    public function getPanduan($level = '', $search = ''): array {
        // Mulai query dasar
        $sql = "SELECT * FROM {$this->table} WHERE 1=1";
        $params = [];

        // Konversi level jika menggunakan angka Romawi
        if (!empty($level)) {
            $level = $this->romanToInt($level);  // Mengonversi angka Romawi ke angka biasa
            if ($level !== null) {
                $sql .= " AND level_id = :level";
                $params['level'] = $level;
            }
        }

        // Tambahkan filter pencarian jika tersedia
        if (!empty($search)) {
            $sql .= " AND type_name LIKE :search";
            $params['search'] = '%' . $search . '%';
        }

        // Eksekusi query dan kembalikan hasilnya
        return $this->query($sql, $params);
    }
}
