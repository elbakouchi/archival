<?php
// print_r($_POST);
$jefe =  new UserData();
foreach ($_POST as $k => $v) {
	$jefe->$k = $v;
	# code...
}
$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$jefe->password = sha1(md5($_POST["password"]));
$jefe->Nuevo_Administrador();

Core::redir("index.php?view=administrador");

?>
