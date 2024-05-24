<?php
class DocumentoData {
	public static $tablename = "archivo";

	public function getUsuario(){ return UserData::getById($this->usuario_id); }
	public function DocumentoData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->link = "";
		$this->category_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function registro_nuevo_documento(){
		$sql = "insert into ".self::$tablename." (nombre_documento,folio,responsable,descripcion,otros,ubicacion,usuario_id,activo,fecha) ";
		$sql .= "value (\"$this->nombre_documento\",\"$this->folio\",\"$this->responsable\",\"$this->descripcion\",\"$this->otros\",\"$this->ubicacion\",$this->usuario_id,1,NOW())";
		return Executor::doit($sql);
	}
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id_archivo=$id_archivo";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id_archivo=$this->id_archivo";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ProductData previamente utilizamos el contexto
	public function Actualizacion_Documento(){
		$sql = "update ".self::$tablename." set nombre_documento=\"$this->nombre_documento\",folio=\"$this->folio\",responsable=\"$this->responsable\",descripcion=\"$this->descripcion\",ubicacion=\"$this->ubicacion\",usuario_id=\"$this->usuario_id\",publico=\"$this->publico\",activo=\"$this->activo\",perdido=\"$this->perdido\" where id_archivo=$this->id_archivo";
		Executor::doit($sql);
	}

	public function update_image(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id_archivo){
		$sql = "select * from ".self::$tablename." where id_archivo=$id_archivo";
		$query = Executor::doit($sql);
		return Model::one($query[0],new DocumentoData());
	}

	public static function getLast10(){
		$sql = "select * from ".self::$tablename." order by fecha desc limit 10";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DocumentoData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by fecha asc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DocumentoData());
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
	///------------------------------NON ACTIV
	public static function getNonActiveByDateOfficial($start,$end){
		 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and activo = 0 order by fecha desc";
				if($start == $end){
				 $sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" and activo=0 order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new DocumentoData());
	}


	public static function getNonActiveByDateAndCarpeta($carpeta_id, $start, $end){
		$sql = "select a.* from ".self::$tablename." a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE c.carpeta_id = ".$carpeta_id." and  date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and activo = 0 order by fecha desc";
				if($start == $end){
				 $sql = "select a.* from ".self::$tablename." a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE c.carpeta_id = ".$carpeta_id." and date(fecha) = \"$start\" and activo=0 order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new DocumentoData());
	
	}
	// --------------------------------REPORTE DOCUMENTOS ACTIVOS
	public static function getActiveByDateOfficial($start,$end){
		 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and activo = 1 order by fecha desc";
				if($start == $end){
				 $sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" and activo=1 order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new DocumentoData());
	}


	public static function getActiveByDateAndCarpeta($carpeta_id, $start, $end){
		$sql = "select a.* from ".self::$tablename." a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE c.carpeta_id = ".$carpeta_id." and  date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and activo = 1 order by fecha desc";
				if($start == $end){
				 $sql = "select a.* from ".self::$tablename." a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE c.carpeta_id = ".$carpeta_id." and date(fecha) = \"$start\" and activo=1 order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new DocumentoData());
	
	}

	public static function getActiveByDateOfficialBP($archivo, $start,$end){
		$sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and id_archivo=$achivo and activo=1 order by fecha desc";
			if($start == $end){
				$sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" and activo=1 order by fecha desc";
			}
				$query = Executor::doit($sql);
				return Model::many($query[0],new DocumentoData());
	}


	public static function getAllByDateAndCarpeta($carpeta_id, $start, $end){
		$sql = "select a.* from ".self::$tablename." a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE c.carpeta_id = ".$carpeta_id." and  date(fecha) >= \"$start\" and date(fecha) <= \"$end\" order by fecha desc";
				if($start == $end){
				 $sql = "select a.* from ".self::$tablename." a INNER JOIN carpetaarchivo c ON a.id_archivo = c.archivo_id WHERE c.carpeta_id = ".$carpeta_id." and date(fecha) = \"$start\" and activo=1 order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new DocumentoData());
	
	}

	public static function getAllByDateOfficialBP($archivo, $start,$end){
		$sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and id_archivo=$achivo order by fecha desc";
			if($start == $end){
				$sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" order by fecha desc";
			}
				$query = Executor::doit($sql);
				return Model::many($query[0],new DocumentoData());
	}
	// --------------------------------REPORTE DOCUMENTOS NO ACTIVOS
		public static function getAllByDateOfficiall($start,$end){
		 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and activo=0 and perdido=0 order by fecha desc";
				if($start == $end){
				 $sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" and activo=0 and perdido=0 order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new DocumentoData());
	}

		public static function getAllByDateOfficialBPp($archivo, $start,$end){
		 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and id_archivo=$achivo and activo=0 and perdido=0 order by fecha desc";
				if($start == $end){
				 $sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" and activo=0 and perdido=0 order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new DocumentoData());
	}
	// --------------------------------REPORTE DOCUMENTOS EN GENERAL
	public static function getAllByDateOfficialll($start,$end){
		 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" order by fecha desc";
				if($start == $end){
				 $sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new DocumentoData());
	}

		public static function getAllByDateOfficialBPpp($archivo, $start,$end){
		 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and id_archivo=$achivo order by fecha desc";
				if($start == $end){
				 $sql = "select * from ".self::$tablename." where date(fecha) = \"$start\"  order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new DocumentoData());
	}
	// --------------------------------REPORTE DOCUMENTOS  PERDIDOS
		public static function getAllByDateOfficiallj($start,$end){
		 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and perdido=1 order by fecha desc";
				if($start == $end){
				 $sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" and perdido=1 order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new DocumentoData());
	}

	public static function getAllByDateOfficialBPpj($archivo, $start,$end){
		 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and id_archivo=$archivo and perdido=1 order by fecha desc";
				if($start == $end){
				 $sql = "select * from ".self::$tablename." where date(fecha) = \"$start\" and perdido=1 order by fecha desc";
				}
				$query = Executor::doit($sql);
				return Model::many($query[0],new DocumentoData());
	}
	/// ------get lost
	public static function getLost($archivo, $start, $end){
		if($archivo!=null){
			return self::getAllByDateOfficialBPpj($archivo, $start, $end);
		}else{
			return self::getAllByDateOfficiallj($start,$end);
		}
	}
}

?>