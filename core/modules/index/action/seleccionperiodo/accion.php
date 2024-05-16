<?php

if(isset($_GET["id_periodo"]) && $_GET["id_periodo"]!=""){
	$_SESSION["selected_id"]= $_GET["id_periodo"];
	Core::redir("./?view=periodo&id_periodo=".$_GET["id_periodo"]);
}

?>