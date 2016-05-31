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
		<h1 class="title_hva">Editar Unidad</h1>

		<section class="body_hva">
		
			<article id="frm" class="cont_empleado">
			<form id="frmUnidad" action="#" name="frmUnidad" method="POST">
				<div>
					<div>
						<label for="un">Editar Unidad</label>
						<div id="un"></div>
						<div id="msgUnidad"></div>
					</div>
					
				</div>
				<div id="mostrarFormulario">
					
					<div>
						<label for="c_region">Región</label>
						<div id="c_region" name="c_region"></div>
					</div>
					<div>
						<div id="c_provincia" name="c_provincia"></div>
					</div>
					<div>
						
						<div id="c_comuna" name="c_comuna"></div>
					</div>
					<div>
						<label for="unidad">Unidad Superior</label>
						<div id="unidad">
						</div>
					</div>
					<div>
							<input id="boton" type="submit" name="enviar" id="enviar" class="cl_enviar" value="Modificar" />
					</div>
					<div id="msgFormulario"></div>
				</div>
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
    		$('#un').change(function() {
    			var id = $('#unidad1').val();
    			$.ajax({
    							data:"id="+$('#unidad1').val(),
    							url:"../controlador/buscarUnidad.php",
    							type:"POST",
    							beforeSend:function(){
									$('#msgUnidad').html('<img src="../loading.gif"/ width=60> verificando');
								},
								success:function(respuesta){
									console.log(respuesta);
									if(respuesta=='0'){
										localStorage.setItem('id_unidad',$('#unidad1').val());
										$('#msgUnidad').html("Unidad no se encuentra disponible");
										$('#mostrarFormulario').hide();
									}else{
										$('#msgUnidad').html(respuesta);
										$('#mostrarFormulario').show();							
									
									}
								}	
    						});
    		});
    					

 });
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			url:"../controlador/cargarRegion.php",
			success:function(respuesta){
				$('#c_region').html(respuesta);
			}
		});

		$('#c_region').change(function(){
		var id_region=$("#region option:selected").val();
		$.ajax({
			data:"region="+id_region,
			type:"POST",
			url:"../controlador/cargarProvincia.php",
			success:function(respuesta){
				$('#c_provincia').html(respuesta);
			}

		});
	});

	$('#c_provincia').change(function(){
		var id_provincia=$("#provincia option:selected").val();
		$.ajax({
			data:"provincia="+id_provincia,
			type:"POST",
			url:"../controlador/cargarComuna.php",
			success:function(respuesta){
				$('#c_comuna').html(respuesta);
			}
		});
	});
	$.ajax({
		url: '../controlador/listarunidad.php',
		beforeSend:function(){
			$('#unidad').html('Cargando Unidad...');
		},
		success:function(x){
			$('#unidad').html(x);
			console.log(x);
		}
	});
	$.ajax({
		url: '../controlador/listarunidad1.php',
		beforeSend:function(){
			$('#un').html('Cargando Unidad...');
		},
		success:function(x){
			$('#un').html(x);
			console.log(x);
		}
	});
	$('#frmUnidad').submit(function(){
    		$.ajax({
    			data:$(this).serialize(),
    			url:"../controlador/modificarUnidad.php",
    			type:"POST",
    			beforeSend:function(){
									$('#msgFormulario').html('<img src="../loading.gif"/ width=40> verificando');
								},
				success:function(respuesta){
					console.log(respuesta);
									if(respuesta=="1"){
										$('#mostrarFormulario').html("Funcionario actualizado correctamente");
										
									}else if(respuesta=="2"){
										$('#mostrarFormulario').html("Usuario no existe");
										
									}else{
										$('#mostrarFormulario').html("No existen los valores indicados...");
									}
								}	

    		});
    		return false;
    	});

});
</script>

</body>
</html>