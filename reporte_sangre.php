<?php
include('plantilla.php');
//include('conexion.php');
include('cls_reporte.php');

$reporte = new Reporte();
//$casos = new asgClass('casos');


?>
<head>
<link rel="stylesheet" href="tabla.css">
</head>

		<button type="button" value="imprimir" onclick="print();" >imprimir</button>
		<a href="sangrePDF.php">Convertir a PDF</a>
		<?php
			$reporte = Reporte::listaTsangre();
			

			while($fila = mysqli_fetch_assoc($reporte))
			{

				$casos = Reporte::listaCasosSangre($fila['sangre']);
				echo"<h1>{$fila['sangre']}</h1>";
				$total = Reporte::totalCasosSangre($fila['sangre']);


				while($campo = mysqli_fetch_assoc($total))
				{

							echo <<<FILA
							<table>			
							<thead>
							
								
									<th>ID</th>
									<th>Cedula</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>fecha nacimiento</th>
									<th>Sexo</th>
									<th>Provincia</th>
									<th>Direccion</th>
									<th>Tipo Sangre</th>
									<th>Estado Civil</th>
								
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
						<td>{$casito['direccion']}</td>
						<td>{$casito['tipo_sangre']}</td>
						<td>{$casito['estado_civil']}</td>
					</tr>
					


FILA;
				}
				echo <<<FILA
				<tr>
						<td>La cantidad de casos es: </td>
						<td>{$campo['cantidad']}</td>
					</tr>
					</tbody>
					</table>

FILA;
				}

		}
			

		?>

