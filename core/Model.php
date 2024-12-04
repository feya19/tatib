<?php

namespace Core;

use PDO;
use PDOException;

class Model {
    protected string $table; // Table name
    protected string $primaryKey = 'id'; // Primary key column
    private static ?PDO $pdo = null; // Database connection
    protected array $attributes = []; // Stores the model's data
    protected array $whereConditions = []; // Where conditions for queries
    protected string $orderClause = ''; // Order clause
    protected ?int $limitClause = null; // Limit clause
    protected ?int $offsetClause = null; // Offset clause

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
        $sql = "SELECT * FROM {$this->table}";
        return $this->query($sql);
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
     * Add a where condition.
     */
    public function where(string $column, string $operator, $value): self {
        $this->whereConditions[] = [$column, $operator, $value];
        return $this;
    }

    /**
     * Add a whereIn condition.
     */
    public function whereIn(string $column, array $values): self {
        $placeholders = implode(', ', array_fill(0, count($values), '?'));
        $this->whereConditions[] = ["{$column} IN ({$placeholders})", $values];
        return $this;
    }

    /**
     * Add order by clause.
     */
    public function orderBy(string $column, string $direction = 'ASC'): self {
        $this->orderClause = "ORDER BY {$column} {$direction}";
        return $this;
    }

    /**
     * Add limit clause.
     */
    public function limit(int $limit): self {
        $this->limitClause = $limit;
        return $this;
    }

    /**
     * Add offset clause.
     */
    public function offset(int $offset): self {
        $this->offsetClause = $offset;
        return $this;
    }

    /**
     * Get the first record.
     */
    public function first(): ?self {
        $this->limit(1);
        $results = $this->get();
        return $results[0] ?? null;
    }

    /**
     * Execute the built query and fetch records.
     */
    public function get(): array {
        $sql = "SELECT * FROM {$this->table}";

        $params = [];
        if (!empty($this->whereConditions)) {
            $whereSql = [];
            foreach ($this->whereConditions as $condition) {
                if (is_array($condition[2])) { // whereIn case
                    $whereSql[] = $condition[0];
                    $params = array_merge($params, $condition[1]);
                } else {
                    $whereSql[] = "{$condition[0]} {$condition[1]} ?";
                    $params[] = $condition[2];
                }
            }
            $sql .= " WHERE " . implode(' AND ', $whereSql);
        }

        if (!empty($this->orderClause)) {
            $sql .= " {$this->orderClause}";
        }

        if (!is_null($this->limitClause)) {
            $sql .= " LIMIT {$this->limitClause}";
        }

        if (!is_null($this->offsetClause)) {
            $sql .= " OFFSET {$this->offsetClause}";
        }

        return $this->query($sql, $params);
    }

    /**
     * Run a custom query.
     */
    protected function query(string $sql, array $params = []): array {
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
