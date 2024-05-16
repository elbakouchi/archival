<?php

if(isset($_GET["id_area_oficina"]) && $_GET["id_area_oficina"]!=""){
	$_SESSION["id_area_oficina"]= $_GET["id_area_oficina"];
	Core::redir("./?view=carpetas&id_area_oficina=".$_GET["id_area_oficina"]);
}

?>