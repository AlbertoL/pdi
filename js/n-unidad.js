$(document).ready(function() {
	localStorage.clear();
	$('.menu li:has(ul)').click(function(e) {
		// e.preventDefault();
		if ($(this).hasClass('activado')) {
			$(this).removeClass('activado');
			$(this).children('ul').slideUp();

		}else{
			$('.menu li ul').slideUp();
			$('.menu li').removeClass('activado');
			$(this).addClass('activado');
			$(this).children('ul').slideDown();
		}
	});

	$('.btn-menu').click(function() {
		$('.contenedor-menu .menu').slideToggle();
	});
	$(window).resize(function(){
		if ($(document).width() > 1000) {
			$('.contenedor-menu .menu').css({'display' : 'block'});			
		}
		if ($(document).width() < 1000) {
			$('.contenedor-menu .menu').css({'display' : 'none'});			
		}

	});
	$('#list-user').on('click', 'li', function() {
		var iuser = $(this).attr('id');
		var titulo = $(this).text();
		$("#t-name").text(titulo);
		localStorage.setItem('idus',iuser);
	});
	$('#list-titulos').on('click', 'li', function() {
		var ititle = $(this).attr('id');
		var t = $(this).text();
		$("#t-title").text(t);
		localStorage.setItem('idtit',ititle);
	});
	$.ajax({
			url:"../controlador/cargarRegion.php",
			success:function(respuesta){
				$('#c_region').html(respuesta);
			}
		});

	$('#c_region').change(function(){
		var id_region=$("#region option:selected").val();
		$.ajax({
			data:"region="+id_region,
			type:"POST",
			url:"../controlador/cargarProvincia.php",
			success:function(respuesta){
				$('#c_provincia').html(respuesta);
			}

		});
	});

	$('#c_provincia').change(function(){
		var id_provincia=$("#provincia option:selected").val();
		$.ajax({
			data:"provincia="+id_provincia,
			type:"POST",
			url:"../controlador/cargarComuna.php",
			success:function(respuesta){
				$('#c_comuna').html(respuesta);
			}
		});
	});
	$.ajax({
		url: '../controlador/listarunidad.php',
		beforeSend:function(){
			$('#unidad').html('Cargando Unidad...');
		},
		success:function(x){
			$('#unidad').html(x);
		}
	});

	$('#frmUnidad').submit(function(){
    		$.ajax({
    			data:$(this).serialize(),
    			url:"../controlador/nuevaunidad.php",
    			type:"POST",
    			beforeSend:function(){
									$('#msgFormulario').html('<img src="../loading.gif"/ width=60> verificando');
								},
				success:function(respuesta){
					console.log(respuesta);
					if(respuesta=="1"){
						$('#msgFormulario').removeClass('msg-error');
                        $('#msgFormulario').addClass('msg-v');
						$('#msgFormulario').html("Unidad ingresada correctamente");					
					}else 
					if(respuesta=="2"){
						$('#msgFormulario').removeClass('msg-v');
                        $('#msgFormulario').addClass('msg-error');
						$('#msgFormulario').html("La unidad ya existe");
					}else{
						$('#msgFormulario').removeClass('msg-v');
                        $('#msgFormulario').addClass('msg-error');
						$('#msgFormulario').html("No existen los valores indicados...");
					}
				}	

    		});
    		return false;
    	});
});