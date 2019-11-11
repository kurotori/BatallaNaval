<?php
    include_once "datosbd.php";
    include_once "conexionbd.php";
    
    
    $nombre_partida = $_POST["nombre"];
    $tamanio = $_POST["tamanio"];
    $datos_todos = $_POST["datos_barcos"];
    $usuario = $_POST["usuario"];
    
    $conexion = GenerarConexion();
    
    //Creación de la partida en la base de datos
    $num_partida = crearPartida($conexion,$nombre_partida,$tamanio,$usuario);
    echo "$nombre_partida : #$num_partida de $usuario";

    echo "<br>";
    echo "<br>";

    // Obtención de los datos de los barcos
    // 1 - Separar los barcos
    $datos_barcos = explode("_",$datos_todos);
    
    foreach($datos_barcos as $barco){
        //El objeto '$barco' es un array que contiene el nombre del barco(posición 0),
        // y un listado de celdas ocupadas por el mismo (posición 1).
        $datos_barco=explode(":",$barco);
        
        //Separar barcos de las celdas
        $nombre_barco=$datos_barco[0];   
        $celdas_barco=$datos_barco[1];
        
        //Crear y asignar los barcos al usuario en la BdD
        $conexion = GenerarConexion();
        $id_barco = crearYasignarBarco($conexion,$nombre_barco,$usuario,$num_partida);
        
        echo "$nombre_barco:$id_barco<br>";
        
        //Separar Celdas
        $celdas=explode(",",$celdas_barco);
        foreach($celdas as $celda){
            $conexion = GenerarConexion();
            crearYasignarCeldaABarco($conexion,$id_barco,$celda);
            echo "-->$celda<br>";
        }
    }
?>