<?php
error_reporting(E_ERROR | E_PARSE);
require '..\\..\\core\\autoload.php'; // Include Composer's autoloader

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

function getAllByDate($pdo, $start, $end){
    $sql = "SELECT a.* FROM archivo a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE DATE(fecha) >=? AND DATE(fecha) <=? AND activo=1 ORDER BY fecha DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$start, $end]);
    return $stmt->fetchAll();
}

function getAllByDateAndCarpeta($pdo, $carpeta_id, $start, $end){
    $sql = "SELECT a.* FROM archivo a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE c.carpeta_id =? AND DATE(fecha) >=? AND DATE(fecha) <=? AND activo=1 ORDER BY fecha DESC";
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

$data = [];
foreach($documents as $document) {
    $status;
    if($document['activo']) {$status ='Actif';}
    elseif($document['perdido']) {$status='Perdu';}
    else {$status='Inactif';}
    //$user;
    //if($operation->usuario_id!=null){$user = $operation->getUsuario()->nombre." ".$operation->getUsuario()->apellido;}else{ $user ""; } 
    $lineData = array($document['nombre_documento'], $document['descripcion'], $document['ubicacion'], $document['folio'], $document['responsable'], $status, $document['fecha']);
    array_push($data, $lineData);
}

$headers = [
   'Document',
   'Description',
   'Emplacement',
   'n° boite archive',
   'Objet',
 //  'Assisté',
   'État',
   'Date'
];

$fileName = 'export_docs_'. date('Y-m-d-H-m-s') .'_.xlsx';

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Color the header and make text bold
$sheet->getStyle('A1:H1')->applyFromArray([
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => ['rgb' => 'FFC7CE'],
    ],
    'font' => [
        'bold' => true,
    ]
]);

// Populate the sheet with data
for ($row = 0, $rowCount = count($data); $row < $rowCount; ++$row) {
    for ($col = 0, $colCount = count($data[$row]); $col < $colCount; ++$col) {
        $cellAddress = sprintf('%s%d', chr(65 + $col), $row + 1);
        $sheet->setCellValue($cellAddress, $data[$row][$col]);
    }
}

// Send the file to the browser for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'. urlencode($fileName). '"');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
?>
