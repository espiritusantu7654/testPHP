<?php

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'phptest');
define('DB_USER', 'root');
define('DB_PASS', 'password');

// Database class
class DB {
    private $conn;

    public function __construct() {
        $this->conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}