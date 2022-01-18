<!DOCTYPE html>
<html>
<head>
	<title>Recuperar contraseña - Qlearn</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Questrial|Roboto&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/recuperar_contrasena.css">
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
			<div id="registrar"><p id="titulo-formu">Recuperar contraseña</p></div>
		</div>
		<form id="formulario1">
			<input class="input" type="email" name="correo" placeholder="Correo electronico">
			<p class="label1" id="error"></p>
			<input id="enviar" type="submit" name="enviar" value="Enviar">
			<label class="label2 label">¿<a href="registrarse.php" id="registrarse">Deseas&nbsp; registrarte</a>?</label>
			<label class="label2 label">¿<a href="../index.php" id="registrarse">Ya tienes una cuenta</a>?</label>
			<label class="label3 label">¿<a href="registrarse.php" id="registrarse">Tengo un código de verificación</a>?</label>
		</form>
	</div>
	<?php	
		session_start();
		if (isset($_SESSION['permitir'])) {
			if ($_SESSION['permitir'] == true) {
			
				if ($login['tipoUsuario']=="Docente") {
					header('location:  Docente/index.php');
				}else{
					header('location:  Estudiante/index.php');
				}
			}
		}
	?>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/menu.js"></script>
	<script type="text/javascript" src="../js/recuperar_contrasena.js"></script>
</body>
</html>