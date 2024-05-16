<?php
// print_r($_POST);
$documento =  new DocumentoData();
foreach ($_POST as $k => $v) {
	$documento->$k = $v;
	# code...
}

$documento->usuario_id = $_SESSION["admin_id"];
$documento->publico = isset($_POST["publico"]) ? 1 :0;
$documento->activo = isset($_POST["activo"]) ? 1 :0;
$documento->perdido = isset($_POST["perdido"]) ? 1 :0;
 $documento->Actualizacion_Documento();
$_SESSION["actualizar_datos"]= 1;
Core::alert("Les Information à jour...!");
// Core::redir("index.php?view=actualizaradministrador&id_usuario=".$_POST["id_usuario"]);
print "<script>window.location='index.php?view=documento&id_carpeta=$_POST[tid]';</script>";
?>


