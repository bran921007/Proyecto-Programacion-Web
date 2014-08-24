<?php
include('libreria/engine.php');
include('config/motor.php');
include('plantilla.php');

$zodiaco = new asgClass('zodiaco');

/*$zodiaco->getText();
$zodiaco->getPost();*/

if($_POST)
{
	$zodiaco->id = (isset($_POST['txtId']))?$_POST['txtId']:$zodiaco->id;
	$zodiaco->signo = (isset($_POST['txtSigno']))?$_POST['txtSigno']:$zodiaco->signo;
	$zodiaco->fecha_inicio = (isset($_POST['txtFecha_inicio']))?$_POST['txtFecha_inicio']:$zodiaco->fecha_inicio;
	$zodiaco->fecha_final = (isset($_POST['txtFecha_final']))?$_POST['txtFecha_final']:$zodiaco->fecha_final;
		
	$zodiaco->guardar();
}
else if(isset($_GET['id'])){
	$zodiaco->id = $_GET['id'];

	$zodiaco->cargar();
}

$servidor = new Servidor();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
<form role="form" method='post' id='frmzodiaco' action='zodiaco.php'>
<input class="frm-asg" placeholder="" hidden type='text' name='txtId' id='txtId' value="<?php  echo htmlentities($zodiaco->id); ?>"  />

			<table>						
				<tr>
					<th style="text-align:right;">Signo</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='text' name='txtSigno' id='txtSigno' value="<?php  echo htmlentities($zodiaco->signo); ?>"  />
					</td>
				</tr>
				<tr>
					<th style="text-align:right;">Fecha inicio</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='date' name='txtFecha_inicio' id='txtFecha_inicio' value="<?php  echo htmlentities($zodiaco->fecha_inicio); ?>"  />
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Fecha final</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='date' name='txtFecha_final' id='txtFecha_final' value="<?php  echo htmlentities($zodiaco->fecha_final); ?>"  />
					</td>
				</tr>
				<tr>
					<td colspan='2' align='center'>
						<button type='submit' class='btn btn-default'>Guardar</button>
						<button type="button" onclick="nuevo('zodiaco',0)">Nuevo</button>
					</td>
				</tr>
			</table>
			</form>
			<?php
				$servidor->tablaDatos('zodiaco','editarZodiaco','id');

			?>
</body>
</html>
<script>
 function editarZodiaco(id)
 {
 	window.location = 'zodiaco.php?id='+id;
 }
 </script>