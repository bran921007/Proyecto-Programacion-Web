<?php
	//require('login.php');
	$user = $_SESSION['usuario'];
	$pass = $_SESSION['contrasena'];

	echo($user != '' & $pass != '')?'$user':'';

?>