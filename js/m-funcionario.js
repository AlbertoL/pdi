$(document).ready(function(){
    localStorage.clear();
    $('#mostrarFormulario').hide();
    $("#fecha1").datepicker({
        changeMonth: true,
        changeYear:true,
        dateFormat: 'dd-mm-yy',
    });
    // Menu Lateral
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
    $('#username').Rut({
            on_error: function(){; $('#boton').attr("disabled", true); $("#msgUsuario").html("Rut Incorrecto")},
            on_success:  function(){ $('#boton').attr("disabled", false);$("#msgUsuario").html("")
            $.ajax({
                data:"rut="+$('#username').val(),
                url:"../controlador/buscarUsuario2.php",
                type:"POST",
                beforeSend:function(){
                $('#msgUsuario').html('<img src="../loading.gif"/ width=60> verificando');
                },
                success:function(respuesta){
                if(respuesta=='0'){
                    localStorage.setItem('rut_Usuario',$('#username').val());
                    $('#msgUsuario').html("Funcionario disponible");
                    $('#mostrarFormulario').hide();
                }else{
                        $('#msgUsuario').html(respuesta);
                        $('#mostrarFormulario').show();
                        $.ajax({
                                data:"rutUsuario="+$('#username').val(),
                                url: '../controlador/listargrado.php',
                                type:"POST",
                                beforeSend:function(){
                                    $('#listargrado').html('Cargando grados...');
                                },
                                success:function(x){
                                    $('#listargrado').html(x);
                                }
                        });
                        $.ajax({
                                data:"rutUsuario="+$('#username').val(),
                                url: '../controlador/listarcargo.php',
                                type:"POST",
                                beforeSend:function(){
                                $('#listarcargo').html('Cargando grados...');
                                },
                                success:function(x){
                                $('#listarcargo').html(x);

                                }
                        }); 

                        $.ajax({
                                data:"rutUsuario="+$('#username').val(),
                                url: '../controlador/listarcategoria.php',
                                type:"POST",
                                beforeSend:function(){
                                $('#listarcategoria').html('Cargando categorias...');
                                },
                                success:function(x){
                                $('#listarcategoria').html(x);
                                }
                        }); 
                        $.ajax({
                                data:"rutUsuario="+$('#username').val(),
                                url: '../controlador/listarunidad.php',
                                type:"POST",
                                beforeSend:function(){
                                $('#listarunidad2').html('Cargando Unidad...');
                                },
                                success:function(x){
                                $('#listarunidad2').html(x);
                                }
                        });

                        $.ajax({
                            data:"rutUsuario="+$('#username').val(),
                            url: '../controlador/listarunidadsinjefe.php',
                            type:"POST",
                            beforeSend:function(){
                            $('#listrarunidadsinjefe').html('Cargando Unidaddes sin jefatura...');
                            },
                            success:function(x){
                            $('#listrarunidadsinjefe').html(x);
                            }
                        });     
                                        
                                    
                    }
                    }   
            });
            },
    format_on: 'keyup'
        });
    $('#frmUsuario').submit(function(){
            $.ajax({
                data:$(this).serialize(),
                url:"../controlador/modificarFuncionario.php",
                type:"POST",
                beforeSend:function(){
                                    $('#msgFormulario').html('<img src="../loading.gif"/ width=60> verificando');
                                },
                success:function(respuesta){
                                console.log(respuesta);
                                    if(respuesta=="1"){
                                        $('#msgFormulario').removeClass('msg-error');
                                        $('#msgFormulario').addClass('msg-v');
                                        $('#msgFormulario').html("Funcionario actualizado correctamente");
                                        
                                    }else if(respuesta=="2"){
                                        $('#msgFormulario').removeClass('msg-v');
                                        $('#msgFormulario').addClass('msg-error');
                                        $('#msgFormulario').html("Usuario no existe");
                                        
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