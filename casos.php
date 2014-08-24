<?php
include('libreria/engine.php');
include('config/motor.php');
include('plantilla.php');
//include('conexion.php');

$casos = new asgClass('casos');
//$provincias = new asgClass('provincias');
//$sintomatico = array();



if($_POST)
{


/*$sintomatico = $_POST['txtSintomas'];
$int = array();*/

/*$sintomatico = $_POST['txtSintomas'];
var_dump($sintomatico);*/
/*var_dump($sintomatico);
$sintomatico = implode(",",$sintomatico);*/

$id = $_POST['txtId_casos'];

$casos->id_casos = (isset($_POST['txtId_casos']))?$_POST['txtId_casos']:$casos->id_casos;
$casos->cedula = (isset($_POST['txtCedula']))?$_POST['txtCedula']:$casos->cedula;
$casos->nombre_caso = (isset($_POST['txtNombre_caso']))?$_POST['txtNombre_caso']:$casos->nombre_caso;
$casos->apellido = (isset($_POST['txtApellido']))?$_POST['txtApellido']:$casos->apellido;


$casos->fecha_nacimiento = (isset($_POST['txtFecha_nacimiento']))?$_POST['txtFecha_nacimiento']:$casos->fecha_nacimiento;
$casos->sexo = (isset($_POST['txtSexo']))?$_POST['txtSexo']:$casos->sexo;
$casos->provincia = (isset($_POST['txtProvincia']))?$_POST['txtProvincia']:$casos->provincia;
$casos->direccion = (isset($_POST['txtDireccion']))?$_POST['txtDireccion']:$casos->direccion;
$casos->tipo_sangre = (isset($_POST['txtTipo_sangre']))?$_POST['txtTipo_sangre']:$casos->tipo_sangre;
$casos->estado_civil = (isset($_POST['txtEstado_civil']))?$_POST['txtEstado_civil']:$casos->estado_civil;
$casos->situacion_laboral = (isset($_POST['txtSituacion_laboral']))?$_POST['txtSituacion_laboral']:$casos->situacion_laboral;


//$casos->sintomas = (isset($_POST['txtSintomas']))?$_POST['txtSintomas']:$casos->sintomas;
if($_POST['txtSintomas']!="")
{
	if(is_array($_POST['txtSintomas'])){

			while(list($key,$value) = each($_POST['txtSintomas']))
			{
				asgMng::query("INSERT INTO sintomas_detalle (pertenece, sintoma) VALUES ('$id', '$value')");

			}
	}
	
}
	
$casos->guardar();

}
else if(isset($_GET['id'])){
	$casos->id_casos = $_GET['id'];

	$casos->cargar();
}



$servidor = new Servidor();

?>

<html>
	<head>
		
	</head>
	<body>
		<form role="form" method='post' id='frmcasos' action='casos.php'>
			<input class="frm-asg" placeholder="" type='text' name='txtId_casos' hidden id='txtId_casos' value="<?php  echo htmlentities($casos->id_casos); ?>"  />
			<table>					
			
				<tr>
					<th style="text-align:right;">Cedula</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='text' name='txtCedula' id='txtCedula' value="<?php  echo htmlentities($casos->cedula); ?>"  />
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Nombre</th>
					
					<td>
<input class="frm-asg" placeholder="" type='text' name='txtNombre_caso' id='txtNombre_caso' value="<?php  echo htmlentities($casos->nombre_caso); ?>"  />
		
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Apellido</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='text' name='txtApellido' id='txtApellido' value="<?php  echo htmlentities($casos->apellido); ?>"  />
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Sintomas</th>
					
					<td>
						<!-- <input class="frm-asg" placeholder="" type='text' name='txtSintomas' id='txtSintomas' value="<?php  //echo htmlentities($casos->sintomas); ?>"  /> -->
						
						<?php
								
								$consulta = "select id_sintoma, sintoma from sintomas";
								$rs = asgMng::query($consulta);

								while($fila = mysqli_fetch_assoc($rs))
								{
									$id = $fila['id_sintoma'];
									$sintomita = $fila['sintoma'];

									echo <<<ROW
									<input type="checkbox" name="txtSintomas[]" value="{$fila['sintoma']}">$sintomita

ROW;

								}

								?>
						
						
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Fecha nacimiento</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='date' name='txtFecha_nacimiento' id='txtFecha_nacimiento' value="<?php  echo htmlentities($casos->fecha_nacimiento); ?>"  />
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Sexo</th>
					
					<td>
						<!-- <input class="frm-asg" placeholder="" type='text' name='txtSexo' id='txtSexo' value="<?php  echo htmlentities($casos->sexo); ?>"  /> -->
						<select name="txtSexo" >
							<option value="Masculino">Masculino</option>
							<option value="Femenino">Femenino</option>
							
						</select>
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Provincia</th>
					
					<td>
						<!-- <input class="frm-asg" placeholder="" type='text' name='txtProvincia' id='txtProvincia' value="<?php  //echo htmlentities($casos->provincia); ?>"  /> -->
						<select name='txtProvincia'>
						<?php
								$consulta = "select nombre_provincia as nombre from provincias";
								$rs = asgMng::query($consulta);

								while($fila = mysqli_fetch_assoc($rs))
								{
									echo"

									<option>{$fila['nombre']}</option>";
								}

								?>
						</select>		
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Direccion</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='text' name='txtDireccion' id='txtDireccion' value="<?php  echo htmlentities($casos->direccion); ?>"  />
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Tipo sangre</th>
					
					<td>
						<!-- <input class="frm-asg" placeholder="" type='text' name='txtTipo_sangre' id='txtTipo_sangre' value="<?php  //echo htmlentities($casos->tipo_sangre); ?>"  /> -->
						<select name='txtTipo_sangre'>
						<?php
								$consulta = "select sangre from tipo_sangre";
								$rs = asgMng::query($consulta);

								while($fila = mysqli_fetch_assoc($rs))
								{
									echo"

									<option>{$fila['sangre']}</option>";
								}

								?>
						</select>
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Estado civil</th>
					
					<td>
						<!-- <input class="frm-asg" placeholder="" type='text' name='txtEstado_civil' id='txtEstado_civil' value="<?php  //echo htmlentities($casos->estado_civil); ?>"  /> -->
					<select name='txtEstado_civil'>
						<?php
								$consulta = "select estado from estado_civil";
								$rs = asgMng::query($consulta);

								while($fila = mysqli_fetch_assoc($rs))
								{
									echo"

									<option>{$fila['estado']}</option>";
								}

								?>
						</select>

					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Situacion laboral</th>
					
					<td>
						<!-- <input class="frm-asg" placeholder="" type='text' name='txtSituacion_laboral' id='txtSituacion_laboral' value="<?php  //echo htmlentities($casos->situacion_laboral); ?>"  /> -->
						<select name='txtSituacion_laboral'>
						<?php
								$consulta = "select situacion_laboral as labor from laboral";
								$rs = asgMng::query($consulta);

								while($fila = mysqli_fetch_assoc($rs))
								{
									echo"

									<option>{$fila['labor']}</option>";
								}

								?>
						</select>
					</td>
				</tr>
			</tr>
				<tr>
					<td colspan='2' align='center'>
						<button type='submit' class='btn btn-default'>Guardar</button>
						<button type="button" onclick="nuevo('casos',0)">Nuevo</button>
					</td>
				</tr>
			</table>
			</form>

			<?php
				$servidor->tablaDatos('casos','editarCasos','id_casos');
				
			?>
	</body>

</html>
<script>
 function editarCasos(id)
 {
 	window.location = 'casos.php?id='+id;
 }
 </script>
