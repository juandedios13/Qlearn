$(document).ready(function(){



	$("#enviar").click(function(){
		var correo = $(".input").eq(0).val();
		$("#error").load("../php/recuperar_contrasena.php",{correo:correo});
		$("#error").show();
		return false;
	});

	$("#formulario1").submit(function(){
		return false;
	});








});