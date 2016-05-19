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
	<link rel="stylesheet" href="../css/estilos-panel.css"/>
</head>
<body>
	<div class="content_global">
	<?php
		include '../vistas/header.php';
	?>
		<div class="body_content">
			<h1 class="title_hva">Hoja de Vida Anual</h1>
			<div id="cargarFormulario">
				<form action="#" method="post" id="buscarFuncionario" name="buscarFuncionario">
				<input type="search" id="search" class="search" name="search" placeholder="Ingresar Rut" autofocus/> 
				<input type="submit" id="btn_button" class="btn_button" value="Buscar"/>
				<div id="msgUsuario">	
				</div>
				</form>
			</div>
		<section id="listar" class="body_hva">
	
		</section>
		</div>
		<?php
		include '../vistas/footer.php';
		?>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/modernizr.js"></script>
	<script src="../js/listarfuncionarios.js"></script>
	<script src="../js/jquery.Rut.min.js"></script>

	<script type="text/javascript">
    			$(document).ready(function(){
   				 $('#search').Rut({
    					on_error: function(){ $('#boton').attr("disabled", true); $("#msgUsuario").html("Rut Incorrecto")},
    					on_success:  function(){ 
    						$('#boton').attr("disabled", false);$("#msgUsuario").html("")},
   					 format_on: 'keyup'
    					});
    			});
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    	$('#buscarFuncionario').submit(function(){
    		$.ajax({
    			data:$(this).serialize(),
    			url:"../controlador/listarfuncionario.php",
    			type:"POST",
    			beforeSend:function(){
					$('#listar').html('Cargando funcionarios...');
				},
				success:function(x){
					$('#listar').html(x);
					
				}
    		});
    		return false;
    	});
    });
    </script>
</body>
</html>