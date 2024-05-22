<?php 

require '../core/autoload.php';

// Database connection parameters
$host = 'localhost';
$db   = 'repositorio';
$user = 'root';
$pass = 'root';
$port = 3307;
$charset = 'utf8mb4';

// Create a DSN string
$dsn = "mysql:host=$host;dbname=$db;port=$port;charset=$charset";
// Set options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];