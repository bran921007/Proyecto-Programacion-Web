<?php
include('libreria/engine.php');
include('config/motor.php');
include('plantilla.php');

$laboral = new asgClass('laboral');

if($_POST)
{
$laboral->id = (isset($_POST['txtId']))?$_POST['txtId']:$laboral->id;
$laboral->situacion_laboral = (isset($_POST['txtSituacion_laboral']))?$_POST['txtSituacion_laboral']:$laboral->situacion_laboral;
		
$laboral->guardar();
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
<form role="form" method='post' id='frmlaboral' action='laboral.php'>
<input class="frm-asg" placeholder="" hidden type='text' name='txtId' id='txtId' value="<?php  echo htmlentities($laboral->id); ?>"  />
			<table>			
			
			
				<tr>
					<th style="text-align:right;">Situacion laboral</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='text' name='txtSituacion_laboral' id='txtSituacion_laboral' value="<?php  echo htmlentities($laboral->situacion_laboral); ?>"  />
					</td>
				</tr>
			</tr>
				<tr>
					<td colspan='2' align='center'>
						<button type='submit' class='btn btn-default'>Guardar</button>
						<button type="button" onclick="nuevo('laboral',0)">Nuevo</button>
					</td>
				</tr>
			</table>
			</form>
			<?php
				$servidor->tablaDatos('laboral','editarSintomas','id');

			?>
</body>
</html>

<script>
 function editarSintomas(id)
 {
 	window.location = 'sintomas.php?id='+id;
 }
 </script>
