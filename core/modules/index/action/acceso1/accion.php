<?php
if(count($_POST)>0){
$product = UserData::getById($_POST["id_usuario"]);
	if($_POST["usuario"]!=""){
		$product->usuario = $_POST["usuario"];
		$product->actualizar();
	}
if($_POST["password"]!=""){
		$product->password = sha1(md5($_POST["password"]));
		$product->update_password();
	}
	Core::alert("Actualización con Exito");
	// print "<script>window.location='./index.php?view=administrador';</script>";
	Core::redir("index.php?view=actualizaradministrador&id_usuario=".$_POST["id_usuario"]);
}?>