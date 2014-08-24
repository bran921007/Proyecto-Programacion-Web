<?php
//include('../libreria/engine.php');
include('../plantilla.php');
include('cls_reporte.php');

$reporte = new Reporte();
//$casos = new asgClass('casos');


?>
<head>
	<style type="text/css">
	table, th, td{

		border:1px solid black;

	}

	</style>

</head>

	
		<?php
			$reporte = Reporte::listaProvincia();

			while($fila = mysqli_fetch_assoc($reporte))
			{

				$casos = Reporte::listaCasos($fila['nombre_provincia']);
				echo"<h1>{$fila['nombre_provincia']}</h1>";
				$total = Reporte::total($fila['nombre_provincia']);


				while($campo = mysqli_fetch_assoc($total))
				{

							echo <<<FILA
							<table >			
							<thead border="1px solid black">
							
								<tr>
									<th>ID</th>
									<th>Cedula</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>fecha nacimiento</th>
									<th>Sexo</th>
									<th>Provincia</th>
									
								</tr>
							</thead>
							<tbody>
FILA;
				while($casito = mysqli_fetch_assoc($casos))
				{
					echo <<<FILA

		<tr>
		
			<td>{$casito['id_casos']}</td>
			<td>{$casito['cedula']}</td>
			<td>{$casito['nombre_caso']}</td>
			<td>{$casito['apellido']}</td>
			<td>{$casito['fecha_nacimiento']}</td>
			<td>{$casito['sexo']}</td>
			<td>{$casito['provincia']}</td>
		</tr>
		<tr>
			<td>{$total['cantidad']}</td>
		</tr>

FILA;
				}



				}




			}
			
			
				echo <<<FILA
	<table >			
	<thead border="1px solid black">
	
		<tr>
			<th>ID</th>
			<th>Cedula</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>fecha nacimiento</th>
			<th>Sexo</th>
			<th>Provincia</th>
			
		</tr>
	</thead>
	<tbody>
FILA;
			

		echo <<<FILA

		<tr>
		
			<td>{$campo['id_casos']}</td>
			<td>{$campo['cedula']}</td>
			<td>{$campo['nombre_caso']}</td>
			<td>{$campo['apellido']}</td>
			<td>{$campo['fecha_nacimiento']}</td>
			<td>{$campo['sexo']}</td>
			<td>{$campo['provincia']}</td>
		</tr>


FILA;
			
			


				//}

		









				/*while($campo = mysqli_fetch_assoc($rs2))
				{


					echo <<<AZUL
				

				<td>{$campo['id_casos']}</td>
				<td>{$campo['cedula']}</td>
				<td>{$campo['nombre_caso']}</td>
				<td>{$campo['apellido']}</td>
				<td>{$campo['fecha_nacimiento']}</td>
				<td>{$campo['sexo']}</td>
				<td>{$campo['provincia']}</td>
				</tr>
AZUL;*/
		?>

	