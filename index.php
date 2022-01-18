
<!DOCTYPE html>
<html>
<head>
	<title>Qlearn</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Questrial|Roboto&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<meta charset="utf-8">
</head>
<body>
	<div id="menu">
		<div id="imgMenu">
			<img src="img/titulo2_IS.png">
		</div>
		<div id="btnMenu">
			<img id="imgme" src="img/btnMenu.svg">
		</div>
	</div>
	<div class="opcionesMenu">
		<ul>
			<li id="tituloMenu"><img src="img/cerrar.svg" class="icoMenu cerrar" oncontextmenu="return false" onkeydown="return false"><p class="cerrar" oncontextmenu="return false" onkeydown="return false">Cerrar</p></li>
			<li><img src="img/iniciar.svg" class="icoMenu"><p>Iniciar sesi&oacute;n</p></li>
			<li><img src="img/registrar.svg" class="icoMenu"><p>Registrar</p></li>
			<li><img src="img/recover.svg" class="icoMenu"><p>Recuperar contraseña</p></li>
			<li><img src="../img/recover.svg" class="icoMenu"><p>Tengo un código</p></li>
		</ul>
	</div>
	<div id="caja">
		<div id="titulo-formulario">
			<p id="titulo-form">Iniciar sesi&oacute;n</p>
			<img src="img/titulo_IS.png">
			<div id="registrar"><p id="titulo-formu">Iniciar sesión</p></div>
		</div>
		<form id="formulario1" method="POST" action="php/login.php">
			<input class="input" type="email" name="correo" placeholder="Correo electronico">
			<input class="input" type="password" name="contrasena" placeholder="Contraseña">
			<p class="label1" id="errora"></p>
			<input id="enviar" type="submit" name="enviar" value="Enviar">
			<label class="label2 label">¿<a href="paginas/registrarse.php" id="registrarse">Deseas&nbsp; registrarte</a>?</label>
			<label class="label3 label">¿<a href="paginas/recuperar_contrasena.php" id="registrarse">Olvidaste&nbsp; tu &nbsp;contrase&ntilde;a</a>?</label>
			<label class="label3 label">¿<a href="paginas/validar.php" id="registrarse">Tengo un código de verificación</a>?</label>
		</form>
	</div>
	<?php	
		session_start();
		if (isset($_SESSION['permitir'])) {
			if ($_SESSION['permitir'] == false) {
				echo "<script>
					var label = document.getElementById('errora');
					label.style.display = 'block';
					label.innerHTML = 'Los datos son incorrectos';
				</script>";
			}else{
				if ($login['tipoUsuario']=="Docente") {
					header('location:  paginas/Docente/index.php');
				}else{
					header('location:  paginas/Estudiante/index.php');
				}
			}
		}
	?>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
</body>
</html>