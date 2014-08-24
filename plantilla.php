<?php
session_start();

$objPlan = new plantilla();

class plantilla{

	function __construct(){

if($_SESSION['usuario'] =='' && $_SESSION['contrasena']=='' ){

	header('location:index.php');

}

?>
<!DOCTYPE html>
<html>
<head>
<title>Registro de casos de Chikungunya</title>
<meta charset="UTF-8">
<!--[if IE]><![endif]-->
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="plantilla/css/style.css">
<!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> -->
<style>
#contenido
{
 min-height: 300px;
 
 
}

</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="plantilla/js/jquery.js"><\/script>')</script>
<script src="plantilla/js/scripts.js"></script>
<script src="script.js"></script>
<!-- <script src="js/bootstrap.min.js"></script> -->
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<div class="containers darkbgs clearfixs">
	<div id="headercont" class="clearfixs">
		<div id="headerlogos">
			<h1><a title="" href="">Casos de Chikungunya</a></h1>
		</div>
		<div id="headerrights">
            <p><span>Conectado: <?= $_SESSION['usuario']; ?></span></p>
         <p><a href="logout.php">Logout</a></p>
		</div>
	</div>
</div>

	<div id='cssmenu'>
	<ul>
	   <li><a title="" href="home.php"><span>Inicio</span></a></li>

	   <li class='active has-sub'><a href='#'><span>Mantenimiento</span></a>
	      <ul>
	         <li class='has-sub'><a href='provincias.php'><span>Provincias</span></a>
	         </li>
	         <li class='has-sub'><a href='tipo_sangre.php'><span>Tipos de Sangre</span></a>
	         </li>
	         <li class='has-sub'><a href='ecivil.php'><span>Estado civil</span></a>
	         </li>
	         <li class='has-sub'><a href='laboral.php'><span>Situacion Laboral</span></a>
	         </li>
	         <li class='has-sub'><a href='sintomas.php'><span>Sintomas</span></a>
	         </li>
	         <li class='has-sub'><a href='zodiaco.php'><span>Signo Zodiacal</span></a>
	         </li>

	      </ul>
	   </li>	   
	   <li class='active has-sub'><a href='#'><span>Reporte</span></a>
	      <ul>
	         <li class='has-sub'><a href='reporte_provincias.php'><span>Casos por Provincia</span></a>
	         </li>
	         <li class='has-sub'><a href='reporte_zodiacal.php'><span>Listado por Signo Zodiacal</span></a>
	         </li>
	         <li class='has-sub'><a href='reporte_sintomas.php'><span>Reporte de Sintomas</span></a>
	         </li>
	         <li class='has-sub'><a href='reporte_sangre.php'><span>Listado por Tipo de Sangre</span></a>
	         </li>

	      </ul>
	   </li>
	   <li><a href='casos.php'><span>casos</span></a></li>
	
	   <li class='last'><a href='contactos.php'><span>Contacto</span></a></li>
	   <li class='last'><a href='mapa_bd.php'><span>Geografico</span></a></li>
	</ul>
	</div>

<div class="">
<div class="" id="">
	<div id="" class="">
		<div id="contenido">

<?php
	}

	function __destruct()
	{
?>

        </div>
	</div>
</div>

</div>
</body>
</html>

</body>
</html>

<?php
	}

}