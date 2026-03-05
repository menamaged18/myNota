<?php

class Database {
    public $connection;

    // while pushing i will remove the password
    public function __construct($config, $username = 'Mina', $password = 'pass') {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        try {
            $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function query($query, $params = []) {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $statement;
    }
}

// Load the configuration
$config = require('Config.php');

// Initialize the database
$db = new Database($config['database']);

