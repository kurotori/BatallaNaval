<?php
include_once "datosbd.php";
//    
//    $conexion = mysqli_connect($servidor,$usuario,$contraseña,$bdd);
//
//    if($conexion===false){
//        echo "Error de Conexion: ".mysqli_connect_error();
//    }
//    else{
//        echo "Conexión Existosa";
//    }

    //function CrearConexion($servidor,$usuario,$contraseña,$bdd){
       // $conexion = new PDO("mysql:host=$servidor;dbname=$bdd", $usuario, $contraseña);
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
       // return $conexion;
    //}


    function consultaDB($consulta) {
        // Connect to the database
        $conexion = CrearConexion();
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
    
    function crearPartida($conexion,$nombre,$tamanio,$usuario){
        $num_consulta=0;
        try{
            // set the PDO error mode to exception
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = "CALL nueva_partida(:tamanio,:nombre,:usuario)";
            $sentencia = $conexion->prepare($consulta);
            $sentencia->bindParam(':nombre', $nombre);
            $sentencia->bindParam(':tamanio', $tamanio);
            $sentencia->bindParam(':usuario', $usuario);
            
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            //echo $resultado[0][0];
            //print_r ($resultado);
            $num_consulta = $resultado[0][0];
        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }

        $conexion=null;
        return $num_consulta;
    }

    function crearBarco($conexion,$tipo){
        $id_barco=0;
        try{
            // set the PDO error mode to exception
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = "CALL nuevo_barco(:tipo)";
            $sentencia = $conexion->prepare($consulta);
            $sentencia->bindParam(':tipo', $tipo);
            
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            //echo $resultado[0][0];
            //print_r ($resultado);
            $id_barco = $resultado[0][0];
        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }

        $conexion=null;
        return $id_barco;
    }


    function crearYasignarBarco($conexion,$barco,$idUsuario,$idPartida){
        $id_barco=0;
        try{
            // set the PDO error mode to exception
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = "CALL crear_y_asignar_barco(:barco,:idUsuario,:idPartida)";
            $sentencia = $conexion->prepare($consulta);
            $sentencia->bindParam(':barco', $barco);
            $sentencia->bindParam(':idUsuario', $idUsuario);
            $sentencia->bindParam(':idPartida', $idPartida);
            
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            $id_barco = $resultado[0][0];
        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }

        $conexion=null;
        return $id_barco;
    }

    function crearYasignarCeldaABarco($conexion,$idBarco,$celda){
        try{
            // set the PDO error mode to exception
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = "CALL crear_y_asignar_celda_a_barco(:idBarco,:celda)";
            $sentencia = $conexion->prepare($consulta);
            $sentencia->bindParam(':idBarco', $idBarco);
            $sentencia->bindParam(':celda', $celda);
            
            $sentencia->execute();
        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }

        $conexion=null;
    }

    
    function iniciarSesion($id_usuario){
        $id_sesion = 0;
        $conexion = GenerarConexion();
        try{
            // set the PDO error mode to exception
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = "CALL iniciar_sesion(:idUsuario)";
            $sentencia = $conexion->prepare($consulta);
            $sentencia->bindParam(':idUsuario', $id_usuario);
            
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            $id_sesion = $resultado[0][0];
        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }

        $conexion=null;
        return $id_sesion;
    }


?>