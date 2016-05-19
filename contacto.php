<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="css/normalize.css"/>
	<link rel="stylesheet" href="css/estilos.css"/>
</head>
<body>
	<section class="content">
		<article class="cont_form">
		<h1 class="title_contacto">CONTACTO</h1>
			<form action="#">
					<input type="text" name="name" id="id_name" class="cl_name" placeholder="Nombre"/>
					<input type="email" name="email" id="mail" class="c_mail" placeholder="E-mail"/>
					<input type="text" name="asunto" id="id_asunto" class="cl_subjet" placeholder="Asunto"/>
					<textarea name="comentario" id="id_comment" class="cl_comment" cols="30" rows="10" placeholder="Ingrese su Mensaje"></textarea>
					<input type="submit" value="Enviar" class="entrar" />
				</form>
		</article>
	</section>
	<script src="js/jquery.js"></script>
	<script src="js/foco.js"></script>
	<script src="js/modernizr.js"></script>
</body>
</html>