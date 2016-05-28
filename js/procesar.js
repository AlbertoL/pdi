$(document).ready(function(){
	$('#frmUsuario').submit(function(x){
		console.log($(this).serialize());
		$.ajax({
			data:$(this).serialize()+"&unidad="+$('#categoria').val(),
			url:"./controlador/validarusuario.php",
			type:"POST",
			beforeSend:function(){
				$('#load').html('<img src="./loading.gif"/ width=60> verificando');
			},
			success:function(respuesta){
				console.log(respuesta);
				switch(respuesta){
					case '1':
			 		$(location).attr('href','./panel/main.php');
					break;
					case '2':
					alert("No tiene Permisos para acceder");
					break;
					case '0':
					alert("ingresa un usuario.");
					break;
					default:
					alert("paso cualquier cosa");
				}

			}
		});	
		return false;
	});
});