<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';
sleep(2);
$db=new conexion();
$db->conectar();

$id_usuario = intval($_GET['id']);

if (!is_numeric($id_usuario)) {
	$id_usuario = 0;
}
if (!isset($id_usuario)) {
	$id_usuario = 0;
}

$consul="SELECT DATE(dh.fecha_hva) as fecha, us.nombres_usu, us.apellidos_usu, cat.nombre_cat_det, dh.id_detalle_hv, dh.id_cat_detalle,dh.id_funcionario,dh.detalle_titulo FROM detalle_hoja_vida dh INNER JOIN hoja_vida hv
ON dh.id_detalle_hv = hv.id_detalle_hv INNER JOIN usuarios us ON hv.id_usuario = us.id_usuario INNER JOIN categoria_det cat ON cat.id_categoria_det = dh.id_cat_detalle WHERE us.id_usuario = '".$id_usuario."' ";
if(isset($_GET['fecha1d'])){
  $fecha1=$db->fechaSql($_GET['fecha1d']);
  $fecha2=$db->fechaSql($_GET['fecha2']);

  $consul.=" and DATE(dh.fecha_hva) between '".$fecha1."' and '".$fecha2."' ";
}
$consul.=" ORDER BY DATE(dh.fecha_hva) asc";

$consultaResumen=$db->consulta($consul);

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
			<h1 class="title">Edición Informe</h1>
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
							<th>Acción</th>
						</tr>
						<tbody id="listarEventos">
							<?php
						if ($db->num_rows($consultaResumen)>0){
							while($rows=$db->fetch_array($consultaResumen)){?>
								<tr>
									<td class="td_info"> <?php echo $db->fechaNormal($rows[0]);?> </td>
            						<td class="td_info"> <?php echo $rows[1];?> </td>
            						<td class="td_info"> <?php echo $rows[2];?> </td>
            						<td class="td_info"> <?php echo $rows[3];?> </td>
            						<td class="td_info"><a class="modificarDatos" href="#" id="modificarDatos" name="modificarDatos" fecha="<?php echo $db->fechaNormal($rows[0]);?>" iddetalle="<?php echo $rows[4];?>" idtitulo="<?php echo $rows[5];?>" idfuncionario="<?php echo $rows[6];?>" evaluacion="<?php echo $rows[7];?>"/>Editar</a></td>
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
						
						
					</table>
				</article>
				<article id="editarTitulo" class="list_editar">
				<h4>Editar Título</h4>
				<form id="frmTitulo" action="#" method="POST">
					<div>
						<label for="fecha3">Fecha</label>
						<input type="text" id="fecha3" name="fecha6" class="fecha"/>
						<label for="evaluador">Evaluador</label>
						<select name="evaluador" id="evaluador" required></select>
					</div>
					
					<div>
						<label for="titulo">Título</label>
						<select name="titulo" id="titulo">
						</select>
					</div>
					<div>
					<label for="evaluacion">Evaluación</label>
					<textarea name="evaluacion" id="evaluacion" cols="30" rows="10"></textarea>
					</div>
					<input type="submit" value="Editar" class="btn_filtrar" />
					<input type="button" id="cerrar" value="Cerrar" class="btn_filtrar" />
					<div id="msgFormulario">
						
					</div>
				</form>
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
		$("#editarTitulo").fadeOut('0');
		$.ajax({
			url:"../controlador/cargarEvaluador.php",
			success:function(respuesta){
				$('#evaluador').html(respuesta);
			}
		});

		$.ajax({
			url:"../controlador/listarEditartitulos.php",
			success:function(respuesta){
				console.log(respuesta);
				$('#titulo').html(respuesta);
			}
		});
		$('#buscarFecha').submit(function() {
			
		$(location).attr('href','editar-informe.php?id=<?php echo $id_usuario; ?>&fecha1d='+$('#fecha1').val()+'&fecha2='+$('#fecha2').val());
				return false;
		});
		$("#cerrar").click(function(event) {
			$(".list_editar").fadeIn('slow');
			$("#editarTitulo").fadeOut('slow');
			
		});
		$(".modificarDatos").on('click', function (){
			$(".list_editar").fadeOut('slow');
			$("#editarTitulo").fadeIn('slow');
			var fecha=$(this).attr('fecha');
			var idtitulo=$(this).attr('idtitulo');
			var idfuncionario=$(this).attr('idfuncionario');
			var iddetalle=$(this).attr('iddetalle');
			var evaluacion=$(this).attr('evaluacion');

			localStorage.setItem('idvalor',iddetalle);
			localStorage.setItem('valorf',idfuncionario);
			$('#fecha3').val(fecha);
			$('#titulo').val(idtitulo);
			$('#evaluacion').val(evaluacion);
		});
		$('#titulo').change(function(){

		return false;
	});
		$('#frmTitulo').submit(function(){
			$.ajax({
				data:$(this).serialize()+'&iddetalle='+localStorage.getItem('idvalor')+'&idfuncionario='+localStorage.getItem('valorf'),
				url:"../controlador/modificarTitulo.php",
				type:"POST",
				beforeSend:function(){
						$('#msgFormulario').html('<img src="../loading.gif"/ width=60> verificando');
				},
				success:function(respuesta){
					console.log(respuesta);
					var id= 1;
					var iddos= 2;
									if(respuesta==id){
										$('#msgFormulario').html("Funcionario actualizado correctamente");
										
									}else if(respuesta==iddos){
										$('#msgFormulario').html("Usuario no existe");
										
									}else{
										$('#msgFormulario').html("No existen los valores indicados...");
									}
								}
		});
		return false;
	});
});
	</script>
</body>
</html>