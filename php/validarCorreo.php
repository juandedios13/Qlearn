<?php 
 extract($_GET);

$conexion = mysqli_connect("localhost", "root", "", "qlearn");

$query = mysqli_query($conexion, "SELECT correo  from persona WHERE correo = '$correo'");
$v=false;
	while ($fila=mysqli_fetch_array($query)) {
		if ($fila['correo']==$correo) {
			$v=true;
		}
	}
	
	if ($v) {
		echo true;
	}else{
		echo false;
	}

 ?>