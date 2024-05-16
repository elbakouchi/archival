<!-- ConfigData -->
<?php
class OrganizacionData {
	public static $tablename = "institucion";

	public function OrganizacionData(){
		$this->nombre = "";
		$this->descripcion = "";
		$this->direccion = "";
		$this->gerente = "";
		$this->imagen = "";
		$this->texto1 = "";
		$this->carrucel1 = "";
	}
	public static function getById($id_institucion){
		$sql = "select * from ".self::$tablename." where id_institucion=$id_institucion";
		$query = Executor::doit($sql);
		return Model::one($query[0],new OrganizacionData());
	}
	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new OrganizacionData());
	}
	public function actualizar(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",direccion=\"$this->direccion\",telefono=\"$this->telefono\",texto1=\"$this->texto1\",texto2=\"$this->texto2\",texto3=\"$this->texto3\",texto4=\"$this->texto4\",texto5=\"$this->texto5\",texto6=\"$this->texto6\",red_social1=\"$this->red_social1\",red_social2=\"$this->red_social2\",red_social3=\"$this->red_social3\",red_social4=\"$this->red_social4\",red_social5=\"$this->red_social5\",red_social6=\"$this->red_social6\",footer1=\"$this->footer1\",footer2=\"$this->footer2\",footer3=\"$this->footer3\",gerente=\"$this->gerente\" where id_institucion=$this->id_institucion";
		return Executor::doit($sql);
	}

	public function actualizar_image(){
		$sql = "update ".self::$tablename." set imagen=\"$this->imagen\" where id_institucion=$this->id_institucion";
		Executor::doit($sql);
	}
	public function actualizar_logo(){
		$sql = "update ".self::$tablename." set logo=\"$this->logo\" where id_institucion=$this->id_institucion";
		Executor::doit($sql);
	}
	public function actualizar_personal(){
		$sql = "update ".self::$tablename." set usuario_id=\"$this->usuario_id\" where id_institucion=$this->id_institucion";
		Executor::doit($sql);
	}
	public function actualizar_cliente(){
		$sql = "update ".self::$tablename." set cliente_id=\"$this->cliente_id\" where id_institucion=$this->id_institucion";
		Executor::doit($sql);
	}
}

?>