<?php
include('libreria/engine.php');
include('config/motor.php');
include('plantilla.php');

$provincias = new asgClass('provincias');

$sql = "select * from provincias";
$dt = new dataTable($sql);
$grid= new dataGrid($dt);
$grid->setRowAction('onclick','editarProvincia', array('id_provincia'));
//$grid->display();

$lat = 0;
$long = 0;
 
//$provincias->getText();
//$provincias->getPost();

if($_POST)
{
$provincias->id_provincia = (isset($_POST['txtId']))?$_POST['txtId']:$provincias->id;
$provincias->nombre_provincia = (isset($_POST['txtNombre']))?$_POST['txtNombre']:$provincias->nombre;
$direccion= urlencode($provincias->nombre_provincia);
 
//Buscamos la direccion en el servicio de google
$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$direccion.'&sensor=false');
 
 //decodificamos lo que devuelve google, que esta en formato json
  $output= json_decode($geocode);
 
//Extraemos la informacion que nos interesa
 $lat = $output->results[0]->geometry->location->lat;
$long = $output->results[0]->geometry->location->lng;
$provincias->latitud = $lat;
$provincias->longitud = $long;
		
$provincias->guardar();	

}
else if(isset($_GET['id'])){
	$provincias->id_provincia = $_GET['id'];

	$provincias->cargar();
}


//$servidor = new Servidor();


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
<form role="form" method='post' id='frmprovincias' action='modulos/sfsdfsdf/pagina.php'>
			<table>			
			
				<tr>
					
					
					<td>
						<input class="frm-asg" placeholder="" hidden type='text' name='txtId_provincia' id='txtId_provincia' value="<?php  echo htmlentities($provincias->id_provincia); ?>"  />
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Nombre provincia</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='text' name='txtNombre_provincia' id='txtNombre_provincia' value="<?php  echo htmlentities($provincias->nombre_provincia); ?>"  />
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Latitud</th>
					
					<td>
						<input class="frm-asg" placeholder="Se genera automatico" readonly type='text' name='txtLatitud' id='txtLatitud' value="<?php  echo htmlentities($provincias->latitud); ?>"  />
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Longitud</th>
					
					<td>
						<input class="frm-asg" placeholder="Se genera automatico" readonly type='text' name='txtLongitud' id='txtLongitud' value="<?php  echo htmlentities($provincias->longitud); ?>"  />
					</td>
				</tr>
			</tr>
				<tr>
					<td colspan='2' align='center'>
						<button type='submit' class='btn btn-default'>Guardar</button>
					</td>
				</tr>
			</table>
			</form>
			<?php
				$grid->display();

			?>
</body>
</html>
<script>
 function editarProvincia(id)
 {
 	window.location = 'provincias.php?id='+id;
 }
 </script>
