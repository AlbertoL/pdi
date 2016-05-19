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
	<link rel="stylesheet" href="../css/estilos-opciones.css"/>
</head>
<body>
	<div class="content_global">
	<?php
		include '../vistas/header.php';
	?>
		<div class="body_content">
		<h1 class="title_hva">Panel De Opciones</h1>

		<section class="body_hva">
			<article class="opciones">
				<h2>Funcionarios</h2>
				<div class="sublogo"><img src="../img/user.png" alt="logo_use"></div>
				<div class="links">
					<span><a href="./nuevo-funcionario.php" class="nuevo">Añadir Nuevo</a></span>
					<span><a href="./mod-usuario.php" class="editar">Modificar</a></span>
				</div>
			</article>
			<article class="opciones">
				<h2>Títulos</h2>
				<div class="sublogo"><img src="../img/titulos.png" alt="logo_titulo"></div>
				<div class="links">
					<span><a href="./nuevo-titulo.php" class="nuevo">Añadir Nuevo</a></span>
					<span><a href="./editar-titulo.php" class="editar">Modificar</a></span>
				</div>
			</article>
			<article class="opciones">
				<h2>Unidad</h2>
				<div class="sublogo"><img src="../img/unidad.png" alt="logo_unidad"></div>
				<div class="links">
					<span><a href="./nueva-unidad.php" class="nuevo">Nuevo</a></span>
					<span><a href="./editar-unidad.php" class="editar">Editar</a></span>
				</div>
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
</body>
</html>