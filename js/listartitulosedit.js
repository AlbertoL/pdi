$(document).ready(function() {
	$.ajax({
		url: '../controlador/listartitulosedit.php',
		beforeSend:function(){
			$('#listartitulosedit').html('Cargando tipos...');
		},
		success:function(x){
			$('#listartitulosedit').html(x);
			console.log(x);
		}
	});	
});