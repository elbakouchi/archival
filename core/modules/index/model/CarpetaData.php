<?php
class CarpetaData {
	public static $tablename = "carpeta";


	public function CarpetaData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->link = "";
		$this->category_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function getUnit(){ return UnitData::getById($this->unit_id);}
	public function getUsuario(){ return UserData::getById($this->usuario_id);}
	// public function registro_nueva_carpeta(){
	// 	$sql = "insert into ".self::$tablename." (nombre,descripcion,periodo_id,fecha) ";
	// 	$sql .= "value (\"$this->nombre\",\"$this->descripcion\",$this->periodo_id,NOW())";
	// 	Executor::doit($sql);
	// }
	public function registro_nueva_carpeta(){
		$sql = "insert into ".self::$tablename." (nombre,codigo,estante,modulo,descripcion,usuario_id,fecha) ";
		$sql .= "value (\"$this->nombre\",\"$this->codigo\",\"$this->estante\",\"$this->modulo\",\"$this->descripcion\",$this->usuario_id,NOW())";
		return Executor::doit($sql);
	}
	// public function registro_nueva_carpeta(){
	// 	$sql = "insert into ".self::$tablename." (nombre,descripcion,fecha) ";
	// 	$sql .= "value (\"$this->nombre\",\"$this->descripcion\",NOW())";
	// 	Executor::doit($sql);
	// }
	public function Actualizacion_Carpeta(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",codigo=\"$this->codigo\",estante=\"$this->estante\",modulo=\"$this->modulo\",descripcion=\"$this->descripcion\",usuario_id=\"$this->usuario_id\" where id_carpeta=$this->id_carpeta";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id_carpeta=$this->id_carpeta";
		Executor::doit($sql);
	}
	public function eliminar_Carpeta(){
		$sql = "delete from ".self::$tablename." where id_carpeta=$this->id_carpeta";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ProductData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set code=\"$this->code\",name=\"$this->name\",description=\"$this->description\",link=\"$this->link\",price=\"$this->price\",in_existence=\"$this->in_existence\",is_public=\"$this->is_public\",is_featured=\"$this->is_featured\",unit_id=\"$this->unit_id\",category_id=\"$this->category_id\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_image(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id_carpeta){
		$sql = "select * from ".self::$tablename." where id_carpeta=$id_carpeta order by id_carpeta asc";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CarpetaData());
	}
	public static function activocarpeta($id_carpeta,$id_usuario){
		$sql = "select * from ".self::$tablename." where id_carpeta=$id_carpeta and usuario_id=$id_usuario";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CarpetaData());
	}
	public static function ver($id_carpeta){
		$sql = "select * from ".self::$tablename." where id_carpeta=$id_carpeta order by id_carpeta asc";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CarpetaData());
	}

	public static function getByIdd($id_carpeta,$id_usuario){
		$sql = "select * from ".self::$tablename." where id_carpeta=$id_carpeta and usuario_id=$id_usuario";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CarpetaData());
	}
	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by fecha asc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CarpetaData());
	}

	public static function getPublicsByCategoryId($id){
		$sql = "select * from ".self::$tablename." where category_id=$id and is_public=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function get4News(){
		$sql = "select * from ".self::$tablename." where is_new=1 and is_public=1 order by created_at desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function get4Offers(){
		$sql = "select * from ".self::$tablename." where is_offer=1 and is_public=1 order by created_at desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getNews(){
		$sql = "select * from ".self::$tablename." where is_new=1 and is_public=1 order by created_at desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getFeatureds(){
		$sql = "select * from ".self::$tablename." where is_featured=1 and is_public=1 order by created_at desc limit 6";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%' or description like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getCarpeta($id_periodo){
		$sql = "select * from ".self::$tablename." where periodo_id=$id_periodo";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CarpetaData());
	}
	public static function VerCarpeta($periodo_id){
		$sql = "select * from ".self::$tablename." where id_carpeta=$periodo_id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CarpetaData());
	}
	public static function getBNombre($nombre){
		$sql = "select * from ".self::$tablename." where nombre=\"$nombre\"";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new CarpetaData();
			$array[$cnt]->nombre = $r['nombre'];
			$cnt++;
		}
		return $array;
	}

}

?>