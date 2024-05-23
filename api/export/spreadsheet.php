<?php
error_reporting(E_ERROR | E_PARSE);
require '..\\..\\core\\autoload.php'; // Include Composer's autoloader

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

$tablename = "archivo";

function getAllByDate2($pdo, $start, $end){
    $sql = "SELECT a.*  FROM archivo a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE DATE(fecha) >=? AND DATE(fecha) <=? AND activo=1 ORDER BY fecha DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$start, $end]);
    return $stmt->fetchObject("DocumentoData");
}

function getAllByDateAndCarpeta2($pdo, $carpeta_id, $start, $end){
    $sql = "SELECT a.* FROM archivo a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE c.carpeta_id =? AND DATE(fecha) >=? AND DATE(fecha) <=? AND activo=1 ORDER BY fecha DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$carpeta_id, $start, $end]);
    return $stmt->fetchObject(DocumentoData);
}

function getAllByDateOfficial($start,$end){
    $sql = "select * from ". $tablename ." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and activo=1 order by fecha desc";
    if($start == $end){
     $sql = "select * from ". $tablename ." where date(fecha) = \"$start\" and activo=1 order by fecha desc";
    }
    $query = Executor::doit($sql);
    return Model::many($query[0],new DocumentoData());
}

function getAllByDateAndCarpeta($carpeta_id, $start, $end){
    $sql = "select a.* from ". $tablename ." a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE c.carpeta_id = ".$carpeta_id." and  date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and activo=1 order by fecha desc";
    if($start == $end){
     $sql = "select a.* from ". $tablename ." a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE c.carpeta_id = ".$carpeta_id." and date(fecha) = \"$start\" and activo=1 order by fecha desc";
    }
    $query = Executor::doit($sql);
    return Model::many($query[0],new DocumentoData());
}

$pdo = Database::getPDO();

if(isset($_GET['category']) && $_GET['category']!= "0" && $_GET['category']!= "undefined"){
    $documents = getAllByDateAndCarpeta2($_GET['category'], $_GET["sd"], $_GET["ed"]); //getAllByDateAndCarpeta($pdo, $_GET['category'], $_GET["sd"], $_GET["ed"]);
} else {
    $documents = getAllByDate2($pdo,$_GET["sd"], $_GET["ed"]); //getAllByDate($pdo, $_GET["sd"], $_GET["ed"]);
}

$data = [];
foreach($documents as $document) {
    var_dump($document);
    $status;
    if($document->activo) {$status ='Actif';}
    elseif($document->perdido) {$status='Perdu';}
    else {$status='Inactif';}
    $user;
    if($document->usuario_id!=null){$user = $document->getUsuario()->nombre." ".$document->getUsuario()->apellido;}else{ $user = ""; } 
    $lineData = array($document->nombre_documento, $document->descripcion, $document->ubicacion, $document->folio, $user, $status, $document->fecha);
    array_push($data, $lineData);
}

die();
$headers = [
   'Document',
   'Description',
   'Emplacement',
   'n° boite archive',
   'Objet',
   'Créé par',
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
