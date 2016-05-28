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
				<form id="frmUsuario" action="#" name="frmUsuario" method="Post">
				<article id="frm" class="c-form">
				<h3>Editar Funcionario <i class="flotar fa fa-user-plus" aria-hidden="true"></i></h3>
					<div class="b-rut">
						<label for="rut"><i class="fa fa-search" aria-hidden="true"></i> Rut</label> <input type="text" name="username" id="username" class="rut_class" autocomplete="off" placeholder="x.xxx.xxx-x"/>
						<div id="msgUsuario"></div>
					</div>
					<div id="mostrarFormulario" class="show-form">
						<!-- <div>
							<label for="name"><i class="fa fa-user" aria-hidden="true"></i> Nombres</label> <input type="text" name="nombre" id="nombre" class="cl_nombre" placeholder="Escriba sus nombres" required/>
						</div>
						<div>
							<label for="apellidos"><i class="fa fa-user" aria-hidden="true"></i> Apellidos</label> <input type="text" name="apellido" id="apellido" class="last" placeholder="Escriba sus apellidos" required/>
						</div>
						<div>
							<label for="clave"><i class="fa fa-lock" aria-hidden="true"></i> Contraseña</label> <input type="password" name="clave" id="clave" class="cl_nombre" placeholder="Ingrese su password" required/>
						</div>
						<div>
							<label for="fecha1"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de Ingreso</label><input type="text" name="fecha" id="fecha1" class="cl_nombre" placeholder="dd/mm/aaaa" required/>
						</div> -->
						<div id="listarunidad2"></div>
						<div id="listarcargo"></div>
						<div id="listrarunidadsinjefe"></div>
						<div id="listargrado"></div>
						<div id="listarcategoria"></div>
						<div>
							<input id="boton" type="submit" name="enviar" id="enviar" class="btn-reg" value="Registrar" />
						</div>
						<div id="msgFormulario"></div>
					</div>
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
	<script src="../js/validar.js"></script>
	<script src="../js/m-funcionario.js"></script>
</body>
</html>