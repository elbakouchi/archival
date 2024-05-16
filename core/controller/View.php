<?php


// 13 de Abril del 2014
// View.php
// @brief Una vista corresponde a cada componente visual dentro de un modulo.

class View {
	/**
	* @function load
	* @brief la funcion load carga una vista correspondiente a un modulo
	**/	
	public static function load($view){
		// Module::$module;
		if(!isset($_GET['view'])){
			include "core/modules/".Module::$module."/view/".$view."/cajita.php";
		}else{


			if(View::isValid()){
				include "core/modules/".Module::$module."/view/".$_GET['view']."/cajita.php";				
			}else{
				View::Error("<center><b>Informe de Javier </b>,  Formulario <b>".$_GET['view']."</b> no encontrada   !!</center>");
				echo "<center><br> por favor vuelva a intentarlo mas tarde</center>";
			}


		}
	}

	/**
	* @function isValid
	* @brief valida la existencia de una vista
	**/	
	public static function isValid(){
		$valid=false;
		if(isset($_GET["view"])){
			if(file_exists($file = "core/modules/".Module::$module."/view/".$_GET['view']."/cajita.php")){
				$valid = true;
			}
		}
		return $valid;
	}

	public static function Error($message){
		print $message;
	}

}



?>