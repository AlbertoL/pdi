$(document).ready(function() {
	$.ajax({
		url: '../controlador/listarcategoria.php',
		beforeSend:function(){
			$('#listarcategoria').html('Cargando categorias...');
		},
		success:function(x){
			$('#listarcategoria').html(x);
			console.log(x);
		}
	});	
});