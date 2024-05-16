<?php
if(isset($_SESSION["admin_id"])){
$admin = UserData::getDELById($_SESSION["admin_id"]);
$user = UserData::getDELById($_GET["id_usuario"]);

if($user->id_usuario!=$admin->id_usuario){
	$user->eliminar();
}else{
	Core::alert("No te puedes eliminar a ti mismo");
}

Core::redir("index.php?view=encargados");
}
?>