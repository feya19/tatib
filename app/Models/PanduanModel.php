<?php
namespace App\Models;

use Core\Model;

class PanduanModel extends Model {

    protected string $table = 'ViolationTypes'; 
    protected string $primaryKey = 'type_id';
    public function getPanduan($level = '', $search = ''): array {
        $sql = "SELECT vt.type_id, vt.type_name, l.level_name,
                FROM {$this->table} vt
                JOIN Levels l ON vt.level_id = l.level_id
                WHERE 1=1";
        $params = [];
        if (!empty($level)) {
            $sql .= " AND l.level_name = :level";
            $params['level'] = $level;
        }
        if (!empty($search)) {
            $sql .= " AND vt.type_name LIKE :search";
            $params['search'] = '%' . $search . '%';
        }
        return $this->query($sql, $params);
    }
    public function getLevels(): array {
        $sql = "SELECT level_id, level_name, description FROM Levels";
        return $this->query($sql);
    }
    public function getSanctions(): array {
        $sql = "SELECT s.sanction_id, l.level_name, s.sanction_description 
                FROM Sanctions s
                JOIN Levels l ON s.level_id = l.level_id";
        return $this->query($sql);
    }

    public function findSactionById($id): array {
        $sql = "SELECT TOP 1 s.sanction_id 
                FROM Sanctions s
                WHERE s.level_id = (
                    SELECT level_id FROM {$this->table} WHERE {$this->primaryKey} = {$id}
                )";
        return $this->query($sql)[0] ?? $this->query($sql);
    }
}