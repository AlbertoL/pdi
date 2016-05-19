$(document).ready(function() {
	$.ajax({
		url: '../controlador/listartipocat.php',
		beforeSend:function(){
			$('#listartipocat').html('Cargando tipos...');
		},
		success:function(x){
			$('#listartipocat').html(x);
			console.log(x);
		}
	});	
});