<?php
include "datosbd.php";
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
        $conexion = new PDO("mysql:host=$servidor;dbname=$bdd", $usuario, $contraseña);
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


    function consultaDB($consulta,$servidor,$usuario,$contraseña,$bdd) {
        // Connect to the database
        $conexion = CrearConexion($servidor,$usuario,$contraseña,$bdd);
        // Query the database
        $result = mysqli_query($conexion,$consulta);
        mysqli_close($conexion);
        return $result;
    }

    
    function validarDatos($datos){
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }
    
    function crearPartida($conexion,$nombre,$tamanio){
        try{
            //$conexion = CrearConexion($servidorBN,$usuarioBN,$contraseñaBN,$bddBN);
            // set the PDO error mode to exception
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sentencia = $conexion->prepare("INSERT INTO partida(nombre,tamanio) VALUES (:nombre,:tamanio)");
            $sentencia->bindParam(':nombre', $nombre);
            $sentencia->bindParam(':tamanio', $tamanio);
            $sentencia->execute();
            echo "Partida Creada";
        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }

        //$sentencia->close();
        //$conexion->close();
    }
?>