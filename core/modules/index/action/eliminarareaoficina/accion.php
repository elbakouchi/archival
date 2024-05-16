<?php

$teams = PeriodoAreaData::getAllByAlumnId($_GET["id_area_oficina"]);
foreach ($teams as $t) {
	$t->del();
}

$documento = AreaOficinaData::getById($_GET["id_area_oficina"]);
$documento->del();

Core::redir("./?view=area&id_periodo=$_GET[tid]");
?>