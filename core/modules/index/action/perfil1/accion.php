<?php

if(isset($_SESSION["admin_id"])){
  $user = UserData::getById($_SESSION["admin_id"]);
  // $user->imagen = $_POST["imagen"];
  if(isset($_FILES["imagen"])){
    $imagen = new Upload($_FILES["imagen"]);
    if($imagen->uploaded){
      // $imagen->Process("admin/storage/personal/pagina/");
      $imagen->Process("storage/personal/admin/");
      if($imagen->processed){
        $user->imagen = $imagen->file_dst_name;
        $user->actualizar_imagen();

      }
    }
  }
  setcookie("password_updated","true");
  print "<script>alert('Imagen Actualizado');window.location='index.php?view=perfil';</script>";

}else {
    print "<script>window.location='index.php';</script>";
}
?>