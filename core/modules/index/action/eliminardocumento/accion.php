<?php

$teams = CarpetaArchivoData::getAllByAlumnId($_GET["id_archivo"]);
foreach ($teams as $t) {
	$t->del();
}

$documento = DocumentoData::getById($_GET["id_archivo"]);
$documento->del();

Core::redir("./?view=documento&id_carpeta=$_GET[tid]");
?>