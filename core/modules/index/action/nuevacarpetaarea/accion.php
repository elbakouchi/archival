<?php
if(count($_POST)>0){
	$user = new CarpetaData();
	$user->nombre = $_POST["nombre"];
	$user->codigo = $_POST["codigo"];
	$user->estante = $_POST["estante"];
	$user->modulo = $_POST["modulo"];
	$user->descripcion = $_POST["descripcion"];
	// $user->periodo_id = $_POST["periodo_id"];
	$user->usuario_id = $_SESSION["admin_id"];

	$b = $user->registro_nueva_carpeta();

	$at = new CarpetaAreaOficina();
	$at->carpeta_id = $b[1];
	$at->area_oficina_id = $_POST["area_oficina_id"];
	$at->si();

print "<script>window.location='index.php?view=carpetas&id_area_oficina=$_POST[area_oficina_id]';</script>";
}
?>
