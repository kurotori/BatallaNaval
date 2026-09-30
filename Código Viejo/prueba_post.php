<?php
    include_once "datosbd.php"; 
    include_once "conexionbd.php";
    include_once "funcionesVarias.php";
//    var_dump($_POST);
    $id_usuario=$_POST["id_usuario"];
    $nombre_u=$_POST["nombre_u"];
    
    $datos_JSON = new \stdClass();
    $datos_JSON->nombre_u = $nombre_u;
    $datos_JSON->id_usuario = $id_usuario;

    echo json_encode($datos_JSON);
    //echo "Nombre_u: ".$nombre_u." - ID usuario: ".$id_usuario;
?>