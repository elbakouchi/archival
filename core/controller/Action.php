<?php


// 12 de Octubre del 2014
// Action.php
// @brief Un action corresponde a una rutina de un modulo.

class Action {
	/**
	* @function load
	* @brief la funcion load carga una vista correspondiente a un modulo
	**/	
	public static function load($action){
		// Module::$module;
		
		if(!isset($_GET['action'])){
			include "core/modules/".Module::$module."/action/".$action."/accion.php";
		}else{


			if(Action::isValid()){
				include "core/modules/".Module::$module."/action/".$_GET['action']."/accion.php";
			}else{
				Action::Error("<b>404 NOT FOUND</b> Action <b>".$_GET['action']."</b> folder  !!");
			}



		}
	}

	/**
	* @function isValid
	* @brief valida la existencia de una vista
	**/	
	public static function isValid(){
		$valid=false;
		if(file_exists($file = "core/modules/".Module::$module."/action/".$_GET['action']."/accion.php")){
			$valid = true;
		}
		return $valid;
	}

	public static function Error($message){
		print $message;
	}

	public static function execute($action,$params){
		$fullpath =  "core/modules/".Module::$module."/action/".$action."/accion.php";
		if(file_exists($fullpath)){
			include $fullpath;
		}else{
			assert("wtf");
		}
	}

}



?>