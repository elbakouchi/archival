<?php


// 13 de Octubre del 2014
// Session.php
// @brief esto es algo mucho mas magico

class Session {
	function __get($value){
		if(!$this->exist($value)){
			print "<b>SESSION ERROR</b> El parametro <b>$value</b> que intentas llamar no existe!";
			die();
		}
		return $_SESSION[$value];
	}

	function  exist($value){
		$found = false;
		if(isset($_SESSION[$value])){
			$found=true;
		}
		return $found;
	}
	function getUID(){
		if(!isset($_SESSION["admin_id"])){ return null; }
		return $_SESSION["admin_id"];
	}
	// 
	public static function setUID($uid){
		$_SESSION['admin_id'] = $uid;
	}

	public static function unsetUID(){
		if(isset($_SESSION['admin_id']))
			unset($_SESSION['admin_id']);
	}

	public static function issetUID(){
		if(isset($_SESSION['admin_id']))
			return true;
		else return false;
	}
}



?>