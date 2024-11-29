<?php

namespace Core;

use PDO;

class Database {
    private $connection;

    public function __construct() {
        $host = Env::get('DB_HOST');
        $port = Env::get('DB_PORT');
        $dbname = Env::get('DB_DATABASE');
        $username = Env::get('DB_USERNAME');
        $password = Env::get('DB_PASSWORD');

        $dsn = "sqlsrv:Server=$host,$port;Database=$dbname";
        $this->connection = new PDO($dsn, $username, $password);
    }

    public function getConnection() {
        return $this->connection;
    }
}
