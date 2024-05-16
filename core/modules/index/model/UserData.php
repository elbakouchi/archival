<?php
class UserData {
	public static $tablename = "usuario";

	public function getAreaOficina(){ return AreaOficinaData::getById($this->area_oficina_id); }
	public  function createForm(){
		$form = new lbForm();
	    $form->addField("nombre",array('type' => new lbInputText(array("label"=>"Nombre")),"validate"=>new lbValidator(array())));
	    $form->addField("apellido",array('type' => new lbInputText(array("label"=>"Apellido")),"validate"=>new lbValidator(array())));
	    $form->addField("email",array('type' => new lbInputText(array()),"validate"=>new lbValidator(array())));
	    $form->addField("password",array('type' => new lbInputPassword(array()),"validate"=>new lbValidator(array())));
	    return $form;

	}

	public function Userdata(){
		$this->nombre = "";
		$this->apellido = "";
		$this->email = "";
		$this->password = "";
		$this->fecha_registro = "NOW()";
	}

	public function Nuevo_Administrador(){
		$sql = "insert into usuario (nombre,apellido,dni,telefono,email,usuario,password,admin,fecha) ";
		$sql .= "value (\"$this->nombre\",\"$this->apellido\",\"$this->dni\",\"$this->telefono\",\"$this->email\",\"$this->usuario\",\"$this->password\",1,NOW())";
		Executor::doit($sql);
	}
	
	public function add_with_image(){
		$sql = "insert into ".self::$tablename." (nombre,apellido,dni,celular,direccion,user,email,nivel,is_admin,password,imagen,fecha_registro) ";
		$sql .= "value (\"$this->nombre\",\"$this->apellido\",\"$this->dni\",\"$this->celular\",\"$this->direccion\",\"$this->user\",\"$this->email\",\"$this->nivel\",\"$this->is_admin\",\"$this->password\",\"$this->imagen\",NOW())";
		return Executor::doit($sql);
	}
	public function add_imagen_personal(){
		$sql = "insert into ".self::$tablename." (nombre,apellido,dni,celular,direccion,email,nivel,imagen,fecha_registro) ";
		$sql .= "value (\"$this->nombre\",\"$this->apellido\",\"$this->dni\",\"$this->celular\",\"$this->direccion\",\"$this->email\",\"$this->nivel\",\"$this->imagen\",NOW())";
		return Executor::doit($sql);
	}
	// Actualizacion
	public function actualizar_pivilegio(){
		$sql = "update ".self::$tablename." set activo=\"$this->activo\",admin=\"$this->admin\",publico=\"$this->publico\" where id_usuario=$this->id_usuario";
		Executor::doit($sql);
	}
	public function actualizar(){
		$sql = "update ".self::$tablename." set usuario=\"$this->usuario\" where id_usuario=$this->id_usuario";
		Executor::doit($sql);
	}
	public function update_password(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id_usuario=$this->id_usuario";
		Executor::doit($sql);
	}
	public function actulizar_datos(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",apellido=\"$this->apellido\",dni=\"$this->dni\",telefono=\"$this->telefono\",email=\"$this->email\",sexo=\"$this->sexo\" where id_usuario=$this->id_usuario";
		Executor::doit($sql);
	}
	public function actualizar_imagen(){
		$sql = "update ".self::$tablename." set imagen=\"$this->imagen\" where id_usuario=$this->id_usuario";
		Executor::doit($sql);
	}
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function eliminar(){
		$sql = "delete from ".self::$tablename." where id_usuario=$this->id_usuario";
		Executor::doit($sql);
	}
	public static function getByIddd($id_usuario){
		$sql = "select * from ".self::$tablename." where id_usuario=$id_usuario";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Userdata());
	}
	public function del_eliminarr(){
		$sql = "delete from ".self::$tablename." where id_usuario=$this->id_usuario";
		Executor::doit($sql);
	}
public static function getEliminarrr($id_usuario){
		$sql = "select * from ".self::$tablename." where id_usuario=$id_usuario";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Userdata());
	}
	public function del_personal(){
		$sql = "delete from ".self::$tablename." where id_usuario=$this->id_usuario";
		Executor::doit($sql);
	}
public static function getEliminarPersonal($id_usuario){
		$sql = "select * from ".self::$tablename." where id_usuario=$id_usuario";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Userdata());
	}
	public static function getAllByDateOfficial($start,$end){
 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" order by fecha desc";
		if($start == $end){
		 $sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" order by fecha desc";
		}
		$query = Executor::doit($sql);
		return Model::many($query[0],new Userdata());
	}

	public static function getAllByDateOfficialBP($usuario, $start,$end){
 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and id_usuario=$usuario order by fecha desc";
		if($start == $end){
		 $sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" order by fecha desc";
		}
		$query = Executor::doit($sql);
		return Model::many($query[0],new Userdata());
	}
// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",apellido=\"$this->apellido\",dni=\"$this->dni\",celular=\"$this->celular\",direccion=\"$this->direccion\",email=\"$this->email\",nivel=\"$this->nivel\",is_admin=$this->is_admin,is_active=$this->is_active where id_usuario=$this->id_usuario";
		Executor::doit($sql);
	}
	public function update_personal(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",apellido=\"$this->apellido\",dni=\"$this->dni\",celular=\"$this->celular\",direccion=\"$this->direccion\",email=\"$this->email\",nivel=\"$this->nivel\",is_active=$this->is_active where id_usuario=$this->id_usuario";
		Executor::doit($sql);
	}
	public function update_image(){
		$sql = "update ".self::$tablename." set imagen=\"$this->imagen\" where id_usuario=$this->id_usuario";
		Executor::doit($sql);
	}

	public function update_contraseña(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id_usuario=$this->id_usuario";
		Executor::doit($sql);
	}
	public function update_usuario(){
		$sql = "update ".self::$tablename." set user=\"$this->user\" where id_usuario=$this->id_usuario";
		Executor::doit($sql);
	}
	public static function getAdministrador(){
		$sql = "select * from ".self::$tablename." where admin=1 order by fecha asc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}
	public static function getempleado(){
		$sql = "select * from ".self::$tablename." where admin=0 order by nombre,apellido";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getById($id_usuario){
		$sql = "select * from ".self::$tablename." where id_usuario=$id_usuario";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}
	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getBDni($dni){
		$sql = "select * from ".self::$tablename." where dni=\"$dni\"";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new UserData();
			$array[$cnt]->dni = $r['dni'];
			$cnt++;
		}
		return $array;
	}
	public static function getAlll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}
	public static function getAl($id){
		$sql = "select * from ".self::$tablename." where id_usuario=$id_usuario";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}
	public static function getLike($p){
		$sql = "select * from ".self::$tablename." where dni like '%$p%' or nombre like '%$p%' or id_usuario like '%$p%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}
	public static function getDELById($id_usuario){
		$sql = "select * from ".self::$tablename." where id_usuario=$id_usuario";
		$query = Executor::doit($sql);
		$found = null;
		$data = new UserData();
		while($r = $query[0]->fetch_array()){
			$data->id_usuario = $r['id_usuario'];
			$found = $data;
			break;
		}
		return $found;
	}
	// --------------------------------REPORTE JEFE
		public static function getAllByJefe($start,$end){
		 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and jefe=1  order by fecha desc";
				if($start == $end){
				 $sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" and jefe=1  order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new Userdata());
	}

		public static function getAllByDateJefe($archivo, $start,$end){
		 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and id_usuario=$achivo and jefe=1 order by fecha desc";
				if($start == $end){
				 $sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" and jefe=1  order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new Userdata());
	}
	// --------------------------------REPORTE ENCARGADO
		public static function getAllByEncargado($start,$end){
		 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and encargado=1  order by fecha desc";
				if($start == $end){
				 $sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" and encargado=1  order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new Userdata());
	}

		public static function getAllByDateEncargado($archivo, $start,$end){
		 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and id_usuario=$achivo and encargado=1 order by fecha desc";
				if($start == $end){
				 $sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" and encargado=1  order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new Userdata());
	}
	// --------------------------------REPORTE Administrador
		public static function getAllByAdmin($start,$end){
		 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and admin=1 order by fecha desc";
				if($start == $end){
				 $sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" and admin=1 order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new Userdata());
	}

		public static function getAllByDateAdmin($archivo, $start,$end){
		 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and id_archivo=$achivo and admin=1 order by fecha desc";
				if($start == $end){
				 $sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" and admin=1 order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new Userdata());
	}
}

?> 



