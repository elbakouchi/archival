<?php


if(isset($_SESSION["admin_id"])){
	$user = UserData::getById($_SESSION["admin_id"]);
	$user->nombre = $_POST["nombre"];
	$user->apellido = $_POST["apellido"];
	$user->dni = $_POST["dni"];
	$user->telefono = $_POST["telefono"];
	$user->email = $_POST["email"];
	$user->sexo = $_POST["sexo"];
	$user->actulizar_datos();
	setcookie("password_updated","true");
	print "<script>alert('Actualizado Exitosamente!');window.location='index.php?view=perfil';</script>";

}else {
		print "<script>window.location='index.php';</script>";
}

?>