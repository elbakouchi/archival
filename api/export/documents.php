<?php
error_reporting(E_ERROR| E_PARSE);
require 'C:\\xampp\\htdocs\\archival\\core\\autoload.php'; // Include Composer's autoloader


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



function getAllByDate($pdo, $start, $end){
    $sql = " select a.* from archivo a WHERE date(fecha) >= ? and date(fecha) <= ? order by fecha desc ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$start, $end]);
    return $stmt->fetchAll();
}

function getAllByDateAndCarpeta($pdo, $carpeta_id, $start, $end){
    $sql =  " select a.* from archivo a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id "
         .  " WHERE c.carpeta_id = ? and  date(fecha) >= ? and date(fecha) <= ? order by fecha desc ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$carpeta_id, $start, $end]);
    return $stmt->fetchAll();
}

$pdo = Database::getPDO();

if(isset($_GET['category']) && $_GET['category']!= "0" && $_GET['category']!= "undefined"){
    $documents = getAllByDateAndCarpeta($pdo, $_GET['category'], $_GET["sd"], $_GET["ed"]);
} else {
    $documents = getAllByDate($pdo, $_GET["sd"], $_GET["ed"]);
}


// Prepare your data and headers
$data = [];

foreach($documents as $document) {
    //var_dump($document['otros']);
    $status;
    if($document['activo']){$status ='Actif';}
    elseif($document['perdido']){$status='Perdu';}
    else{$status='Inactif';}
    $lineData = array($document['nombre_documento'], $document['descripcion'], $document['ubicacion'], $document['folio'], $document['responsable'], $document['otros'], $status, $document['fecha'] );
    array_push( $data , $lineData );
}
//var_dump($data);
//die();
$headers = [
   'Document',
   'Description',
   'Emplacement',
   'n° boite archive',
   'Objet',
   'Nom de fichier',
   'État',
   'Date'
];
$fileName = 'export-documents-'. date('Y-m-d-H-m-s') . '.xlsx';

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set the headers
// Adjusting the loop to start from the second row (assuming headers are in the first row)
for ($col = 0, $colCount = count($headers); $col < $colCount; ++$col) {
    $sheet->setCellValue(sprintf('%s1', chr(65 + $col)), $headers[$col]);
}

// Populate the sheet with data
// Correctly using setCellValue for each cell
for ($row = 0, $rowCount = count($data); $row < $rowCount; ++$row) {
    for ($col = 0, $colCount = count($data[$row]); $col < $colCount; ++$col) {
        //echo "row: $row<br>";
        $cellAddress = sprintf('%s%d', chr(65 + $col), $row + 2); // Convert column index to letter
       // echo "cellAddress:", $cellAddress;
        $sheet->setCellValue($cellAddress, $data[$row][$col]);
    }
}
//die();


// Send the file to the browser for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'. urlencode($fileName). '"');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

?>
