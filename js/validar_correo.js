$(document).ready(function(){  

	$(".dos").eq(0).click(function(){
		console.log('1')
		var correo = $(".input").eq(0).val();
		if (correo != "") {
			$("#error").load("../php/consultar_correo.php?correo="+correo);
			$("#error").show();

		}else{
			$("#error").show().html("El correo no puede estar vacío");
		}
		$(".label1").eq(3).hide()
		return false;
	});

	$("#enviar").click(function(){
		var correo = $(".input").eq(0).val();
		var codigo = $(".input").eq(1).val();
		$.post("../php/validar_codigo.php",{correo:correo,codigo:codigo},function(bol){
			if (bol == "bien") {
				window.location.href="../index.php";
			}else if(bol == "ya"){
				$("#error").hide().html("Datos no concuerdan");
				$(".label1").eq(3).show().html("La cuenta ya se encuentra activa");
			}
			else{
				$("#error").hide().html("Datos no concuerdan");
				$(".label1").eq(3).show().html("Datos no concuerdan");
			}
		});
		return false;
	});

	$("#formulario1").submit(function(){
		return false;
	});

	
});