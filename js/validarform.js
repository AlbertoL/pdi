$(document).ready(function(){
	$.validator.addMethod('pass', function(value, element)
	{
		return this.optional(element) || /^[a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ0-9@_]+$/i.test(value);
	});
	
	$("#frmUsuario").validate
	({
     		rules:
		{
			pass: {required: true, pass: true, minlength: 8, maxlength: 15},
		},
		messages:
		{
			pass: {required: 'Campo requerido', pass: 'Letras y números', minlength: 'minimo 8 caracteres', maxlength: 'máximo de caracteres es de 15'},	
       	}
    	});
});