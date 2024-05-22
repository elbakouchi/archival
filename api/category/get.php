<?php

error_reporting(E_ERROR | E_PARSE);
require '..\\..\\core\\autoload.php';



try {
	$pdo = Database::getPDO();
    
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