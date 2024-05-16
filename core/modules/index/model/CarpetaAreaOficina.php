<?php
class CarpetaAreaOficina {
	public static $tablename = "arecarpeta";
	public function getUsuario(){ return UserData::getById($this->usuario_id); }
	public function getCarrrpeta(){ return CarpetaData::ver($this->carpeta_id); }
	public function getCarrpeta(){ return CarpetaData::getById($this->carpeta_id); }
	public function getAreaOficina(){ return AreaOficinaData::getById($this->area_oficina_id); }

	public function si(){
		$sql = "insert into ".self::$tablename." (area_oficina_id,carpeta_id) ";
		$sql .= "value (\"$this->area_oficina_id\",$this->carpeta_id)";
		return Executor::doit($sql);
	}
// partiendo de que ya tenemos creado un objecto AlumnTeamData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}
	public static function getById($id_periodocarpeta){
		$sql = "select * from ".self::$tablename." where id_periodocarpeta=$id_periodocarpeta";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CarpetaAreaOficina());
	}
	public function eliminar(){
		$sql = "delete from ".self::$tablename." where area_oficina_id=$this->area_oficina_id and carpeta_id=$this->carpeta_id";
		Executor::doit($sql);
	}
	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new CarpetaAreaOficina());
	}
	public static function getAllByAlumnId($id_carpeta){
		$sql = "select * from ".self::$tablename." where carpeta_id=$id_carpeta";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CarpetaAreaOficina());
	}
		public static function getAllByTeamId($id_carpeta){
		$sql = "select * from ".self::$tablename." where carpeta_id=$id_carpeta";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CarpetaAreaOficina());
	}
	public static function getAllByCarpetaIdd($id_area_oficina,$id_usuario){
		$sql = "select * from ".self::$tablename." where area_oficina_id=$id_area_oficina and usuario_id=$id_usuario";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CarpetaAreaOficina());
	}
	public static function getAllByCarpetaId($id_area_oficina){
		$sql = "select * from ".self::$tablename." where area_oficina_id=$id_area_oficina";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CarpetaAreaOficina());
	}
}

?>