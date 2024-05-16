<?php
// print_r($_POST);
$pagina =  new OrganizacionData();
foreach ($_POST as $k => $v) {
  $pagina->$k = $v;
}

////////////////////////////////////// / / / / / / / / / / / / / / / / / / / / / / / / /
///
  if($_POST["usuario_id"]!=""){
    $pagina->usuario_id = $_POST["usuario_id"];
    $pagina->actualizar_personal();
  }
  if(isset($_FILES["logo"])){
    $logo = new Upload($_FILES["logo"]);
    if($logo->uploaded){
      $logo->Process("storage/sis/admin/");
      if($logo->processed){
        $pagina->logo = $logo->file_dst_name;
        $pagina->actualizar_logo();
      }
    }
  }
  if(isset($_FILES["imagen"])){
    $imagen = new Upload($_FILES["imagen"]);
    if($imagen->uploaded){
      $imagen->Process("storage/sis/admin/");
      if($imagen->processed){
        $pagina->imagen = $imagen->file_dst_name;
        $pagina->actualizar_image();
      }
    }
  }

 $pagina->actualizar();
$_SESSION["actualizar_configuracion"]= 1;
Core::alert("Configuración Actualizada.....!");
Core::redir("index.php?view=configuracion&id_institucion=".$_POST["id_institucion"]);

?>