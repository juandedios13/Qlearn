<?php 

include_once 'query.php';

extract($_POST);
$Query = new usuario();
$Codigo = '';
$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
$max = strlen($pattern)-1;
for($i = 0; $i < 6; $i++) $Codigo .= $pattern{
    mt_rand(0,$max)
};
$_POST['Codigo'] = $Codigo;
$registrarUsuario = $Query->registrarusuario($primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $correo, $contrasena, $tipo, $Codigo);

header("location: ../paginas/validar.php");

include ("sendemail.php");//Mando a llamar la funcion que se encarga de enviar el correo electronico
		
/*Configuracion de variables para enviar el correo*/
$mail_username="jsantiagoe@unicesar.edu.co";//Correo electronico saliente ejemplo: tucorreo@gmail.com
$mail_userpassword="diosteama13";//Tu contraseña de gmail
$mail_addAddress=$correo;//correo electronico que recibira el mensaje
//$template="plantillacorreo.php";//Ruta de la plantilla HTML para enviar nuestro mensaje

/*Inicio captura de datos enviados por $_POST para enviar el correo */
$mail_setFromEmail=$_POST['Codigo'];
$mail_setFromName="";
$txt_message="Código: ".$Codigo;
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



?>