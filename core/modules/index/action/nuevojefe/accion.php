<?php
// print_r($_POST);
$jefe =  new JefeData();
foreach ($_POST as $k => $v) {
	$jefe->$k = $v;
	# code...
}
$jefe->password = sha1(md5($_POST["password"]));
$jefe->Nuevo_Jefe();

Core::redir("index.php?view=jefes");

?>