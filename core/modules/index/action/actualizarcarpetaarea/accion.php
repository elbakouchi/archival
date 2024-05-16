<?php
// print_r($_POST);
$cliente =  new CarpetaData();
foreach ($_POST as $k => $v) {
	$cliente->$k = $v;
	# code...
}

$cliente->usuario_id = $_SESSION["admin_id"];
 $cliente->Actualizacion_Carpeta();
$_SESSION["actualizar_datos"]= 1;
Core::alert("Les Information à jour...!");
// Core::redir("index.php?view=actualizaradministrador&id_usuario=".$_POST["id_usuario"]);
print "<script>window.location='index.php?view=carpetas&id_area_oficina=$_POST[tid]';</script>";
?>