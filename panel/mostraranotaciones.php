<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';
sleep(2);
$db=new conexion();
$db->conectar();



$consulanot="SELECT date_format(DATE(dh.fecha_hva),' %d-%m-%Y') as Fecha, us.nombres_usu, us.apellidos_usu, cat.nombre_cat_det, tp.desc_tipo_cat FROM detalle_hoja_vida dh INNER JOIN hoja_vida hv
ON dh.id_detalle_hv = hv.id_detalle_hv INNER JOIN usuarios us ON hv.id_usuario = us.id_usuario INNER JOIN categoria_det cat ON cat.id_categoria_det = dh.id_cat_detalle INNER JOIN tipo_cat tp ON cat.id_tipo_cat = tp.id_tipo_cat where cat.id_tipo_cat = '2'";
if(isset($_GET['fecha1d'])){
  $fecha1=$db->fechaSql($_GET['fecha1d']);
  $fecha2=$db->fechaSql($_GET['fecha2']);

  $consulanot.=" and DATE(dh.fecha_hva) between '".$fecha1."' and '".$fecha2."' ";
}
$consulanot.=" ORDER BY DATE(dh.fecha_hva) asc";

$consultaResumen=$db->consulta($consulanot);


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
	<title>Panel</title>
	<link rel="stylesheet" href="../css/normalize.css"/>
	<link rel="stylesheet" href="../css/estilos-panel.css"/>
	<link rel="stylesheet" href="../css/jquery-ui.min.css"/>
</head>
<body>
	<div class="content_global">
	<?php
		include '../vistas/header.php';
	?>
		<div class="body_content">
			<h1 class="title">Mostrar Anotaciones</h1>
			<section class="panel_edition">
				<article class="list_editar">
					<form id="buscarFecha" method="POST" action="#">
					<input type="hidden" name="usuario" id="usuario" value="<?php echo $id_usuario ?>">
					<span>Desde</span>
					<input type="text" id="fecha1" class="fecha" name="fecha1" required/>
					<span>Hasta</span>
					<input type="text" id="fecha2" class="fecha" name="fecha2" required/>
					<input type="submit" name="filtrar" id="filtrar" class="btn_filtrar" value="Filtrar" />
					</form>
					<table>
						<tr>
							<th>Fecha</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Categoria</th>
							<th>Tipo</th>
						</tr>
						<tbody id="listarEventos">
							<?php
						if ($db->num_rows($consultaResumen)>0){
							while($rows=$db->fetch_array($consultaResumen)){?>
								<tr>
									<td class="td_info"> <?php echo $rows[0];?> </td>
            						<td class="td_info"> <?php echo $rows[1];?> </td>
            						<td class="td_info"> <?php echo $rows[2];?> </td>
            						<td class="td_info"> <?php echo $rows[3];?> </td>
            						<td class="td_info"> <?php echo $rows[4];?> </td>
            					</tr>
								<?php
								}	
						}
						else{
							if ($id_usuario == 0) {
								header('Location: ./hva.php');
							}
							echo '<tr>
								<td class="td_info" colspan="10">No existen registros con la fecha '.$db->cleanString($_GET["fecha1d"]).' - '.$db->cleanString($_GET["fecha2"]).'</td>
							</tr>';
							}
						?>
						</tbody>
						<div id="#filtrarevento"></div>
						
					</table>
				</article>
			</section>
		</div>
		<?php
		include '../vistas/footer.php';
		?>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/modernizr.js"></script>
	<script src="../js/funcion.js"></script>
	<script type="text/javascript">
$(document).ready(function() {
	$('#buscarFecha').submit(function() {
	$.ajax({
		data:$(this).serialize(),
		url: "../controlador/filtrarevento.php",
		type:"POST",
		beforeSend:function(){
			$('#filtrarevento').html('Cargando tipos...');
		},
		success:function(x){
			$('#filtrarevento').html(x);
			console.log(x);
		}
	});
	return false	
});
});
	</script>

</body>
</html>