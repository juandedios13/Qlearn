$(document).ready(function(){
	var validar = new validaciones();

	var Nombre1 = $(".inputNombre").eq(0);
	Nombre1.keyup(function(){
		Nombre1.val(validar.validartext(Nombre1.val()));
	});

	Nombre1.blur(function(){
		Nombres();
	});

	var Nombre2 = $(".inputNombre").eq(1);
	Nombre2.keyup(function(){
		Nombre2.val(validar.validartext(Nombre2.val()));
	});

	var Apellido1 = $(".inputApellidos").eq(0);
	Apellido1.keyup(function(){
		Apellido1.val(validar.validartext(Apellido1.val()));
	});

	Apellido1.blur(function(){
		Apellidos();
	});
	
	var Apellido2 = $(".inputApellidos").eq(1);
	Apellido2.keyup(function(){
		Apellido2.val(validar.validartext(Apellido2.val()));
	});

	var Correo = $(".correo").eq(0);
	Correo.blur(function(){
		Correos();
	});

	var Contraseña = $(".Contrasena").eq(0);
	Contraseña.blur(function(){
		Contraseñas();
	});

	$("#enviar").click(function(){
		var a = Nombres();
		var b = Nombres2();
		var c = Apellidos();
		var d = Apellidos2();
		var e = Correos();
		var f = Contraseñas();
		if (a && b && c && d && e && f) {
			$("#formulario1").submit();
		}
		return false;
	});

	function Nombres(){
		if (Nombre1.val() == "") {
			$("#errorn").eq(0).text("El Nombre no puede estar vacío");
			$(".nombres").eq(0).css("height", "100px")
			Nombre1.eq(0).css("border","1px solid red");
			$("#errorn").eq(0).css("display","block");
			return false;
		}else{
			Nombre1.eq(0).css("border","1px solid rgb(110,110,110)");
			$(".nombres").eq(0).css("height", "90px");
			$("#errorn").eq(0).css("display","none");
			return true;
		}
	}

	function Nombres2(){
		
		if (Nombre1.val().length < 3) {
			if (Nombre1.val() == "") {
				$("#errorn").eq(0).text("El Nombre no puede estar vacío");
			}else{
				$("#errorn").eq(0).text("El Nombre es muy corto");
			}
			$(".nombres").eq(0).css("height", "100px")
			Nombre1.eq(0).css("border","1px solid red");
			$("#errorn").eq(0).css("display","block");
			return false;
		}else{
			Nombre1.eq(0).css("border","1px solid rgb(110,110,110)");
			$(".nombres").eq(0).css("height", "90px");
			$("#errorn").eq(0).css("display","none");
			return true;
		}
	}

	function Apellidos(){
		if (Apellido1.val() == "") {
			$("#errora").eq(0).text("El Apellido no puede estar vacío");
			$(".nombres").eq(1).css("height", "105px")
			Apellido1.eq(0).css("border","1px solid red");
			$("#errora").eq(0).css("display","block");
			return false;
		}else{
			Apellido1.eq(0).css("border","1px solid rgb(110,110,110)");
			$(".nombres").eq(1).css("height", "90px");
			$("#errora").eq(0).css("display","none");
			return true;
		}
	}

	function Apellidos2(){
		if (Apellido1.val().length < 3) {
			if (Nombre1.val() == "") {
				$("#errora").eq(0).text("El Apellido no puede estar vacío");
			}else{
				$("#errora").eq(0).text("El Apellido es muy corto");
			}
			$(".nombres").eq(1).css("height", "105px")
			Apellido1.eq(0).css("border","1px solid red");
			$("#errora").eq(0).css("display","block");
			return false;
		}else{
			Apellido1.eq(0).css("border","1px solid rgb(110,110,110)");
			$(".nombres").eq(1).css("height", "90px");
			$("#errora").eq(0).css("display","none");
			return true;
		}
	}

	var dato = false;
	function Correos(){
		if (Correo.val() != "") {
			var valido = validar.validarEmail(Correo.val());
			if (!valido) {
				$("#error").eq(0).css("display","block");
				$("#error").eq(0).text("Formato del correo inválido.");
				Correo.eq(0).css("border","1px solid red");
				return false;
			}else{
				$.get("../php/validarCorreo.php",{correo:Correo.val()},(bol) =>{
					
					if (bol) {
						$("#error").eq(0).css("display","block");
						$("#error").eq(0).text("Correo ya existente.");
						Correo.eq(0).css("border","1px solid red");
						dato = false;
					}else{
						$("#error").eq(0).css("display","none");
						Correo.eq(0).css("border","1px solid rgb(110,110,110)");
						dato = true;
					}
				});
				return dato;
			}
		}else{
			$("#error").eq(0).text("El correo no puede estar vacío.");
			$("#error").eq(0).css("display","block");
			Correo.eq(0).css("border","1px solid red");
			return false;
		}
	}

	function retornar(){
		return dato;
	}

	function Contraseñas(){
		if (Contraseña.val() != "") {
			if (Contraseña.val().length > 7 && Contraseña.val().length < 17) {
				var valido = validar.validarContra(Contraseña.val());
				if (!valido) {
					$("#errorc").eq(0).text("la contraseña debe tener una mayúscula, una minúscula, un dígito y al menos un caracter no alfanumérico.");
					$("#errorc").eq(0).css("display","block");
					Contraseña.eq(0).css("border","1px solid red");
					return false;
				}else{
					$("#errorc").eq(0).css("display","none");
					Contraseña.eq(0).css("border","1px solid rgb(110,110,110)");
					return true;
				}
			}else{
				$("#errorc").eq(0).text("la contraseña debe tener entre 8 y 16 caracteres");
				Contraseña.eq(0).css("border","1px solid red");
				$("#errorc").eq(0).css("display","block");
				return false;
			}
		}else{
			$("#errorc").eq(0).text("la contraseña no puede estar vacía");
			$("#errorc").eq(0).css("display","block");
			Contraseña.eq(0).css("border","1px solid red");
			return false;
		}
	}

});