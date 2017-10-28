<?php
//    include_once "datosbd.php";
//    
//    $conexion = mysqli_connect($servidor,$usuario,$contraseña,$bdd);
//
//    if($conexion===false){
//        echo "Error de Conexion: ".mysqli_connect_error();
//    }
//    else{
//        echo "Conexión Existosa";
//    }


    function CrearConexion($servidor,$usuario,$contraseña,$bdd){
        $conexion = mysqli_connect($servidor,$usuario,$contraseña,$bdd);
        if($conexion===false){
            echo "Error de Conexion: ".mysqli_connect_error();
        }
        else{
            //echo "Conexión Existosa";
            return $conexion;
        }
    }


    function consultaDB($consulta,$servidor,$usuario,$contraseña,$bdd) {
        // Connect to the database
        $conexion = CrearConexion($servidor,$usuario,$contraseña,$bdd);
        // Query the database
        $result = mysqli_query($conexion,$consulta);
        mysqli_close($conexion);
        return $result;
    }
?>