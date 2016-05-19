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
		<h1 class="title_hva">Editar Título</h1>

		<section class="body_hva">
		
			<article id="frm" class="cont_empleado">
			<form id="frmTitulo" action="#" name="frmTitulo" method="POST">
					<div>
						<label for="nombt">Editar Titulo</label>
						<div id="nt"></div>
						<div id="msgTitulo"></div>
					   </div>
						<div id="mostrarFormulario">
						<div>
						<label for="tc">Tipo Titulo</label>
						<div id="listartipocat">
						</div>

					    </div>
					<div>
						<input id="boton" type="submit" name="enviar" id="enviar" class="cl_enviar" value="Modificar" />
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
	<script src="../js/validar.js"></script>
	<script type="text/javascript">

	    $(document).ready(function(){
    	$('#mostrarFormulario').hide();
    		$('#nt').change(function() {
    			var id = $('#titulo1').val();
    			$.ajax({
    							data:"id="+$('#titulo1').val(),
    							url:"../controlador/buscarTitulo.php",
    							type:"POST",
    							beforeSend:function(){
									$('#msgTitulo').html('<img src="../loading.gif"/ width=60> verificando');
								},
								success:function(respuesta){
									console.log(respuesta);
									if(respuesta=='0'){
										localStorage.setItem('id_categoria_det',$('#titulo1').val());
										$('#msgTitulo').html("Titulo no disponible");
										$('#mostrarFormulario').hide();
									}else{
										$('#msgTitulo').html(respuesta);
										$('#mostrarFormulario').show();							
									
									}

								}	
    						});
    		});
  });
</script>
<script type="text/javascript">
	$.ajax({
		url: '../controlador/listartipocat.php',
		beforeSend:function(){
			$('#listartipocat').html('Cargando ...');
		},
		success:function(x){
			$('#listartipocat').html(x);
			console.log(x);
		}
	});
	$.ajax({
		url: '../controlador/listartitulosedit.php',
		beforeSend:function(){
			$('#nt').html('Cargando titulo...');
		},
		success:function(x){
			$('#nt').html(x);
			console.log(x);
		}
	});
	$('#frmTitulo').submit(function(){
    		$.ajax({
    			data:$(this).serialize(),
    			url:"../controlador/modificarTitle.php",
    			type:"POST",
    			beforeSend:function(){
									$('#msgFormulario').html('<img src="../loading.gif"/ width=40> verificando');
								},
				success:function(respuesta){
					console.log(respuesta);
									if(respuesta=="1"){
										$('#mostrarFormulario').html("actualizado correctamente");
										
									}else if(respuesta=="2"){
										$('#mostrarFormulario').html(" no existe");
										
									}else{
										$('#mostrarFormulario').html("No existen los valores indicados...");
									}
								}	

    		});
    		return false;
    	});


</script>
</body>
</html>