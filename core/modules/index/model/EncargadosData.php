<?php
class EncargadosData {
	public static $tablename = "usuario";


	public function EncargadosData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->link = "";
		$this->category_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function getUnit(){ return UnitData::getById($this->unit_id);}

	public function Nuevo_Encargado(){
		$sql = "insert into usuario (nombre,apellido,dni,telefono,email,usuario,password,encargado,fecha) ";
		$sql .= "value (\"$this->nombre\",\"$this->apellido\",\"$this->dni\",\"$this->telefono\",\"$this->email\",\"$this->usuario\",\"$this->password\",1,NOW())";
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
	public function update(){
		$sql = "update ".self::$tablename." set code=\"$this->code\",name=\"$this->name\",description=\"$this->description\",link=\"$this->link\",price=\"$this->price\",in_existence=\"$this->in_existence\",is_public=\"$this->is_public\",is_featured=\"$this->is_featured\",unit_id=\"$this->unit_id\",category_id=\"$this->category_id\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_image(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id_usuario){
		$sql = "select * from ".self::$tablename." where id_usuario=$id_usuario";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EncargadosData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by fecha asc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
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
	public static function VerEncargado(){
		$sql = "select * from ".self::$tablename." where admin=0 and jefe=0 order by nombre,apellido";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EncargadosData());
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