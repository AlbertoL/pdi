<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
	<title>Panel</title>
	<link rel="stylesheet" href="../css/normalize.css"/>
	<link rel="stylesheet" href="../css/font-awesome.css"/>
	<link rel="stylesheet" href="../css/estilos-form.css"/>
	<link rel="stylesheet" href="../css/jquery-ui.min.css"/>
</head>
<body>
	<div class="content_global">
	<?php
		include '../vistas/header.php';
	?>
		<div class="body_content">
			<?php
			include '../vistas/menu-lateral.php';
			?>
			<div class="contenedor-section">
				<article id="frm" class="c-form">
				<form id="frmUnidad" action="#" name="frmUnidad" method="Post">
				<h3>Editar Unidad <i class="flotar fa fa-building" aria-hidden="true"></i></h3>
				<div>
					<div>
						<div id="un"></div>
						<div id="msgUnidad"></div>
					</div>	
				</div>
				<div id="mostrarFormulario">
					
					<div>
						<label for="c_region"><i class="fa fa-map-marker" aria-hidden="true"></i> Región</label>
						<div id="c_region" name="c_region"></div>
					</div>
					<div>
						<div id="c_provincia" name="c_provincia"></div>
					</div>
					<div>
						
						<div id="c_comuna" name="c_comuna"></div>
					</div>
					<div>
						<label for="unidad"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> Unidad Superior</label>
						<div id="unidad">
						</div>
					</div>
					<div>
					<input id="boton" type="submit" name="enviar" id="enviar" class="btn-reg" value="Modificar" />
					</div>
					<div id="msgFormulario"></div>
				</div>
				</form>
				</article>
			</div>

		</div>
		<?php
		include '../vistas/footer.php';
		?>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/modernizr.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/jquery.Rut.min.js"></script>
	<script src="../js/validarunidad.js"></script>
	<script src="../js/m-unidad.js"></script>
</body>
</html>