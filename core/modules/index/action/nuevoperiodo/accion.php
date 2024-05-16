<?php
$c= PeriodoData::getBNombre($_POST["nombre"]);
// if(count($_POST)>0){
  if($c==null){
if(count($_POST)>0){
    $user = new PeriodoData();
    $user->nombre = $_POST["nombre"];
    $user->descripcion = $_POST["descripcion"];
    $user->activo = isset($_POST["activo"]) ? 1 :0;
    $user->usuario_id = $_SESSION["admin_id"];
    
    $user->registro_nuevo_periodo();

print "<script>window.location='index.php?view=home';</script>";
    }
}
else{
Core::alert("Este Periodo Ya existe Pendejo...!");
Core::redir("index.php?view=home");
}


?>