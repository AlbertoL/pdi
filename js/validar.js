$(document).ready(function(){
	$.validator.addMethod('nombre', function(value, element)
	{
		return this.optional(element) || /^[a-záéíóúàèìòùäëïöüñ\s]+$/i.test(value);
	});
	$.validator.addMethod('apellido', function(value, element)
	{
		return this.optional(element) || /^[a-záéíóúàèìòùäëïöüñ\s]+$/i.test(value);
	});

	$.validator.addMethod('clave', function(value, element)
	{
		return this.optional(element) || /^[a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ0-9@_]+$/i.test(value);
	});
	$.validator.addMethod('direccion', function(value, element)
	{
		return this.optional(element) || /^[a-záéíóúàèìòùäëïöüñ0-9\s]+$/i.test(value);
	});
	$.validator.addMethod('tel', function(value, element)
	{
		return this.optional(element) || /^[0-9\-\s]+$/i.test(value);
	});
	$("#frmUsuario").validate
	({
     		rules:
		{
			nombre: {required: true, nombre: true, minlength: 2, maxlength: 30},
			apellido: {required: true, apellido: true, minlength: 2, maxlength: 30},
			rut_cl: {required: true, rut: true},
			clave: {required: true, clave: true, minlength: 8, maxlength: 12},
			direccion: {required: true, direccion: true, minlength: 5, maxlength: 50},
			email: {required: true, email: true, minlength: 6, maxlength: 40},
			tel: {required: true, tel: true, minlength: 4, maxlength: 20}
		},
		messages:
		{
			nombre: {required: 'Campo requerido', nombre: 'Formato incorrecto', minlength: 'Debe tener al menos 2 letras', maxlength: 'El máximo de caracteres son 30'},
			apellido: {required: 'Campo requerido', apellido: 'Formato incorrecto', minlength: 'Debe tener al menos 2 letras', maxlength: 'El máximo de caracteres son 30'},
			rut_cl: {required: 'Campo requerido', rut: 'Rut invalido'},
			clave: {required: 'Campo requerido', clave: 'Letras y números', minlength: 'minimo 8 caracteres', maxlength: 'máximo de caracteres es de 12'},
			direccion: {required: 'Campo requerido', direccion: 'Letras y numeros', minlength: 'direccion muy corta', maxlength: 'Direccion muy grande'},
			email: {required: 'Campo requerido', email: 'name@micuenta.com', minlength: 'El mínimo de caracteres es 5', maxlength: 'El máximo de caracteres son 40'},
			tel: {required: 'Campo requerido', tel: 'codigo - numero', minlength: 'El mínimo de caracteres es 6', maxlength: 'El máximo de caracteres son 20'}
       	}
    	});
});