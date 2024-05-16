<?php

if(count($_POST)>0){
	$user = PeriodoData::getById($_POST["id_periodo"]);
	$user->nombre = $_POST["nombre"];
	$user->descripcion = $_POST["descripcion"];
	$user->activo = isset($_POST["activo"]) ? 1 :0;
	
	$user->actualizar_periodo();

print "<script>window.location='index.php?view=periodos';</script>";


}


?>