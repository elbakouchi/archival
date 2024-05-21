<?php
error_reporting(E_ERROR | E_PARSE);
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

function filterData(&$str){
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"'. str_replace('"', '""', $str). '"';
}

function getAllByDate($pdo, $start, $end){
    $sql = "select a.* from carpeta a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE date(fecha) >= ? and date(fecha) <= ? and activo=1 order by fecha desc";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$start, $end]);
    return $stmt->fetchAll();
}

function getAllByDateAndCarpeta($pdo, $carpeta_id, $start, $end){
    $sql = "select a.* from archivo a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE c.carpeta_id = ? and  date(fecha) >= ? and date(fecha) <= ? and activo=1 order by fecha desc";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$carpeta_id, $start, $end]);
    return $stmt->fetchAll();
}

//try {
    // Connect to the database
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Excel file name for download
    $fileName = "document-data_". date('Y-m-d-H-m-s'). ".xls";

    // Column names
    $fields = array(
        'id_archivo', 'usuario_id', 'tipo_id', 'codigo', 'nombre_documento',
        'descripcion', 'ubicacion', 'estante', 'modulo', 'numero', 'folio',
        'responsable', 'aricho', 'otros', 'publico', 'activo', 'perdido',
        'transferido', 'carpeta', 'fecha'
    );

    // Display column names as first row
    $excelData = implode("\t", array_values($fields)). "\n";

    // Fetch records from database
    if(isset($_GET['category']) && $_GET['category']!= "0" && $_GET['category']!= "undefined"){
        $operations = getAllByDateAndCarpeta($pdo, $_GET['category'], $_GET["sd"], $_GET["ed"]);
    } else {
        $operations = getAllByDate($pdo, $_GET["sd"], $_GET["ed"]);
    }

    foreach($operations as $operation) {
        $lineData = array_values($operation);
        array_walk($lineData, 'filterData');
        $excelData.= implode("\t", $lineData). "\n";
    }

    // Headers for download
    header("Content-Type: text/csv; charset=utf-8");
    header("Content-Disposition: attachment; filename=\"$fileName\"");

    // Render excel data
    echo $excelData;

    exit;
/*} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}*/
?>
