<?php

$teams = PeriodoCarpetaData::getAllByAlumnId($_GET["id_carpeta"]);
foreach ($teams as $t) {
	$t->del();
}

$documento = CarpetaData::getById($_GET["id_carpeta"]);
$documento->del();

Core::redir("./?view=periodo&id_periodo=$_GET[tid]");
?>