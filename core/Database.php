<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    public PDO $pdo;

    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};dbname={$config['name']};charset=utf8mb4";

        try {
            $this->pdo = new PDO($dsn, $config['user'], $config['pass']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Database Connection Failed: " . $e->getMessage());
        }
    }
    
    // Helper to execute queries safely
    public function query($sql, $params = [])
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
        return $statement;
    }
} 
