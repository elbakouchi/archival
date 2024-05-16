<?php
class AreaOficinaData {
	public static $tablename = "area_oficina";

	public function getCarrpeta(){ return CarpetaData::getById($this->carpeta_id); }
	public function getDocumento(){ return DocumentoData::getById($this->archivo_id); }

	public function registro_nueva_areaoficina(){
		$sql = "insert into ".self::$tablename." (nombre,detalle,activo) ";
		$sql .= "value (\"$this->nombre\",\"$this->detalle\",1)";
		return Executor::doit($sql);
	}
	public function Actualizacion_AreOficina(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",detalle=\"$this->detalle\",activo=\"$this->activo\" where id_area_oficina=$this->id_area_oficina";
		Executor::doit($sql);
	}
// partiendo de que ya tenemos creado un objecto AlumnTeamData previamente utilizamos el contexto

	public static function getById($id_area_oficina){
		$sql = "select * from ".self::$tablename." where id_area_oficina=$id_area_oficina order by nombre asc";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AreaOficinaData());
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id_area_oficina=$this->id_area_oficina";
		Executor::doit($sql);
	}
	public static function getByAT($a,$t){
		$sql = "select * from ".self::$tablename." where alumn_id=$a and team_id=$t";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AreaOficinaData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id_area_oficina desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AreaOficinaData());

	}

		public static function getAllByTeamId($id_carpeta){
		$sql = "select * from ".self::$tablename." where carpeta_id=$id_carpeta";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AreaOficinaData());
	}

		public static function getAllByAlumnId($id_carpeta){
		$sql = "select * from ".self::$tablename." where carpeta_id=$id_carpeta";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AreaOficinaData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AreaOficinaData());
	}


}

?>