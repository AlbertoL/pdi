$(document).ready(function() {
	
	$.ajax({
		url: '../controlador/listarunidadsinjefe.php',
		beforeSend:function(){
			$('#listrarunidadsinjefe').html('Cargando Unidaddes sin jefatura...');
		},
		success:function(x){
			$('#listrarunidadsinjefe').html(x);
			console.log(x);
		}
	});	
});