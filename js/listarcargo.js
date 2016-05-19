$(document).ready(function() {
	$.ajax({
		url: '../controlador/listarcargo.php',
		beforeSend:function(){
			$('#listarcargo').html('Cargando grados...');
		},
		success:function(x){
			$('#listarcargo').html(x);
			console.log(x);
		}
	});	
});