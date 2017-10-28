<?php
    include_once "datosbd.php"; 
    include_once "conexionbd.php";
    include_once "funcionesVarias.php";
//    var_dump($_POST);
    $nombre=$_POST["nombre"];
    $contrasenia=$_POST["contrasenia"];
    //echo $nombre." ".$contrasenia;
    $hash=crearHash($contrasenia);
        
        
        
    $sqlRegistro="INSERT INTO usuario(nombre,hash) values ('".$nombre."','".$hash."')";
    if(consultaDB($sqlRegistro,$servidor,$usuario,$contraseña,$bdd)){
        echo "Registro Exitoso";
    }
    else{
        echo "Error al registrar el usuario";
    }


?>