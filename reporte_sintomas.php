<?php
//include('../libreria/engine.php');
include('plantilla.php');
include('cls_reporte.php');
//include('conexion.php');

//$reporte = new Reporte();
//$casos = new asgClass('casos');


?>



<head>
<link rel="stylesheet" href="tabla.css">
</head>

		<button type="button" value="imprimir" onclick="print();" >imprimir</button>
		<a href="sintomaPDF.php">Convertir a PDF</a>
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
				<tbody>
		<?php
			$data = array();
			$reporte = Reporte::listaCasosSintoma();
			$reporte2 = Reporte::listaSintomas();
			
			while($row=mysqli_fetch_assoc($reporte2))
			{

					$data[] = $row;
					$total = Reporte::totalCasosSintoma($row['sintoma']);

						while($fila = mysqli_fetch_assoc($reporte))
						{

							//$casos = Reporte::listaCasosSintoma($fila['sintoma']);
							//echo"<h1>{$fila['sintoma']}</h1>";
							
							echo <<<FILA

								<tr>
								
									<td>{$fila['id_casos']}</td>
									<td>{$fila['cedula']}</td>
									<td>{$fila['nombre_caso']}</td>
									<td>{$fila['apellido']}</td>
									<td>{$fila['fecha_nacimiento']}</td>
									<td>{$fila['sexo']}</td>
									<td>{$fila['provincia']}</td>
								</tr>



FILA;
			
						}
						while($campo = mysqli_fetch_assoc($total))
						{
							echo <<<FILA
					<tr>
						<td>La cantidad de casos por:</td>
						<td>{$row['sintoma']}</td>
						<td>{$campo['cantidad']}</td>
					</tr>
					
FILA;

						}


					}
		?>
		<script src="https://www.google.com/jsapi" type="text/javascript" ></script>
		<script>
		google.load("visualization", "1", {packages:["corechart"]});
		google.setOnLoadCallback(drawChart);

		function drawChart()
		{
			var data = new google.visualitazion.DataTable();
			data.addColumn('string','Sintoma');
			data.addColumn('number','Cantidad');
			data.addRows
				(
				[

<?php
	
		$cantidad = Reporte::totalFinalSintoma();
		foreach ($cantidad as $row) {
			echo <<<CODIGO
			
			["{row['sintoma']}",{$row['totalidad']}],
CODIGO;
		}
?>
]
);
		var opciones = {'title':'Estadistica sobre los afectados por Chikungunya'}
		var grafica = new google.visualization.columnChart(document.getElementById('chart_div'));
		grafica.draw(data, opciones);

		}

		</script>
	<h1 align="center">Reporte de Sintomas</h1>
	<?php
	$listado = Reporte::TotalidadCasos();
	foreach ($listado as $key => $value) {
		echo "<h3 align='center' style='color: #3497DB;'>Total afectados: {$value['totalidad']}</h3>"; 
	}
	?>
	<div id="chart_div"></div>

</tbody>
</table>