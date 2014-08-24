<?php
include('libreria/engine.php');
include('plantilla.php');

$tipo_sangre = new asgClass('tipo_sangre');

$sql = "select * from tipo_sangre";
$dt = new dataTable($sql);
$grid= new dataGrid($dt);
$grid->setRowAction('onclick','editarTsangre', array('id'));

if($_POST)
{
	$tipo_sangre->id = (isset($_POST['txtId']))?$_POST['txtId']:$tipo_sangre->id;
	$tipo_sangre->sangre = (isset($_POST['txtSangre']))?$_POST['txtSangre']:$tipo_sangre->sangre;
		
$tipo_sangre->guardar();
}
else if(isset($_GET['id'])){
	$tipo_sangre->id = $_GET['id'];

	$tipo_sangre->cargar();
}


?>
<form role="form" method='post' id='frmtipo_sangre' action='tipo_sangre.php'>
<input class="frm-asg" placeholder="" type='text' name='txtId' hidden id='txtId' value="<?php  echo htmlentities($tipo_sangre->id); ?>"  />			
			<table>			
		
			
				<tr>
					<th style="text-align:right;">Sangre</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='text' name='txtSangre' id='txtSangre' value="<?php  echo htmlentities($tipo_sangre->sangre); ?>"  />
					</td>
				</tr>
			</tr>
				<tr>
					<td colspan='2' align='center'>
						<button type='submit' class='btn btn-default'>Guardar</button>
					</td>
				</tr>
			</table>
			</form>
			<?php
				$grid->display();

			?>
<script>
 function editarTsangre(id)
 {
 	window.location = 'tipo_sangre.php?id='+id;
 }
 </script>