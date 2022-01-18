<!DOCTYPE html>
<html>
<head>
	<title>Registrarse - Qlearn</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Questrial|Roboto&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/registrarse.css">
	<meta charset="utf-8">
</head>
<body>
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
			<img src="../img/titulo_IS.png">
			<div id="registrar"><p id="titulo-form">Registrarse</p></div>
		</div>
		<form id="formulario1" method="POST" action="../php/registrar.php">
			<div class="nombres">
				<label class="labelNombre">1<sup>er</sup>&nbsp; Nombre&nbsp;<span class="obligatorio">*</span></label>
				<input class="inputNombre input" type="text" name="primerNombre">
				<p class="label1" id="errorn"></p>
				<label class="labelNombre label2">2<sup>do</sup>&nbsp; Nombre&nbsp;</label>
				<input class="inputNombre input input2" type="text" name="segundoNombre">
				<p class="label1" id="errora"></p>
			</div>
			<div class="nombres">
				<label class="labelApellidos">1<sup>er</sup>&nbsp; Apellido&nbsp;<span class="obligatorio">*</span></label>
				<input class="inputApellidos input" type="text" name="primerApellido">
				<label class="labelApellidos label22">2<sup>do</sup>&nbsp; Apellido&nbsp;</label>
				<input class="inputApellidos input input22" type="text" name="segundoApellido">
			</div>
			<div class="nombres Datos2">
				<label class="label1">Correo <span class="obligatorio">*</span></label>
				<input class="input correo" type="email" name="correo">
				<p class="label1" id="error"></p>
				<label class="label1">Contrase&ntilde;a <span class="obligatorio">*</span></label>
				<input class="input Contrasena" type="password" name="contrasena">
				<p class="label1" id="errorc"></p>
				<label class="label1">tipo de usuario <span class="obligatorio">*</span></label>
				<select name="tipo" class="inputSelect">
				    <option>Docente</option>
				    <option>Estudiante</option>
				</select>
				<input id="enviar" type="submit" name="enviar" value="Enviar">
				<label class="label3 l">¿<a href="../index.php" id="registrarse">Ya tienes una cuenta</a>?</label>
				<label class="label3">¿<a href="recuperar_contrasena.php" id="registrarse">Olvidaste&nbsp; tu &nbsp;contrase&ntilde;a</a>?</label>
				<label class="label3 label">¿<a href="validar.php" id="registrarse">Tengo un código de verificación</a>?</label>
				
			</div>
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
	<script type="text/javascript" src="../js/validar.js"></script>
	<script type="text/javascript" src="../js/registrar.js"></script>
</body>
</html>