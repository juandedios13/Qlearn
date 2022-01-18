<?php 

extract($_GET);
$host= 'localhost';
$db='qlearn';
$user= 'root';
$password= '';
$charset = 'utf8mb4';
$bol=false;
$bol1=false;

$conexion=mysqli_connect($host,$user,$password,$db);
$query="SELECT correo, codigo ,estado  from persona where correo = '$correo'";

$consulta=mysqli_query($conexion,$query);

while ($fila=mysqli_fetch_row($consulta)) {

	if ($fila[2]==1) {
		$bol1=true;
	}
	else if ($correo == $fila[0] ) {
			include ("sendemail.php");
					
			/*Configuracion de variables para enviar el correo*/
			$mail_username="jsantiagoe@unicesar.edu.co";//Correo electronico saliente ejemplo: tucorreo@gmail.com
			$mail_userpassword="diosteama13";//Tu contraseña de gmail
			$mail_addAddress=$correo;//correo electronico que recibira el mensaje
			//$template="plantillacorreo.php";//Ruta de la plantilla HTML para enviar nuestro mensaje

			/*Inicio captura de datos enviados por $_POST para enviar el correo */
			$mail_setFromEmail = $fila[1];
			$mail_setFromName="";
			$txt_message="Código: " . $fila[1];
			$mail_subject="Juan de dios Santiago";
			$mail_body="<html>
			 </head>
			<title>Validacion de cuenta</title>
			</head>
			<body>
			<p>Bienvenidos a Qlearn, Este es tu código de verificación.</p>
			<br>
			<p>Este es tu código de verificación:" . $fila[1] . "</p>
			<br>
			</body>
			</html>";

			sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$mail_body);//Enviar el mensaje

			$bol=true;

	}
}
if ($bol1) {
	echo "La cuenta ya se encuentra activa";
}
else if ( !$bol) {
	echo "El correo no esta registrado";
}
?>