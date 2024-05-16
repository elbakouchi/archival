<?php
class CarpetaArchivoData {
	public static $tablename = "carpetaarchivo";

	public function getCarrpeta(){ return CarpetaData::getById($this->carpeta_id); }
	public function getDocumento(){ return DocumentoData::getById($this->archivo_id); }

	public function si(){
		$sql = "insert into ".self::$tablename." (archivo_id,carpeta_id) ";
		$sql .= "value (\"$this->archivo_id\",$this->carpeta_id)";
		return Executor::doit($sql);
	}

	public function registro_peridocarpeta(){
		$sql = "insert into ".self::$tablename." (periodo_id) ";
		$sql .= "value ($this->periodo_id)";
		return Executor::doit($sql);
	}
	public function add(){
		$sql = "insert into periodocarpeta (carpeta_id) ";
		$sql .= "value (\"$this->carpeta_id\")";
		Executor::doit($sql);
	}
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where archivo_id=$this->archivo_id and carpeta_id=$this->carpeta_id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto AlumnTeamData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id_periodocarpeta){
		$sql = "select * from ".self::$tablename." where id_periodocarpeta=$id_periodocarpeta";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PeriodoCarpetaData());
	}


	public static function getByAT($a,$t){
		$sql = "select * from ".self::$tablename." where alumn_id=$a and team_id=$t";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PeriodoCarpetaData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new PeriodoCarpetaData());

	}

		public static function getAllByTeamId($id_carpeta){
		$sql = "select * from ".self::$tablename." where carpeta_id=$id_carpeta";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CarpetaArchivoData());
	}

		public static function getAllByAlumnId($id_archivo){
		$sql = "select * from ".self::$tablename." where archivo_id=$id_archivo";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CarpetaArchivoData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PeriodoCarpetaData());
	}


}

?>