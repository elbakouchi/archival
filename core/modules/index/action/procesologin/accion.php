<?php
if(!isset($_SESSION["admin_id"])) {
$user = $_POST['email'];
$pass = sha1(md5($_POST['password']));

$base = new Database();
$con = $base->connect();
$sql = "select * from usuario where (email= \"".$user."\" or usuario= \"".$user."\") and password= \"".$pass."\" and activo=1";
//print $sql;
$query = $con->query($sql);
$found = false;
$userid = null;
while($r = $query->fetch_array()){
	$found = true ;
	$userid = $r['id_usuario'];
}

if($found==true) {
//	session_start();
//	print $userid;
	$_SESSION['admin_id']=$userid ;
	setcookie('userid',$userid);
	// print $_SESSION['userid'];
	print "Cargando ... $user";
	Core::Alert("Accès autorisé");
	print "<script>window.location='index.php?view=home';</script>";
}else {
	Core::Alert("Usuario o Password Incorrecta....!!");
	print "<script>window.location='index.php?view=index';</script>";
}

}else{
	print "<script>window.location='index.php?view=home';</script>";	
}
?>