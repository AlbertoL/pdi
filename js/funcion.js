$(document).ready(function() {
	$(".cont_form, .resumen_estadistico").fadeOut('0');
	$(".link_title").click(function(event) {
		$("#titulos_hva, #titulo_resumen").fadeOut('slow');
		$(".cont_form").fadeIn('slow');
	});
	$(".r1").click(function(event) {
		$("#titulos_hva, #titulo_resumen").fadeOut('slow');
		$(".resumen_estadistico").fadeIn('slow');
	});
	$("#volver").click(function(event) {
		$("#titulos_hva, #titulo_resumen").fadeIn('slow');
		$(".cont_form").fadeOut('slow');
		$('#fecha1').val('');
		$('#contenido_titulo').val('');
	});
	$("#volver2").click(function(event) {
		$("#titulos_hva, #titulo_resumen").fadeIn('slow');
		$(".resumen_estadistico").fadeOut('slow');
		$("#evaluacion_resumen").val('');
		$("#fecha2").val('');
	});
	$(".hva").click(function() {
		document.location.href = "./hva.php";
	});
	$(".option").click(function() {
		document.location.href = "./panel-opciones.php";
	});
	$(".alert").click(function() {
		document.location.href = "./mostraranotaciones.php";
	});

	// $("#fecha1").datepicker({
	// 	changeMonth: true,
	// 	changeYear:true,
	// 	dateFormat: 'dd-mm-yy',
	// });
	// $("#fecha2").datepicker({
	// 	changeMonth: true,
	// 	changeYear:true,
	// 	dateFormat: 'dd-mm-yy',
	// });
	$("#fecha3").datepicker({
		changeMonth: true,
		changeYear:true,
		dateFormat: 'dd-mm-yy',
	});

	$("#fecha1" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      dateFormat:'dd-mm-yy',
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#fecha2" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#fecha2" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      dateFormat:'dd-mm-yy',
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#fecha1" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    
});