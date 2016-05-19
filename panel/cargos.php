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
	<link rel="stylesheet" href="../css/opciones.css"/>
</head>
<body>
	<div class="content_global">
	<?php
		include '../vistas/header.php';
	?>
		<div class="body_content">
		<h1 class="title_hva">Editar Información</h1>
		<section class="body_hva">
		<div class="cont_search">
			<form action="#">
			<input type="text" id="search" class="cl_search" placeholder="Rut"/>
			<input type="button" id="btn_search" class="btn_search" value="Buscar" />
			</form>
		</div>
		<form action="#">
			<article class="cont_cargo">
				<table>
					<thead>
						<tr>
							<th>Rut</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Cargos</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>11.111.111-1</td>
							<td>Juan Ignacio</td>
							<td>Pérez Aldea</td>
							<td>
								<select name="cargo" id="idcargo" class="clcargo">
									<option value="1">Ninguno</option>
									<option value="2">Jefe Subrogante</option>
								</select>
							</td>
							<td><a href="#">Actualizar</a></td>
						</tr>
					</tbody>
				</table>
			</article>
		</form>
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