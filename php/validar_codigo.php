<?php 


extract($_POST);
$host= 'localhost';
$db='qlearn';
$user= 'root';
$password= '';
$charset = 'utf8mb4';
$bol=false;
$bol1=false;
$conexion=mysqli_connect($host,$user,$password,$db);

$query="SELECT correo, codigo, estado  from persona where correo = '$correo'";

$consulta=mysqli_query($conexion,$query);

while ($fila=mysqli_fetch_row($consulta)) {
	if ($fila[2]==1) {
		$bol1=true;
	}
	else if ($correo == $fila[0] && $codigo == $fila[1]) {
		$bol=true;

		$query1="UPDATE persona SET estado = 1 where correo = '$correo'";

		$consulta1=mysqli_query($conexion,$query1);

	}
}

if ($bol1) {
	echo "ya";
}
else if ($bol) {
	echo "bien";
}

 ?>