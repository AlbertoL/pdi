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
		<h1 class="title_hva">Editar Información</h1>
		<section class="body_hva">
		<form id="frmUsuario" action="#">
			<article class="cont_empleado">
				<div>
					<label for="rut">Rut</label> <input type="text" name="username" id="username" class="rut_class" autocomplete="off" placeholder="x.xxx.xxx-x"/>
					<div id="msgUsuario"></div>
				</div>
				<div id="mostrarFormulario">
					
					<div id="listarunidad2"></div>
						<div id="listarcargo"></div>
						<div id="listrarunidadsinjefe"></div>
						<div id="listargrado"></div>
						<div id="listarcategoria"></div>
					<div>
						<input type="submit" name="enviar" id="enviar" class="cl_enviar" value="Guardar" />
					</div>
					<div id="msgFormulario" ></div>
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
    							url:"../controlador/buscarUsuario2.php",
    							type:"POST",
    							beforeSend:function(){
									$('#msgUsuario').html('<img src="../loading.gif"/ width=60> verificando');
								},
								success:function(respuesta){
									if(respuesta=='0'){
										localStorage.setItem('rut_Usuario',$('#username').val());
										$('#msgUsuario').html("Funcionario disponible");
										$('#mostrarFormulario').hide();
									}else{
										$('#msgUsuario').html(respuesta);
										$('#mostrarFormulario').show();
										$.ajax({
												data:"rutUsuario="+$('#username').val(),
												url: '../controlador/listargrado.php',
												type:"POST",
												beforeSend:function(){
													$('#listargrado').html('Cargando grados...');
												},
												success:function(x){
													$('#listargrado').html(x);
					
												}
										});
										$.ajax({
											    data:"rutUsuario="+$('#username').val(),
												url: '../controlador/listarcargo.php',
												type:"POST",
												beforeSend:function(){
												$('#listarcargo').html('Cargando grados...');
												},
												success:function(x){
												$('#listarcargo').html(x);
			
												}
										});	

										$.ajax({
											    data:"rutUsuario="+$('#username').val(),
												url: '../controlador/listarcategoria.php',
												type:"POST",
												beforeSend:function(){
												$('#listarcategoria').html('Cargando categorias...');
												},
												success:function(x){
												$('#listarcategoria').html(x);
												}
										});	
										$.ajax({
											    data:"rutUsuario="+$('#username').val(),
												url: '../controlador/listarunidad.php',
												type:"POST",
												beforeSend:function(){
												$('#listarunidad2').html('Cargando Unidad...');
												},
												success:function(x){
												$('#listarunidad2').html(x);
												}
										});

											$.ajax({
												data:"rutUsuario="+$('#username').val(),
												url: '../controlador/listarunidadsinjefe.php',
												type:"POST",
												beforeSend:function(){
												$('#listrarunidadsinjefe').html('Cargando Unidaddes sin jefatura...');
												},
												success:function(x){
												$('#listrarunidadsinjefe').html(x);
												}
										});		
										
									
									}
								}	
    						});


    				},
   					 format_on: 'keyup'
    					});
    			});
    </script>
    
	<script type="text/javascript">
    	$(document).ready(function() {
		function listarGrado(){
			$.ajax({
				data:"rutUsuario="+$('#username').val(),
				url: '../controlador/listargrado.php',
				type:"POST",
				beforeSend:function(){
					$('#listargrado').html('Cargando grados...');
				},
				success:function(x){
					$('#listargrado').html(x);
					
				}
			});
		}
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
    			url:"../controlador/modificarFuncionario.php",
    			type:"POST",
    			beforeSend:function(){
									$('#msgFormulario').html('<img src="../loading.gif"/ width=60> verificando');
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
	<script src="../js/funcion.js"></script>
</body>
</html>