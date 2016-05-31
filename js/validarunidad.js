$(document).ready(function(){
	$.validator.addMethod('nombre', function(value, element)
	{
		return this.optional(element) || /^[a-záéíóúàèìòùäëïöüñ\s]+$/i.test(value);
	});
	$.validator.addMethod('sigla', function(value, element)
	{
		return this.optional(element) || /^[a-záéíóúàèìòùäëïöüñ\s]+$/i.test(value);
	});

	$.validator.addMethod('descripcion', function(value, element)
	{
		return this.optional(element) || /^[a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ\s]+$/i.test(value);
	});
	
	$("#frmUnidad").validate
	({
     		rules:
		{
			nombre: {required: true, nombre: true, minlength: 2, maxlength: 30},
			sigla: {required: true, sigla: true, minlength: 2, maxlength: 30},
			descripcion: {required: true, descripcion: true, minlength: 2, maxlength: 30}
		},
		messages:
		{
			nombre: {required: 'Campo requerido', nombre: 'Formato incorrecto', minlength: 'Debe tener al menos 2 letras', maxlength: 'El máximo de caracteres son 30'},
			sigla: {required: 'Campo requerido', sigla: 'Formato incorrecto', minlength: 'Debe tener al menos 2 letras', maxlength: 'El máximo de caracteres son 30'},
			descripcion: {required: 'Campo requerido', descripcion: 'Formato incorrecto', minlength: 'Debe tener al menos 2 letras', maxlength: 'El máximo de caracteres son 30'}	
       	}
    	});
});