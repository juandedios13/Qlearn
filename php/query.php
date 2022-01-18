<?php

include_once 'conexion.php';

class usuario extends db {

    function obtenerusuario($correo){
        $conexion = mysqli_connect("localhost", "root", "", "qlearn");
        $v=false;
        $array;
        $query = mysqli_query($conexion,"SELECT primerNombre,segundoNombre,primerApellido,segundoApellido,correo,contrasena,tipoUsuario FROM persona WHERE correo = '$correo'");
            while ($fila=mysqli_fetch_array($query)) {
                 if ($fila['correo']==$correo) {
                        $v=true;
                        $array=$fila;

                    }
            }
            if ($v) {
                return $array;
            }else{
                return "no";
            }

        return null;

    }

    function registrarusuario($primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $correo, $contrasena, $tipoUsuario, $codigo){
        $conexion = mysqli_connect("localhost", "root", "", "qlearn");
        $Contar = mysqli_query($conexion, 'SELECT count(*) as total from persona');
        while ($fila = mysqli_fetch_array($Contar)){
            $Dato=$fila['total'] + 1;
        }
        echo $Dato;
        $contra = password_hash($contrasena, PASSWORD_DEFAULT, [ 'cost'=> 5 ]);
        $estado = false;
        $fotografia = "";
        $sql = "INSERT INTO persona(Id, primerNombre, segundoNombre, primerApellido, segundoApellido, correo, contrasena, tipoUsuario, codigo, estado, fotografia) VALUES ('$Dato', '$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellido', '$correo', '$contra', '$tipoUsuario', '$codigo', '$estado', '$fotografia')";
        $con = mysqli_query($conexion, $sql);
        if ($con) {
            echo "string";
        }else{
            echo "malo";
        }
    }

    function encriptar ($contra){
        return password_hash($contra, PASSWORD_DEFAULT, [ 'cost'=> 5 ]);
    }

    function login ($correo,$contra){

    }

}

class queryExamenes extends db {

    function obtenerExamenes($id){
        $query = $this->connect()->query('SELECT * FROM examen WHERE = $id' );
        return $query;
    }

    function obtenerpreguntas($idExamen){
        $query = $this->connect()->query('SELECT * FROM preguntas WHERE = $idexamen');
        return $query;
    }

    function obtenerrespuestas($idpregunta){
        $query= $this->connect()->query('SELECT * FROM respuestas WHERE = $idpregunta');
    }


} 


?>