<?php
namespace App\Models;

use Core\Model;

class InvoiceGenerateModel extends Model {

    protected string $table = 'ViolationsDetails'; // Nama tabel utama dalam database

    // Fungsi untuk mendapatkan data invoice berdasarkan NIM
    public function getInvoiceByNim(string $nim): array {
        $sql = "SELECT 
                    v.violation_id, 
                    v.report_date,
                    v.nim, 
                    v.student_name, 
                    v.student_class,
                    v.verifier_name, 
                    v.verifier_nip, 
                    v.violation_type_name, 
                    v.sanction_level, 
                    v.sanction_level_description
                FROM {$this->table} v
                WHERE v.nim = :nim";
        $params = ['nim' => $nim];

        return $this->query($sql, $params);
    }
}
?>