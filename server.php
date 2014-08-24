<?php
//include('libreria/engine.php');

class Servidor{

	function tablaDatos($tabla, $metodo, $id){
		$sql = "select * from ".$tabla;
		$dt = new dataTable($sql);
		$grid= new dataGrid($dt);
		$grid->setRowAction('onclick',$metodo, array($id));
		$grid->display();

	}

}

?>