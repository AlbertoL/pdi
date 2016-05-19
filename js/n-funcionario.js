$(document).ready(function(){
    // $('#mostrarFormulario').hide();
    $("#fecha1").datepicker({
        changeMonth: true,
        changeYear:true,
        dateFormat: 'dd-mm-yy',
    });
    // Menu Lateral
    $('.menu li:has(ul)').click(function(e) {
        e.preventDefault();
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


    // Listar Grado
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

    // Listar Categoría
    $.ajax({
        url: '../controlador/listarcategoria.php',
        beforeSend:function(){
            $('#listarcategoria').html('Cargando categorias...');
        },
        success:function(x){
            $('#listarcategoria').html(x);
            console.log(x);
        }
    });

    // Ajax listar cargo
    $.ajax({
        url: '../controlador/listarcargo.php',
        beforeSend:function(){
            $('#listarcargo').html('Cargando grados...');
        },
        success:function(x){
            $('#listarcargo').html(x);
            // console.log(x);
        }
    });

   	$('#username').Rut({
    	on_error: function(){; $('#boton').attr("disabled", true); $("#msgUsuario").html("Rut Incorrecto")},
    	on_success:  function(){ $('#boton').attr("disabled", false);$("#msgUsuario").html("")
    	   $.ajax({
    			data:"rut="+$('#username').val(),
    			url:"../controlador/buscarUsuario.php",
    			type:"POST",
    			beforeSend:function(){
					$('#msgUsuario').html('<img src="../loading.gif"/ width=60> verificando');
				},
				success:function(respuesta){
					if(respuesta=='1'){
			         $('#msgUsuario').html("Funcionario se encuentra registrado");
							$('#mostrarFormulario').hide();
					}else{
						$('#msgUsuario').html("Funcionario se encuentra disponible");
						$('#mostrarFormulario').show();
					   }
					}	
    			});


    	   },
   		format_on: 'keyup'
    	});

    $('#listarcargo').change(function(){
            var valor=$('#cargo').val();
            if(valor==1 || valor==2){
                $.ajax({
                    url: '../controlador/listarunidadsinjefe.php',
                    beforeSend:function(){
                        $('#listrarunidadsinjefe').html('Cargando Unidaddes sin jefatura...');
                    },
                    success:function(x){
                        $('#listrarunidadsinjefe').html(x);
                        
                    }
                }); 
            }else{
                $('#listrarunidadsinjefe').html("");
            }
        });

        $('#frmUsuario').submit(function(){
            $.ajax({
                data:$(this).serialize(),
                url:"../controlador/insertarFuncionario.php",
                type:"POST",
                beforeSend:function(){
                                    $('#msgFormulario').html('<img src="../loading.gif"/ width=60> verificando');
                                },
                success:function(respuesta){
                    console.log(respuesta);
                                    if(respuesta=="1"){
                                        $('#mostrarFormulario').html("Funcionario ingresado correctamente");
                                        
                                    }else if(respuesta=="2"){
                                        $('#mostrarFormulario').html("Usuario ya se encuentra en nuestros registros");
                                        
                                    }else{
                                        $('#mostrarFormulario').html("No existen los valores indicados...");
                                    }
                                }   

            });
            return false;
        });


});