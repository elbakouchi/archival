<?php
class PeriodoData {
	public static $tablename = "periodo";


	public function PeriodoData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->link = "";
		$this->category_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function getUnit(){ return UnitData::getById($this->unit_id);}

	public function registro_nuevo_periodo(){
		$sql = "insert into ".self::$tablename." (nombre,descripcion,activo,usuario_id,fecha) ";
		$sql .= "value (\"$this->nombre\",\"$this->descripcion\",$this->activo,$this->usuario_id,NOW())";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ProductData previamente utilizamos el contexto
	public function actualizar_periodo(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",descripcion=\"$this->descripcion\" where id_periodo=$this->id_periodo";
		Executor::doit($sql);
	}

	public function update_image(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id_periodo){
		$sql = "select * from ".self::$tablename." where id_periodo=$id_periodo";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PeriodoData());
	}

	public static function getByIdAsJson($id_periodo){
		$sql = "select * from ".self::$tablename." where id_periodo=$id_periodo";
		$query = Executor::doit($sql);
		return Model::json($query[0], new PeriodoData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by fecha asc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PeriodoData());
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
	public static function activoperiodo($id_usuario){
		$sql = "select * from ".self::$tablename." where usuario_id=$id_usuario and activo=1 order by id_periodo desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PeriodoData());
	}
	public static function getBNombre($nombre){
		$sql = "select * from ".self::$tablename." where nombre=\"$nombre\"";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new PeriodoData();
			$array[$cnt]->nombre = $r['nombre'];
			$cnt++;
		}
		return $array;
	}

}

?>