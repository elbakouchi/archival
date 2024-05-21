<?php


// 13 de Octubre del 2014
// Request.php
// @brief esto es algo mucho mas magico

class Request {
	function __get($value){
		if(!$this->exist($value)){
			print "<b>ERREUR DE REQUÊTE</b> Le paramètre <b>$value</b> que vous essayez d'appeler n'existe pas !";
			die();
		}
		return $_REQUEST[$value];
	}

	function  exist($value){
		$found = false;
		if(isset($_REQUEST[$value])){
			$found=true;
		}
		return $found;
	}
}



?>