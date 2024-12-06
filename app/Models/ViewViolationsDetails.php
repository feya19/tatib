<?php

namespace App\Models;

use Core\Model;

class ViewViolationsDetails extends Model {
    protected string $table = 'ViolationsDetails';
    protected string $primaryKey = 'violation_id';

    public static function enumStatusClass(): array {
        return [
            'new' => 'info',
            'rejected' => 'danger',
            'process' => 'warning',
            'action_rejected' => 'danger',
            'done' => 'success'
        ];
    }
}
    