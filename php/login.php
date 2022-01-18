<?php 

include_once 'query.php';

session_start();

extract($_POST);

$Query = new usuario();

$login = $Query->obtenerusuario($correo);

if (validarcontra($contrasena,$login['contrasena'])) {

	$_SESSION['permitir']=true;
	$_SESSION['primerNombre']= $login['primerNombre'];
	$_SESSION['segundoNombre']=$login['segundoNombre'];
	$_SESSION['primerApellido']= $login['primerApellido'];
	$_SESSION['segundoApellido']=$login['segundoApellido'];
	if ($login['tipoUsuario']=="Docente") {
		header('location:../paginas/Docente/index.php');
	}else{
		header('location:../paginas/Estudiante/index.php');
	}
}else{

	$_SESSION['permitir']=false;
	header('location: ../index.php');
}

function validarcontra($contraseña,$contraseñaencriptada){
    if(password_verify($contraseña,$contraseñaencriptada)){
        return true;
    }else{
        return false;
    }
}
?>