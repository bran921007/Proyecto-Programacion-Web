<?php 

include('conexion.php');

class Reporte{


	 static function listaProvincia(){

		$sql = "select nombre_provincia from provincia";

		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;

	}

	static function listaCasos($provincia){

		$sql = "select * from casos where provincia ='{$provincia}'";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;
	}
	static function total($provincia)
	{
		$sql = "select count(id_casos) as cantidad FROM casos where provincia='{$provincia}'";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;
	}
			

}


?>