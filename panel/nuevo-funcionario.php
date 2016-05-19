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
	<link rel="stylesheet" href="../css/jquery-ui.min.css"/>
	
</head>
<body>
	<div class="content_global">
	<?php
		include '../vistas/header.php';
	?>
		<div class="body_content">
		<h1 class="title_hva">Nuevo Funcionario</h1>

		<section class="body_hva">
		
			<form id="frmUsuario" action="#" name="frmUsuario" method="Post">
			<article id="frm" class="cont_empleado">
				<div>
					<label for="rut">Rut</label> <input type="text" name="username" id="username" class="rut_class" autocomplete="off" placeholder="x.xxx.xxx-x"/>
					<div id="msgUsuario" ></div>
				</div>
				<div id="mostrarFormulario">
					<div>
						<label for="name">Nombres</label> <input type="text" name="nombre" id="nombre" class="cl_nombre" placeholder="Escriba sus nombres" required/>
					</div>
					<div>
						<label for="apellidos">Apellidos</label> <input type="text" name="apellido" id="apellido" class="last" placeholder="Escriba sus apellidos" required/>
					</div>
					<div>
						<label for="clave">Contraseña</label> <input type="password" name="clave" id="clave" class="cl_nombre" placeholder="Ingrese su password" required/>
					</div>
					<div>
						<label for="fecha1">Fecha de Ingreso</label> <input type="text" name="fecha" id="fecha1" class="cl_nombre" placeholder="dd/mm/aaaa" required/>
					</div>
					<div id="listarunidad2"></div>
					<div id="listarcargo"></div>
					<div id="listrarunidadsinjefe"></div>
					<div id="listargrado"></div>
					<div id="listarcategoria"></div>
					<div>
						<input id="boton" type="submit" name="enviar" id="enviar" class="cl_enviar" value="Registrar" />
					</div>
					<div id="msgFormulario"></div>
				</div>
			</article>
			</form>
		</section>
		</div>
		<?php
		include '../vistas/footer.php';
		?>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/modernizr.js"></script>
	<script src="../js/listargrado.js"></script>
	<script src="../js/listarcategoria.js"></script>
	<script src="../js/listarunidad.js"></script>
	<script src="../js/listarcargo.js"></script>
	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/jquery.Rut.min.js"></script>
	<script src="../js/validar.js"></script>
	<script type="text/javascript">
    			$(document).ready(function(){
    				$('#mostrarFormulario').hide();
   				 	$('#username').Rut({
    					on_error: function(){; $('#boton').attr("disabled", true); $("#msgUsuario").html("Rut Incorrecto")},
    					on_success:  function(){ $('#boton').attr("disabled", false);$("#msgUsuario").html("")
    					$.ajax({
    							data:"rut="+$('#username').val(),
    							url:"../controlador/buscarUsuario.php",
    							type:"POST",
    							beforeSend:function(){
									$('#msgUsuario').html('<img src="../loading.gif"/ width=60> verificando');
								},
								success:function(respuesta){
									if(respuesta=='1'){
										$('#msgUsuario').html("Funcionario se encuentra registrado");
										$('#mostrarFormulario').hide();
									}else{
										$('#msgUsuario').html("Funcionario se encuentra disponible");
										$('#mostrarFormulario').show();
									}
								}	
    						});


    				},
   					 format_on: 'keyup'
    					});
    			});
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    	$('#listarcargo').change(function(){
    		var valor=$('#cargo').val();
    		if(valor==1 || valor==2){
    			$.ajax({
					url: '../controlador/listarunidadsinjefe.php',
					beforeSend:function(){
						$('#listrarunidadsinjefe').html('Cargando Unidaddes sin jefatura...');
					},
					success:function(x){
						$('#listrarunidadsinjefe').html(x);
						
					}
				});	
    		}else{
    			$('#listrarunidadsinjefe').html("");
    		}
    	});
    	$('#frmUsuario').submit(function(){
    		$.ajax({
    			data:$(this).serialize(),
    			url:"../controlador/insertarFuncionario.php",
    			type:"POST",
    			beforeSend:function(){
									$('#msgFormulario').html('<img src="../loading.gif"/ width=60> verificando');
								},
				success:function(respuesta){
					console.log(respuesta);
									if(respuesta=="1"){
										$('#mostrarFormulario').html("Funcionario ingresado correctamente");
										
									}else if(respuesta=="2"){
										$('#mostrarFormulario').html("Usuario ya se encuentra en nuestros registros");
										
									}else{
										$('#mostrarFormulario').html("No existen los valores indicados...");
									}
								}	

    		});
    		return false;
    	});
    });
    </script>
	<script src="../js/funcion.js"></script>
</body>
</html>