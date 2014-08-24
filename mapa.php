<?php

include('conexion.php');

		$data = array();
		$consulta = "select * from casos, provincias";
		$rs = mysqli_query(conexion::obtenerInstancia(), $consulta);
		if(mysqli_num_rows($rs) >0)
		{
			while($fila = mysqli_fetch_assoc($rs))
			{
				$data[] =$fila;
			}
		}
		$json = json_encode($data);
		//print_r($json);


?>

<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
	
	google.maps.event.addDomListener(window, 'load', dibujarMapa());
	//google.load("visualization", "1", {packages:["corechart"]});

	function dibujarMapa()
	{
		var center = new google.maps.LatLng(18.735693, -70.162651);
		var configuracionMapa = {
			zoom: 7,
			center: center,
			mapTypeId: google.maps.MapTypeId.ROADMAP


		};

		var mapa = new google.maps.Map(document.getElementById('mapa'),configuracionMapa);
		var datos = <?php echo $json;

?>;

	for (var i = 0; i<datos.length; i++){

		var punto = new google.maps.LatLng(datos[i].longitud, datos[i].latitud);
		var infoWindow = new google.maps.InfoWindow();
		var marcador = new google.maps.Marker({
			position: punto,
			map: mapa,
			title: datos[i].nombre,
			draggable: false,
		});

			marcador.content = "Numero de afectados: "+datos[i].cantidad;
			google.maps.event.addListener(marcador, 'click', function(e){
				infoWindow.setContent(this.content);
				infoWindow.open(this.getMap(),this);
		
			});



		}



	}


</script>