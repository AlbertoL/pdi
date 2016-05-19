<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';
sleep(2);
$db=new conexion();
$db->conectar();
$id_usuario = intval($_GET['id']);
$consulta=$db->consulta("SELECT id_usuario, nombres_usu, apellidos_usu FROM usuarios WHERE id_usuario = '".$id_usuario."'");
if (!$db->num_rows($consulta)>0) {
	header('Location: ./hva.php');
}
else{
	while($row=$db->fetch_array($consulta)){
		$idusu = $row[0];
		$nombreusu = $row[1];
		$apellidousu =$row[2];
	}
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
			<h1 class="title">Resumen Estadístico - <?php echo $nombreusu.' '.$apellidousu;  ?></h1>
			<section class="panel_edition">
				<article class="list_editar">
					<form id="buscarResumen" method="POST" action="#">
					<input type="hidden" name="idusu" id="usuario" value="<?php echo "$idusu"; ?>">
					<span>Fecha</span>
				
					<select name="fecha" id="fecha" requerid>
						<option value="1">Enero</option>
						<option value="2">Febrero</option>
						<option value="3">Marzo</option>
						<option value="4">Abril</option>
						<option value="5">Mayo</option>
						<option value="6">Junio</option>
						<option value="7">Julio</option>
						<option value="8">Agosto</option>
						<option value="9">Septiembre</option>
						<option value="10">Octubre</option>
						<option value="11">Noviembre</option>
						<option value="12">Diciembre</option>
					</select>
					<input type="submit" name="filtrar" id="filtrar" class="btn_filtrar" value="Filtrar" />
					</form>
					<table>
						<thead class="cabecera">
							<tr>
								<td class="td_fecha">
									</td>
								<td>Total REC</td>
								<td>TOTAL C/R</td>
								<td>TOTAL S/R</td>
							</tr>
						</thead>
						<tbody id="r_tipos">
							
						</tbody>
					</table>
				
				</article>
				<div id="chart_div">
      
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
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
  	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript">
  		google.load('visualization', '1', {'packages':['corechart']});
	</script>
	<script type="text/javascript">
	$(document).ready(function() {

		$.ajax({
			url:"../controlador/cargarEvaluador.php",
			success:function(respuesta){
				$('#evaluador').html(respuesta);
			}
		});

		$('#buscarResumen').submit(function(){
			$.ajax({
    			data:$(this).serialize(),
    			url:"../controlador/listarResumen.php",
    			type:"POST",
    			beforeSend:function(){
					$('#r_tipos').html('Cargando resumen...');
				},
				success:function(x){
					console.log(x);
					$('#r_tipos').html(x);
				}
    		});

			$.ajax({
			data:$(this).serialize(),
    		url:"../controlador/datosgrafica.php",
    		type:"POST",
    		success:function(resp){
      			var data = new google.visualization.DataTable(resp);
            	var options = {
              		title: 'Grafico',
              		is3D: 'true',
              		width: 800,
              		height: 600
            		};
            		var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            		chart.draw(data, options);
        	}
    		
      });

    		return false;
		});
		
});
	</script>
</body>
</html>