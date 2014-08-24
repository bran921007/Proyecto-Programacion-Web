<?php
include('libreria/engine.php');
include('plantilla.php');
include('server.php');

$sintomas = new asgClass('sintomas');
/*$sintomas->getPost();
$sintomas->getText();*/

if($_POST)
{
$sintomas->id_sintoma = (isset($_POST['txtId_sintoma']))?$_POST['txtId_sintoma']:$sintomas->id_sintoma;
$sintomas->sintoma = (isset($_POST['txtSintoma']))?$_POST['txtSintoma']:$sintomas->sintoma;
		
$sintomas->guardar();

}
else if(isset($_GET['id'])){
	$sintomas->id_sintoma = $_GET['id'];

	$sintomas->cargar();
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
<form role="form" method='post' id='frmsintomas' action='sintomas.php'>
			<table>			
			
				<tr>
					
					
					<td>
						<input class="frm-asg" placeholder="" type='text'  hidden name='txtId_sintoma' id='txtId_sintoma' value="<?php  echo htmlentities($sintomas->id_sintoma); ?>"  />
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Sintoma</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='text' name='txtSintoma' id='txtSintoma' value="<?php  echo htmlentities($sintomas->sintoma); ?>"  />
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
				$servidor->tablaDatos('sintomas','editarSintomas','id_sintoma');

			?>
</body>
</html>
<script>
 function editarSintomas(id)
 {
 	window.location = 'sintomas.php?id='+id;
 }
 </script>