<?php
include '../controlador/sesion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
	<title>Panel</title>
	<link rel="stylesheet" href="../css/normalize.css"/>
	<link rel="stylesheet" href="../css/estilos-panel.css"/>
</head>
<body>
	<div class="content_global">
	<?php
		include '../vistas/header.php';
	?>
		<div class="body_content">
			<h1>Panel De Administración</h1>
			<section class="section_panel">
				<article class="hva">
					<img src="../img/hva.png" alt="icono_hoja_de_vida"/>
					<h3 class="subtitle">Hoja De Vida Anual</h3>
					<p>
					Panel destinado a registrar el desempeño y actividades realizadas por funcionarios de la Policía de Investigaciones de Chile.
					</p>
				</article>
				<article class="option">
					<img src="../img/opciones.png" alt="icono_opciones"/>
					<h3 class="subtitle">Opciones Del Sistema</h3>
					<p>
					Cree y cambie las características del sistema, agregando nuevos títulos y categorías correspondientes a su unidad.
					</p>
				</article>
				<article class="alert">
					<img src="../img/alert2.png" alt="icono_alert"/>
					<h3 class="subtitle">Notificaciones</h3>
					<p>
						Información de incidentes más relevantes, referente a los funcionarios de ésta unidad.
					</p>
				</article>
			</section>
		</div>
		<?php
		include '../vistas/footer.php';
		?>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/modernizr.js"></script>
	<script src="../js/funcion.js"></script>
	<script type="text/javascript">
	</script>
</body>
</html>