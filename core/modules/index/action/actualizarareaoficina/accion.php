<?php
// print_r($_POST);
$area =  new AreaOficinaData();
foreach ($_POST as $k => $v) {
	$area->$k = $v;
	# code...
}
$area->activo = isset($_POST["activo"]) ? 1 :0;
 $area->Actualizacion_AreOficina();
$_SESSION["actualizar_datos"]= 1;
Core::alert("Les Information à jour...!");
// Core::redir("index.php?view=actualizaradministrador&id_usuario=".$_POST["id_usuario"]);
print "<script>window.location='index.php?view=area&id_periodo=$_POST[tid]';</script>";
?>


