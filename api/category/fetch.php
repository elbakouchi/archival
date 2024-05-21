<?php
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

try {
    // Connect to the database
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Get the period ID from the request
    $periodId = isset($_GET['period_id'])? $_GET['period_id'] : '';

    // Query to fetch categories for the given period ID
    $stmt = $pdo->prepare("SELECT c.id_carpeta, c.nombre FROM carpeta c INNER JOIN periodocarpeta p ON c.id_carpeta = p.carpeta_id WHERE p.periodo_id = ?");
    $stmt->execute([$periodId]);

    // Fetch all categories as an associative array
    $categories = $stmt->fetchAll();

    // Convert categories to JSON format
    header('Content-Type: application/json');
    echo json_encode($categories);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
