<?php
include_once('libreria/engine.php');


$usuarioBd ='';
$contrasenaBd ='';


session_start();

if($_POST){

$consulta ="select user, password from usuario";
$rs = asgMng::query($consulta);
	if(mysqli_num_rows($rs)>0){

		while($fila = mysqli_fetch_assoc($rs))
		{
			$usuarioBd = $fila['user'];
			$contrasenaBd = $fila['password'];

			if($_POST['txtUser'] == $usuarioBd & $_POST['txtPassword'] == $contrasenaBd)
			{ 
//Si el resutado es positivo, entonces asignar

			$_SESSION['usuario'] = $usuarioBd;
			$_SESSION['contrasena'] = $contrasenaBd;
			header('location:casos.php');


		}

	}
}
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
  <div id="contenido">
  <div class="container">
   <h1 class="formuh1">Login</h1>
    <form id="form1" class="well col-lg-12" action="index.php" method="post" name="form1">
      <div class="row">
       <div class="col-lg-12">
        <label>Usuario</label> <input id="Nombre" class="form-control" type="text" name="txtUser" /> 
        <label>Contraseña:</label> <input id="Email" class="form-control" type="password" name="txtPassword" />
        <a href="registro.php">Registrarse</a>
        <button class="btn btn-default pull-right" type="submit">Enviar</button>
       </div>
    </form>
  </div>
  <div>

    <script src="contacto/jquery.js"></script>
    <script src="contacto/bootstrap.min.js"></script>

  </body>
</html>


