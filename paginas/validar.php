<!DOCTYPE html>
<html> 
<head>
	<title>Validar cuenta - Qlearn</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Questrial|Roboto&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/registrarse.css">
	<link rel="stylesheet" type="text/css" href="../css/recuperar_contrasena.css">
	<link rel="stylesheet" type="text/css" href="../css/validarCorreo.css">
	<meta charset="utf-8">
</head>
<body >
	<div id="menu">
		<div id="imgMenu">
			<img src="../img/titulo2_IS.png">
		</div>
		<div id="btnMenu">
			<img id="imgme" src="../img/btnMenu.svg">
		</div>
	</div>
	<div class="opcionesMenu">
		<ul>
			<li id="tituloMenu"><img src="../img/cerrar.svg" class="icoMenu cerrar" oncontextmenu="return false" onkeydown="return false"><p class="cerrar" oncontextmenu="return false" onkeydown="return false">Cerrar</p></li>
			<li><img src="../img/iniciar.svg" class="icoMenu"><p>Iniciar sesi&oacute;n</p></li>
			<li><img src="../img/registrar.svg" class="icoMenu"><p>Registrar</p></li>
			<li><img src="../img/recover.svg" class="icoMenu"><p>Recuperar contraseña</p></li>
			<li><img src="../img/recover.svg" class="icoMenu"><p>Tengo un código</p></li>
		</ul>
	</div>
	<div id="caja">
		<div id="titulo-formulario">
			<p id="titulo-form">Recuperar contraseña</p>
			<img src="../img/titulo_IS.png">
			<div id="registrar"><p id="titulo-form">Válidar correo</p></div>
		</div>
		<form id="formulario1">
			<label class="label1 l1">Correo <span class="obligatorio">*</span></label>
			<input class="input correo" type="email" name="correo">
			<p class="label1" id="error"></p>
			<label class="label1">Código de verificación <span class="obligatorio">*</span></label>
			<input class="input" type="text" name="codigo">
			<p class="label1" id="error"></p>
			<div style="display: block; height: 50px;">
				<input id="enviar" type="button" name="enviar" value="Verificar código">
				<input class="tres dos" type="button" name="vvvvv" value="Reenviar código">
			</div>
			<label class="label2 label">¿<a href="registrarse.php" id="registrarse">Deseas&nbsp; registrarte</a>?</label>
			<label class="label2 label">¿<a href="../index.php" id="registrarse">Ya tienes una cuenta</a>?</label>
			<label class="label3 label">¿<a href="recuperar_contrasena.php" id="registrarse">¿Recuperar contraseña?</a>?</label>
		</form>
	</div>
	<?php	
		session_start();
		if (isset($_SESSION['permitir'])) {
			if ($_SESSION['permitir'] == true) {
			
				if ($login['tipoUsuario']=="Docente") {
					header('location: Docente/index.php');
				}else{
					header('location: Estudiante/index.php');
				}
			}
		}
	?>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/menu.js"></script>
	<script type="text/javascript" src="../js/validar_correo.js"></script>
</body>
</html>