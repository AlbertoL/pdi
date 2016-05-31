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
				<form id="frmUnidad" action="#" name="frmUnidad" method="Post">
				<article id="frm" class="c-form">
				<h3>Nueva Unidad <i class="flotar fa fa-building" aria-hidden="true"></i></h3>
					<div>
				<label for="nombre"><i class="fa fa-building" aria-hidden="true"></i> Nombre Unidad</label><input type="text" id="nombre" class="nombre" name="nombre"/>
				</div>
				<div>
					<label for="sigla"><i class="fa fa-bookmark" aria-hidden="true"></i> Sigla Unidad</label>
					<input type="text" id="sigla" class="sigla" name="sigla"/>
				</div>
				<div>
					<label for="descripcion"><i class="fa fa-file-text-o" aria-hidden="true"></i> Descripción</label>
					<input type="text" id="descripcion" class="desc" name="descripcion"/>
				</div>
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
						<input id="boton" type="submit" name="enviar" id="enviar" class="btn-reg" value="Registrar" />
				</div>
					<div id="msgFormulario"></div>
				</article>
				</form>
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
	<script src="../js/n-unidad.js"></script>
</body>
</html>