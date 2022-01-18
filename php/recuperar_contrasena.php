<?php 

include_once'query.php';
$Query = new usuario();
extract($_POST);
$host= 'localhost';
$db='qlearn';
$user= 'root';
$password= '';
$charset = 'utf8mb4';
$bol=false;
$bol1=false;
$conexion=mysqli_connect($host,$user,$password,$db);

$query="SELECT correo, estado from  persona where correo= '$correo'";

$consulta=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($consulta)) {

	if ($fila[0]==$correo) {
		
		$bol1 = true;
		if ($fila[1]==1) {
			$bol=true;
		}
	} 

}

if (!$bol1) {
	echo "Su correo no esta asociado a ningun usuario.";
}else if ($bol) {
	$Codigo = '';
	$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ*-$#_';
	$max = strlen($pattern)-1;
	for($i = 0; $i < 15; $i++) $Codigo .= $pattern{
	    mt_rand(0,$max)
	};
	include ("sendemail.php");
					
			/*Configuracion de variables para enviar el correo*/
			$mail_username="jsantiagoe@unicesar.edu.co";//Correo electronico saliente ejemplo: tucorreo@gmail.com
			$mail_userpassword="diosteama13";//Tu contraseña de gmail
			$mail_addAddress=$correo;//correo electronico que recibira el mensaje
			//$template="plantillacorreo.php";//Ruta de la plantilla HTML para enviar nuestro mensaje

			/*Inicio captura de datos enviados por $_POST para enviar el correo */
			$mail_setFromEmail = $Codigo;
			$mail_setFromName="";
			$txt_message="Código: " . $Codigo;
			$mail_subject="Juan de dios Santiago";
			$mail_body="<html>
			 </head>
			<title>Validacion de cuenta</title>
			</head>
			<body>
			<p>Bienvenidos a Qlearn, Este es tu código de verificación.</p>
			<br>
			<p>Este es tu código de verificación:" . $Codigo . "</p>
			<br>
			</body>
			</html>";

			sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$mail_body);//Enviar el mensaje

	$contra=$Query->encriptar($Codigo);

	$query1="UPDATE persona set contrasena='$contra' where correo ='$correo'";

	$consulta=mysqli_query($conexion,$query1);

	echo "Su nueva contraseña ha sido enviada al correo electrónico";
}else{
	echo "Su cuenta no se encuentra activa.";
}



 ?>