<?php
include('libreria/engine.php');
include('plantilla.php');

$estado_civil = new asgClass('estado_civil');

if($_POST)
{
	$estado_civil->id = (isset($_POST['txtId']))?$_POST['txtId']:$estado_civil->id;
	$estado_civil->estado = (isset($_POST['txtEstado']))?$_POST['txtEstado']:$estado_civil->estado;
		
	$estado_civil->guardar();
}
$sql = " select * from estado_civil";
$dt = new dataTable($sql);
$grid = new dataGrid($dt);

?>
<form role="form" method='post' id='frmestado_civil' action='ecivil.php'>
<input class="frm-asg" placeholder="" type='text' hidden name='txtId' id='txtId' value="<?php  echo htmlentities($estado_civil->id); ?>"  />
							
			<table>			

				<tr>
					<th style="text-align:right;">Estado</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='text' name='txtEstado' id='txtEstado' value="<?php  echo htmlentities($estado_civil->estado); ?>"  />
					</td>
				</tr>
			</tr>
				<tr>
					<td colspan='2' align='center'>
						<button type='submit' class='btn btn-default'>Guardar</button>
						<button type='button' onclick='nuevo(0)'>Nuevo</button>
					</td>
				</tr>
			</table>
			</form>
			<?php
			$grid->display();
			?>
<script>
function nuevo(id)
{
window.location = 'ecivil.php?id='+id;
}
</script>