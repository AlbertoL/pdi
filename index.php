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
			<div class="logo"></div>
			<form id="frmUsuario" name="frmUsuario" action="#" method="Post">
				<input type="text" id="username" name="username" class="rut" autocomplete="off" placeholder="Rut"/>
				<div id="msgUsuario" ></div><div id="datos" name="datos"></div>
				<input type="password" id="pass" class="pass" name="clave" autocomplete="off" placeholder="Contraseña"/>
				<div id="retorno_d_Unidad">
					
				</div>
				<input id="boton" class="entrar" type="submit" value="Entrar" />
			</form>
			<a id="load" href="./contacto.php">¿Olvidaste tu contraseña?</a>
		</article>
	</section>
	<script src="js/jquery.js"></script>
	<script src="js/modernizr.js"></script>
	<script src="js/procesar.js"></script>
	<script src="js/jquery.Rut.min.js"></script>
	<script type="text/javascript">
    			$(document).ready(function(){
   				 $('#username').Rut({
    					on_error: function(){ $('#boton').attr("disabled", true); $("#msgUsuario").html("Rut Incorrecto")},
    					on_success:  function(){ 
    						$('#boton').attr("disabled", false);$("#msgUsuario").html("")
    						$.ajax({
    							data:"rut="+$('#username').val(),
    							url:"./controlador/comprobarUsuario.php",
    							type:"POST",
    							beforeSend:function(){
									$('#load').html('<img src="./loading.gif"/ width=60> verificando');
								},
								success:function(respuesta){
									$('#retorno_d_Unidad').html(respuesta);
									$('#load').html('');
								}	
    						});
    						return false;
    					},
   					 format_on: 'keyup'
    					});
    			});
    </script>

</body>
</html>