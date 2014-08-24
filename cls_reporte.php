<?php 

include('conexion.php');


class Reporte{

	static function TotalidadCasos(){

		$sql = "select count(id_casos) as totalidad FROM casos";

		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;

	}


	 static function listaProvincia(){

		$sql = "select nombre_provincia from provincias";

		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;

	}

	static function listaCasos($provincia){

		$sql = "select * from casos where provincia ='{$provincia}'";
		//echo $sql;
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;
	}
	static function totalCasos($provincia)
	{
		//$data = array();
		$sql = "select count(id_casos) as cantidad FROM casos where provincia='{$provincia}'";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		//$fila = mysqli_fetch_assoc($rs);
		return $rs;
	}
	
	static function listaTsangre(){

		$sql = "select sangre from tipo_sangre";

		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;

	}		

	static function listaCasosSangre($sangre){

		$sql = "select * from casos where tipo_sangre ='{$sangre}'";
		//echo $sql;
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;
	}
	static function totalCasosSangre($sangre)
	{
		//$data = array();
		$sql = "select count(id_casos) as cantidad FROM casos where tipo_sangre='{$sangre}'";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		//$fila = mysqli_fetch_assoc($rs);
		return $rs;
	}	

	static function listaSintomas(){

		$sql = "select sintoma from sintomas";

		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;

	}		

	static function listaCasosSintoma(){

		$sql = "select * from casos ";
		//echo $sql;
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;
	}
	static function totalCasosSintoma($sintoma)
	{
		//$data = array();
		$sql = "SELECT count(id_detalle) as cantidad FROM  sintomas_detalle sd where sd.sintoma = '{$sintoma}';";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		//$fila = mysqli_fetch_assoc($rs);
		return $rs;
	}
	static function totalFinalSintoma()
	{
		//$data = array();
		$sql = "SELECT s.sintoma,count(id_sintoma) as totalidad FROM sintomas s, sintomas_detalle sd where s.sintoma = sd.sintoma;";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		//$fila = mysqli_fetch_assoc($rs);
		return $rs;
	}

	static function listaZodiaco(){

		$sql = "select * from zodiaco";

		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;

	}		

	static function listaCasosZodiaco($inicio,$final){

		$sql = "select * from casos where fecha_nacimiento BETWEEN '{$inicio}' AND '{$final}' ";
		//echo $sql;
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;
	}
	static function totalCasosZodiaco($inicio,$final)
	{
		//$data = array();
		$sql = "select count(id_casos) as cantidad FROM casos where fecha_nacimiento BETWEEN '{$inicio}' AND '{$final}'";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		//$fila = mysqli_fetch_assoc($rs);
		return $rs;
	}


}


?>