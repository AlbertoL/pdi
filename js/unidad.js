$(document).ready(function() {
	$.ajax({
		url: './controlador/cargarunidad.php',
		beforeSend:function(){
			$('#d_unidad').html('Cargando unidad...');
		},
		success:function(x){
			$('#d_unidad').html(x);
		}
	});	
});