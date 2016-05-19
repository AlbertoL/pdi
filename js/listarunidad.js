$(document).ready(function() {
	
	$.ajax({
		url: '../controlador/listarunidad.php',
		beforeSend:function(){
			$('#listarunidad2').html('Cargando Unidad...');
		},
		success:function(x){
			$('#listarunidad2').html(x);
			console.log(x);
		}
	});	
});