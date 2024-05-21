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

function filterData(&$str){
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}
 
function getAllByDate($pdo, $start,$end){
    if($start == $end){
        $sql = "select a.* from carpeta a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE date(fecha) = ? and activo=1 order by fecha desc";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$start]);
    }else{
        $sql = "select a.* from carpeta a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE date(fecha) >= ? and date(fecha) <= ? and activo=1 order by fecha desc";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$start, $end]);
    }
    return $stmt->fetchAll();
}

function getAllByDateAndCarpeta($pdo, $carpeta_id, $start, $end){
    if($start == $end){
        $sql = "select a.* from archivo a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE c.carpeta_id = ? and date(fecha) = ? and activo=1 order by fecha desc";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$carpeta_id, $start]);
    }else{
        $sql = "select a.* from archivo a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE c.carpeta_id = ? and  date(fecha) >= ? and date(fecha) <= ? and activo=1 order by fecha desc";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$carpeta_id, $start, $end]);
    }
    return $stmt->fetchAll();
}

try {
    // Connect to the database
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Filter the excel data

    // Excel file name for download
    $fileName = "documents-data_" . date('Y-m-d-H-m-s') . ".xls";
    
    if(isset($_GET['category']) && $_GET['category']!="0" &&  $_GET['category']!="undefined"){
        $operations = getAllByDateAndCarpeta($pdo, $_GET['category'],$_GET["sd"],$_GET["ed"],2);
        var_dump($operations);
        die();
    }
    elseif( !isset($_GET["id_archivo"]) || $_GET["id_archivo"]==""){
        $operations = getAllByDate($pdo, $_GET["sd"],$_GET["ed"],2);
        die($operations);
    }
    //else{
    //$operations = getAllByDateOfficialBP($_GET["id_archivo"],$_GET["sd"],$_GET["ed"],2);
    //} 

    // Column names
    $fields = array('Document', 'Description', 'Emplacement', 'Folio', 'Adressé à', 'Assisté', 'État', 'Date');
    
    // Display column names as first row
    $excelData = implode("\t", array_values($fields)) . "\n";
    
    // Fetch records from database
    //$query = $db->query("SELECT * FROM members ORDER BY id ASC");
    
    if($query->num_rows > 0){ 
        // Output each row of the data
        while($row = $query->fetch_assoc()){
            $status = ($row['status'] == 1)?'Active':'Inactive';
            $lineData = array($row['id'], $row['first_name'], $row['last_name'], $row['email'], $row['gender'], $row['country'], $row['created'], $status);
            array_walk($lineData, 'filterData');
            $excelData .= implode("\t", array_values($lineData)) . "\n";
        }
    }else{
        $excelData .= 'No records found...'. "\n";
    }
 
    // Headers for download
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment;filename=\"$fileName\"");
    
    // Render excel data
    echo $excelData;
    
    exit;
}catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>