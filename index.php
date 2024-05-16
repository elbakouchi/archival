<?php
// permite a iniciar la aplicacion 
include "core/autoload.php";
ob_start();
session_start();
$lb = new Lb();
$lb->loadModule("index");
?>