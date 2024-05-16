<?php
if(count($_POST)>0){
	$user = new AreaOficinaData();
	$user->nombre = $_POST["nombre"];
	$user->detalle = $_POST["detalle"];
	// $user->periodo_id = $_POST["periodo_id"];
	// $user->usuario_id = $_SESSION["admin_id"];

	$b = $user->registro_nueva_areaoficina();

	$at = new PeriodoAreaData();
	$at->oficina_area_id = $b[1];
	$at->periodo_id = $_POST["periodo_id"];
	$at->si();

print "<script>window.location='index.php?view=area&id_periodo=$_POST[periodo_id]';</script>";
}
?>
