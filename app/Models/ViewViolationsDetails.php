<?php

namespace App\Models;

use Core\Model;

class ViewViolationsDetails extends Model
{
    protected string $table = 'ViolationsDetails';
    protected string $primaryKey = 'violation_id';

    public static function enumStatusClass(): array
    {
        return [
            'new' => 'info',
            'rejected' => 'danger',
            'process' => 'warning',
            'action_rejected' => 'danger',
            'done' => 'success',
        ];
    }

    function getTotalPelanggaranMahasiswa($student_id): int {
        return count($this->where('nim', '=', $student_id)->get());
    } 

    function getTanggunganPelanggaranMahasiswa($student_id): int {
        return count(
            $this->where('nim', '=', $student_id)
                 ->where('status', '!=', 'done')
                 ->get()
        );
    }
    

    function getPenyelesaianPelanggaranMahasiswa($student_id): int {
        return count(
            $this->where('nim', '=', $student_id)
                 ->where('status', '=', 'done')
                 ->get()
        );
    }
    
    function getTotalPelaporanDosen($lecturer_id): int {
        return count($this->where('reporter_id', '=', $lecturer_id)->get());
    }
    
    function getPelaporanDiterimaDosen($lecturer_id): int {
        return count(
            $this->where('reporter_id', '=', $lecturer_id)
            ->where('status', '=', 'process')
            ->get()
        );
    }
    
    function getPelaporanDitolakDosen($lecturer_id): int {
        return count(
            $this->where('reporter_id', '=', $lecturer_id)
            ->where('status', '=', 'rejected')
            ->get()
        );
    }
    
    function getTotalPelanggaranKelasDPA($lecturer_id): int {
        return $this->where('dpa_id', '=', $lecturer_id)->count();
    }

    function getLaporanPerluKonfirmasiDPA($lecturer_id): int {
        return count(
            $this->where('dpa_id', '=', $lecturer_id)
            ->where('status', '=', 'new')
            ->get()
        );
    }

    function getLaporanTerkonfirmasiDPA($lecturer_id): int {
        return count(
            $this->where('dpa_id', '=', $lecturer_id)
            ->where('status', '=', 'done')
            ->get()
        );
    }
}
