<?php
//include('../libreria/engine.php');
require_once("dompdf/dompdf_config.inc.php");
include('cls_reporte.php');


     $codigoHTML='<html>
     <head>
     </head>
     <body>';

			$reporte = new Reporte();

			$reporte = Reporte::listaTsangre();
			

			while($fila = mysqli_fetch_assoc($reporte))
			{

				$casos = Reporte::listaCasosSangre($fila['sangre']);
				$codigoHTML.='<h1>'.$fila['sangre'].'</h1>';
				$total = Reporte::totalCasosSangre($fila['sangre']);


				while($campo = mysqli_fetch_assoc($total))
				{

							$codigoHTML.='
							<table>			
							<thead>
							
								
									<th>ID</th>
									<th>Cedula</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>fecha nacimiento</th>
									<th>Sexo</th>
									<th>Provincia</th>
									
								
							</thead>
							<tbody>';
				
				while($casito = mysqli_fetch_assoc($casos))
				{

					
					//$penal=mysqli_fetch_assoc($total);
					//$cantidad = $penal['cantidad'];
					$codigoHTML.='

					<tr>
					
						<td>'.$casito['id_casos'].'</td>
						<td>'.$casito['cedula'].'</td>
						<td>'.$casito['nombre_caso'].'</td>
						<td>'.$casito['apellido'].'</td>
						<td>'.$casito['fecha_nacimiento'].'</td>
						<td>'.$casito['sexo'].'</td>
						<td>'.$casito['provincia'].'</td>
					</tr>';
					

				}
				$codigoHTML.='
				<tr>
						<td>La cantidad de casos es:</td>
						<td>'.$campo['cantidad'].'</td>
					</tr>
					</tbody>
					</table>';

				}
		}
$codigoHTML.='</body></html>';


$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("ListadoEmpleado.pdf");

		?>