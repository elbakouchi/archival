<?php

$teams = CarpetaAreaOficina::getAllByAlumnId($_GET["id_carpeta"]);
foreach ($teams as $t) {
	$t->eliminar();
}

$documento = CarpetaData::getById($_GET["id_carpeta"]);
$documento->del();

Core::redir("./?view=carpetas&id_area_oficina=$_GET[tid]");
?>