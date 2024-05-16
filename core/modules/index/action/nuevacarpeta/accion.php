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

	$at = new PeriodoCarpetaData();
	$at->carpeta_id = $b[1];
	$at->periodo_id = $_POST["periodo_id"];
	$at->si();

print "<script>window.location='index.php?view=periodo&id_periodo=$_POST[periodo_id]';</script>";
}
?>
