<?php
// print_r($_POST);
$cliente =  new Userdata();
foreach ($_POST as $k => $v) {
	$cliente->$k = $v;
	# code...
}


if(isset($_POST["activo"])) { $cliente->activo=1; }else{ $cliente->activo=0; }
if(isset($_POST["admin"])) { $cliente->admin=1; }else{ $cliente->admin=0; }
if(isset($_POST["publico"])) { $cliente->publico=1; }else{ $cliente->publico=0; }
 $cliente->actualizar_pivilegio();
$_SESSION["actualizar_datos"]= 1;
Core::alert("Les Information à jour...!");
Core::redir("index.php?view=actualizaradministrador&id_usuario=".$_POST["id_usuario"]);

?>