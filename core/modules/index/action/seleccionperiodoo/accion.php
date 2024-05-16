<?php

if(isset($_GET["id_periodo"]) && $_GET["id_periodo"]!=""){
	$_SESSION["selected_id"]= $_GET["id_periodo"];
	Core::alert("Periodo Seleccionado de manera Correcta");
	Core::redir("./?view=periodos&id_periodo=".$_GET["id_periodo"]);
}

?>