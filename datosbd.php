<?php
    $servidorBN="localhost";
    $usuarioBN="batallanaval";
    $contraseñaBN="batallanaval";
    $bddBN="batallanaval";

function GenerarConexion(){
    $servidorBN="localhost";
    $usuarioBN="batallanaval";
    $contraseñaBN="batallanaval";
    $bddBN="batallanaval";

    $conexion = new PDO("mysql:host=$servidorBN;dbname=$bddBN", $usuarioBN, $contraseñaBN);
            //new mysqli($servidor, $usuario, $contraseña, $bdd);
        //mysqli_connect($servidor,$usuario,$contraseña,$bdd);
        //if($conexion->connect_error){
           // die("ERROR:  " . $conexion->connect_error);
            //echo "Error de Conexion: ".mysqli_connect_error();
        //}
        //else{
            //echo "Conexión Exitosa";
            //return $conexion;
        //}
    return $conexion;
}


?>