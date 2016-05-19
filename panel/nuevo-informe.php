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

$consultaBuscar="SELECT cat.id_categoria_det, cat.nombre_cat_det FROM categoria_det cat
LEFT JOIN subcategoria_det sub ON cat.id_categoria_det = sub.id_categoria_det
WHERE sub.id_categoria_det IS NULL";
$retorno="";

$consultaUsuario=$db->consulta("SELECT * FROM usuarios WHERE id_usuario = '".$id_usuario."'");
if ($db->num_rows($consultaUsuario)>0) {
	while($row=$db->fetch_array($consultaUsuario)){
		$nombre_usuario = $row[1];
		$apellido = $row[2];
		$rut = $row[3];
	}
}else{
	echo "redireccionando......";
	header('Location: ./hva.php');
}
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
			<h1 class="title">Nuevo Informe - <?php echo $nombre_usuario.' '.$apellido; ?></h1>
			<section class="cont_titulos">
				<ul id="titulos_hva" class="titulos_generales ">

<?php
$consulta=$db->consulta($consultaBuscar);
if ($db->num_rows($consulta)>0) {
	while($row=$db->fetch_array($consulta)){
		$retorno.="<li><a href=\"#\" id=".$row[0]." class='link_title'>".$row[1]."</a></li>";
	}
}else{
	$retorno="No existen titulos...";
}
echo $retorno;
?>
					
				</ul>
				<ul id="titulo_resumen" class="titulos_resumenes">
					<li><a href="#" class="resumenes r1">Resumen Estadístico</a></li>
					<li><a href="#" class="resumenes">Resumen Anual</a></li>
				</ul>
				<div class="cont_form">
				<form id="frmTitulo" action="#" method="POST">
					<h3 id="title_form" class="title_form"></h3>
					<input type="hidden" name="funcionario" value="<?php echo $id_usuario; ?>">
					<input type="hidden" name="idtitulo" id="hidden" value="">
					<div class="cont_selectores">
						<span class="span_fecha">Fecha</span>
						<input type="text" name="fecha" id="fecha1" class="fecha_title"/>
						<span class="span_evaluador">Evaluador</span>
						<select name="evaluador" id="evaluador">
						</select>
					<textarea name="descripcion" id="contenido_titulo" class="des_titulo" cols="30" rows="10"></textarea>
					</div>
					<input type="submit" value="Añadir" class="btn_anadir">
					<input type="button" value="Cerrar" id="volver" class="btn_anadir btn_cerrar">
					<div id="msgFormulario"></div>
				</form>
				</div>
				<div class="resumen_estadistico">
					<h3>Resumen Estadístico Mensual </h3>
					<form id="frmResumen" action="#" method="POST">

					<input type="hidden" name="funcionario" value="<?php echo $id_usuario; ?>">
						<select name="evaluador" id="evaluador2">
						</select>
					<table>
						<thead>
							<tr>
								<td class="td_fecha">
									FECHA <input type="text" name="fecha2" id="fecha2" class="fecha_resumen"/></td>
								<td>Total REC</td>
								<td>TOTAL C/R</td>
								<td>TOTAL S/R</td>
							</tr>
						</thead>
						<tbody id="r_tipos">
							<tr>
								<td>ORDENES DE INVESTIGAR</td>
								<td><input type="text" name="investigar_rec" value="0"></td>
								<td><input type="text" name="investigar_cr" value="0"></td>
								<td><input type="text" name="investigar_sr" value="0"></td>
							</tr>
							<tr>
								<td>ORDENES DE DETENCIÓN</td>
								<td><input type="text" name="detencion_rec" value="0"></td>
								<td><input type="text" name="detencion_cr" value="0"></td>
								<td><input type="text" name="detencion_sr" value="0"></td>
							</tr>
							<tr>
								<td>ORDENES DE POR GIRDOC</td>
								<td><input type="text" name="girdoc_rec" value="0"></td>
								<td><input type="text" name="girdoc_cr" value="0"></td>
								<td><input type="text" name="girdoc_sr" value="0"></td>
							</tr>
							<tr>
								<td>ORDENES DE ARRESTO</td>
								<td><input type="text" name="arresto_rec" value="0"></td>
								<td><input type="text" name="arresto_cr" value="0"></td>
								<td><input type="text" name="arresto_sr" value="0"></td>
							</tr>
							<tr>
								<td>TRAM. Y/O INSTRUCCIONES</td>
								<td><input type="text" name="instrucciones_rec" value="0"></td>
								<td><input type="text" name="instrucciones_cr" value="0"></td>
								<td><input type="text" name="instrucciones_sr" value="0"></td>
							</tr>
							<tr>
								<td>CITACIONES</td>
								<td><input type="text" name="citaciones_rec" value="0"></td>
								<td><input type="text" name="citaciones_cr" value="0"></td>
								<td><input type="text" name="citaciones_sr" value="0"></td>
							</tr>
							<tr>
								<td>ORDENES VERBALES</td>
								<td><input type="text" name="verbales" value="0"></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>DETENIDOS AL JUZGADO</td>
								<td><input type="text" name="detenidosjuzgados" value="0"></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>SERVICIOS DE GUARDIA</td>
								<td><input type="text" name="guardia" value="0"></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>COMISIONES DE SERVICIO</td>
								<td><input type="text" name="comision_servicio" value="0"></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>CONTROLES DE IDENTIDAD</td>
								<td><input type="text" name="controles_identidad" value="0"></td>
								<td></td>
								<td></td>
							</tr>				
						</tbody>
					</table>
					<div>
						<h3>Evaluación</h3>
						<textarea name="evaluacion" id="evaluacion_resumen" class="evaluacion_mes" cols="80" rows="10"></textarea>
					</div>
					<input type="submit" value="Guardar" class="btn_rs" />
					<input type="button" value="Cerrar" id="volver2" class="btn_rs btn_close" />
					<div id="msgResumen"></div>
					</form>
				</div>
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

   		$.ajax({
			url:"../controlador/cargarEvaluador.php",
			success:function(respuesta){
				$('#evaluador').html(respuesta);
			}
		});
		$.ajax({
			url:"../controlador/cargarEvaluador.php",
			success:function(respuesta){
				$('#evaluador2').html(respuesta);
			}
		});

   		$(".link_title").click(function(event) {
   			var valor = $(this).text();
   			var idtitulo = $(this).attr("id");
   			$("#title_form").text(valor);
   			$("#hidden").val(idtitulo);

   		});
   		

		$('#frmTitulo').submit(function(){
    		$.ajax({
    			data:$(this).serialize(),
    			url:"../controlador/insertarTitulo.php",
    			type:"POST",
    			beforeSend:function(){
									$('#msgFormulario').html('<img src="../loading.gif"/ width=60> verificando');
								},
				success:function(respuesta){
					console.log(respuesta);
									if(respuesta=="1"){
										$('#msgFormulario').html("Titulo ingresado correctamente");
										
									}else 
										if(respuesta=="2"){
										$('#msgFormulario').html("No se pudieron ingresar los datos");
										
										}else{
											$('#msgFormulario').html("No existen los valores indicados...");
										}
								}	

    		});
    		return false;
    	});

 
		$('#frmResumen').submit(function(){
    		$.ajax({
    			data:$(this).serialize(),
    			url:"../controlador/insertarResumen.php",
    			type:"POST",
    			beforeSend:function(){
									$('#msgResumen').html('<img src="../loading.gif"/ width=60> verificando');
								},
				success:function(respuesta){
					console.log(respuesta);
									if(respuesta=="1"){
										$('#msgResumen').html("Titulo ingresado correctamente");
										
									}else 
										if(respuesta=="2"){
										$('#msgResumen').html("No se pudieron ingresar los datos");
										
										}else{
											$('#msgResumen').html("No existen los valores indicados...");
									}
								}	

    		});
    		return false;
    	});

   	});
   	</script>
</body>
</html> 