<?php
include('plantilla.php');
include('conexion.php');

	$output = '';
	$markerListLat = array();
	$markerListLng = array();

$data = array();
$sql = "select latitud, longitud from provincias";
$rs = mysqli_query(conexion::obtenerInstancia(),$sql);

if(mysqli_num_rows($rs) >0)
{
	while($fila = mysqli_fetch_assoc($rs))
	{
		array_push($markerListLat, $fila['latitud']);
		array_push($markerListLng, $fila['longitud']);
		$data[] = $fila;
		
	}
}
$jsonObj = json_encode($data);

$base_url = "http://maps.google.com/maps/geo?output=csv&key=ABQIAAAAnfs7bKE82qgb3Zc2YyS-oBT2yXp_ZAY8_ufC3CFXhHIE1NvwkxSySz_REpPq-4WZA27OwgbtyR3VcA";




//echo $jsonObj;
/*var jsonData = $.ajax({
          url: "mapa_bd.php",
          dataType:"json",
          async: false
          }).responseText;
*/

		function generateJSArray($datas){

		$JSArray = 'new Array(';
		$total = count($datas);

		if($total ==0)
		{
			return 'new Array()';
		}else
		{
			for($i=0; $i<$total; $i++)
			{
				$JSArray .= $datas[$i].',';
			}
			return substr($JSArray, 0, strlen($JSArray)-1).')';
		}


		}
?>
<head>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script>
	
	function initialize()
	{
		var marker;
		var myLatLng;
		var total = 0;
		var i = 0;
		var latlng = new google.maps.LatLng(18.469398,-69.939209);
		var myOptions = {

			zoom: 6,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

		var markerListLat = <?php echo generateJSArray($markerListLat); ?>;
		var markerListLng = <?php echo generateJSArray($markerListLng); ?>;

		total = markerListLat.length;
		for(i = 0; i<total; i++)
		{
			myLatlng = new google.maps.LatLng(markerListLat[i], markerListLng[i]);

			marker = new google.maps.Marker({
				position: myLatlng,
				map: map,
				title: ("Punto ID: "+i)
			});
		}
	}

	// Contenido
  




</script>
</head>

<body onload="initialize();">
	<h1>Geocodificacion de Base de Datos</h1>
	<p><?=$output;?></p>
	<div id="map_canvas" style="width:700px; height:500px; text-align:center;">
		
	</div>
	
</body>
</html>
