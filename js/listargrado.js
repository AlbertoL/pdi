$(document).ready(function() {
	$.ajax({
		url: '../controlador/listargrado.php',
		beforeSend:function(){
			$('#listargrado').html('Cargando grados...');
		},
		success:function(x){
			$('#listargrado').html(x);
			console.log(x);
		}
	});	
});