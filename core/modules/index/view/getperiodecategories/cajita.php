<?php

$id_periodo =  $_GET["id_periodo"];
$sql = "select * from carpeta where periodo_id=$id_periodo";
$query = Executor::doit($sql);
return Json::load($query);
?>