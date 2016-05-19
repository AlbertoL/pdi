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
		<h1 class="title_hva">Nuevo Título</h1>

		<section class="body_hva">
		
			<article id="frm" class="cont_empleado">
			<form id="frmTitulo" action="#" name="frmTitulo" method="POST">
					<div>
						<label for="nombre">Nombre Título</label>
						<input type="text" id="nombret" class="cl_nombre" name="nombret"/>
						<div id="listartipocat"></div>
					</div>
					<div>
						<input id="boton" type="submit" name="enviar" id="enviar" class="cl_enviar" value="Guardar"/>
					</div>
					<div id="msgFormulario"></div>
				</form>
			</article>
		</section>
		</div>
		<?php
		include '../vistas/footer.php';
		?>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/modernizr.js"></script>
	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/listartipocat.js"></script>
	<script src="../js/validar.js"></script>
	<script type="text/javascript">

	$('#frmTitulo').submit(function(){
    		$.ajax({
    			data:$(this).serialize(),
    			url:"../controlador/crearTitulo.php",
    			type:"POST",
    			beforeSend:function(){
									$('#msgFormulario').html('<img src="../loading.gif"/ width=60> verificando');
								},
				success:function(respuesta){
					console.log(respuesta);
									if(respuesta=="1"){
										$('#msgFormulario').html("Título ingresado correctamente");
										
									}else 
										if(respuesta=="2"){
										$('#msgFormulario').html("El Título ya se encuentra en nuestros registros");
										
										}else{
											$('#msgFormulario').html("No existen los valores indicados...");
									}
								}	

    		});
    		return false;
    	});
</script>
</body>
</html>