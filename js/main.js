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
	$('#cancelar').click(function() {
		$('#fecha').val("");
		$('#descripcion').val("");
	});
	$("#fecha").datepicker({
		changeMonth: true,
		changeYear:true,
		dateFormat: 'dd-mm-yy',
	});
	
	var consulta;
	var con;
	//hacemos focus al campo de búsqueda
    $("#busqueda").focus();
    //comprobamos si se pulsa una tecla
    $("#busqueda").keyup(function(e){
    //obtenemos el texto introducido en el campo de búsqueda
    consulta = $("#busqueda").val();
    //hace la búsqueda
	    $.ajax({
	    	data: "b="+consulta,
	    	url: "../controlador/b-usuario.php",
	    	type: "POST",
	    	beforeSend: function(){
	    	//imagen de carga
	    	$("#list-user").html("<li>Verificando</li>");
	                    },
						error: function(){
	                          alert("error petición ajax");
	                    },
	        success: function(data){                                                    
	            $("#list-user").empty();
	            $("#list-user").append(data);
	        }
	    });
                                                                                  
                                                                           
    });


    $("#titulos").keyup(function(e){
    //obtenemos el texto introducido en el campo de búsqueda
    con = $("#titulos").val();
    //hace la búsqueda
	    $.ajax({
	    	data: "t="+con,
	    	url: "../controlador/b-titulos.php",
	    	type: "POST",
	    	beforeSend: function(){
	    	//imagen de carga
	    	$("#list-titulos").html("<li>Verificando</li>");
	                    },
						error: function(){
	                          alert("error petición ajax");
	                    },
	        success: function(data){                                                    
	            $("#list-titulos").empty();
	            $("#list-titulos").append(data);
	        }
	    });
                                                                                  
                                                                           
    });
    $.ajax({
			url:"../controlador/cargarEvaluador.php",
			success:function(respuesta){
				$('#evaluador').html(respuesta);
			}
		});

    $('#frmInforme').submit(function(){
    		$.ajax({
    			data:$(this).serialize()+'&funcionario='+localStorage.getItem('idus')+'&idtitulo='+localStorage.getItem('idtit'),
    			url:"../controlador/insertarTitulo.php",
    			type:"POST",
    			beforeSend:function(){
    								$('#msgFormulario').addClass('msg-v');
									$('#msgFormulario').html('Verificando..... <i class="fa fa-spinner" aria-hidden="true"></i>');
								},
				success:function(respuesta){
					// console.log(respuesta);
					// $('#msgFormulario').html(respuesta)
									if(respuesta=="1"){
										$('#msgFormulario').removeClass('msg-v msg-error');
										$('#msgFormulario').addClass('msg');
										$('#msgFormulario').html("Informe ingresado correctamente <i class='msg-i fa fa-check-circle-o' aria-hidden='true'></i>");
										
									}else 
										if(respuesta=="2"){
											$('#msgFormulario').removeClass('msg-v');
											$('#msgFormulario').addClass('msg-error');
											$('#msgFormulario').html("Error al ingresar informe... <i class='msg-i fa fa-times-circle-o' aria-hidden='true'></i>");
										
										}else{
											$('#msgFormulario').removeClass('msg-v');
											$('#msgFormulario').addClass('msg-error');
											$('#msgFormulario').html("Información incompleta... <i class='msg-i fa fa-info-circle' aria-hidden='true'></i>");
										}
								}	

    		});
    		return false;
    	});


});