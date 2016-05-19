$(document).ready(function() {
	
	$.ajax({
		url: '../controlador/listarfuncionario.php',
		beforeSend:function(){
			$('#listar').html('Cargando funcionarios...');
		},
		success:function(x){
			$('#listar').html(x);
			console.log(x);
		}
	});	
});