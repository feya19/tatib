<?php

namespace Core;

use PDO;
use PDOException;

class Model {
    protected string $table; // Table name
    protected string $primaryKey = 'id'; // Primary key column
    private static ?PDO $pdo = null;    // Database connection
    protected array $attributes = [];   // Stores the model's data

    public function __construct() {
        if (self::$pdo === null) {
            try {
                self::$pdo = (new Database())->getConnection();
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
    }

    /**
     * Get all records.
     */
    public function all(): array {
        $stmt = self::$pdo->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Find a record by primary key.
     */
    public function find($id): ?self {
        $stmt = self::$pdo->prepare("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $this->attributes = $result;
            return $this;
        }

        return null;
    }

    /**
     * Insert a new record.
     */
    public function create(array $data): bool {
        $this->attributes = $data;

        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $stmt = self::$pdo->prepare($sql);

        return $stmt->execute($data);
    }

    /**
     * Update the current record.
     */
    public function save(): bool {
        $setClause = implode(', ', array_map(fn($key) => "{$key} = :{$key}", array_keys($this->attributes)));
        $sql = "UPDATE {$this->table} SET {$setClause} WHERE {$this->primaryKey} = :id";

        $stmt = self::$pdo->prepare($sql);
        return $stmt->execute($this->attributes);
    }

    /**
     * Delete the current record.
     */
    public function delete(): bool {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id";
        $stmt = self::$pdo->prepare($sql);

        return $stmt->execute(['id' => $this->attributes[$this->primaryKey]]);
    }

    /**
     * Get an attribute.
     */
    public function __get($name) {
        return $this->attributes[$name] ?? null;
    }

    /**
     * Set an attribute.
     */
    public function __set($name, $value) {
        $this->attributes[$name] = $value;
    }
}
