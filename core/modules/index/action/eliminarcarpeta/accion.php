<?php

$cat = CarpetaData::getById($_GET["id_carpeta"]);
$cat->eliminar_Carpeta();
Core::alert("Carpeta Eliminada con Éxito...!");
// print "<script>window.location='index.php?view=periodo&id_periodo=$_POST[periodo_id]';</script>";

?>