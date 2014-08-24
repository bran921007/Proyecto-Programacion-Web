<?php
include('libreria/engine.php');
include('config/motor.php');
//include('plantilla.php');
$usuario = new asgClass('usuario');

if($_POST)
{
$usuario->id = (isset($_POST['txtId']))?$_POST['txtId']:$usuario->id;
$usuario->user = (isset($_POST['txtUser']))?$_POST['txtUser']:$usuario->user;
$usuario->password = (isset($_POST['txtPassword']))?$_POST['txtPassword']:$usuario->password;
$usuario->nombre = (isset($_POST['txtNombre']))?$_POST['txtNombre']:$usuario->nombre;
$usuario->apellido = (isset($_POST['txtApellido']))?$_POST['txtApellido']:$usuario->apellido;
$usuario->genero = (isset($_POST['txtGenero']))?$_POST['txtGenero']:$usuario->genero;
$usuario->fecha_nacimiento = (isset($_POST['txtFecha_nacimiento']))?$_POST['txtFecha_nacimiento']:$usuario->fecha_nacimiento;
		
$usuario->guardar();
header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">    
    <meta name="author" content="Fanco">

    <title>Contactos</title>

    <link href="contacto/css/bootstrap.css" rel="stylesheet">
    <link href="contacto/css/jumbotron.css" rel="stylesheet">
    <style type="text/css" media="screen">
    	body{

           background-image: url('login.jpg');

    	}
    	#contenido{
    		position: relative;
    		top: 70px;

    	}
    </style>

  </head>

  <body>
  
   
</html>

<div class="container">
	<h1 class="formuh1">Registro</h1>
	 
<form role="form" method='post' id='frmusuario' class="well col-lg-12" action='registro.php'>
	<div class="row">
       <div class="col-lg-12">
			<table>			
			
				<tr>
					<td>
						<input class="frm-asg" readonly placeholder="" type='text' hidden class="form-control" name='txtId' id='txtId' value="<?php  echo htmlentities($usuario->id); ?>"  />
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">User</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='text' name='txtUser' id='txtUser' value="<?php  echo htmlentities($usuario->user); ?>"  />
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Password</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='password' name='txtPassword' id='txtPassword' value="<?php  echo htmlentities($usuario->password); ?>"  />
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Nombre</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='text' name='txtNombre' id='txtNombre' value="<?php  echo htmlentities($usuario->nombre); ?>"  />
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Apellido</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='text' name='txtApellido' id='txtApellido' value="<?php  echo htmlentities($usuario->apellido); ?>"  />
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Genero</th>
					
					<td>
						<select  name="txtGenero">
						<option value="Masculino">Masculino</option>	
						<option value="Femenino">Femenino</option>	
						</select>
						<!--<input class="frm-asg" placeholder="" type='text' name='txtGenero' id='txtGenero' value="<?php  //echo htmlentities($usuario->genero); ?>"  />-->
					</td>
				</tr>			
			
				<tr>
					<th style="text-align:right;">Fecha nacimiento</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='date' name='txtFecha_nacimiento' id='txtFecha_nacimiento' value="<?php  echo htmlentities($usuario->fecha_nacimiento); ?>"  />
					</td>
				</tr>
		
				<tr>
					<td colspan='2' align='center'>
						<button type='submit' class='btn btn-default'>Guardar</button>
					</td>
				</tr>
			</table>
		</div>
	</div>
	</form>

</div>
	<script src="contacto/jquery.js"></script>
    <script src="contacto/bootstrap.min.js"></script>
</body>
</html>

