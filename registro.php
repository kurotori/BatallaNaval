<?php
    include_once "datosbd.php"; 
    include_once "conexionbd.php";
    include_once "funcionesVarias.php";
//    var_dump($_POST);
    $id_usuario=$_POST["id_usuario"];
    $nombre_u=$_POST["nombre_u"];
    $nombre_p=$_POST["nombre_p"];
    $apellido_p=$_POST["apellido_p"];
    $fecha_nac=$_POST["fecha_nac"];
    $contrasenia=$_POST["contrasenia"];
    //echo $nombre." ".$contrasenia;
    $hash=crearHash($contrasenia);
    
    $datos_JSON = new \stdClass();
    $datos_JSON->estado=0;
    $datos_JSON->mensaje="";
    
    $resultado = registrarUsuario($id_usuario,$nombre_u,$nombre_p,$apellido_p,$fecha_nac,$hash);
    
    $datos_JSON->estado = $resultado->error;
    $datos_JSON->mensaje = $resultado->mensaje;
    
    echo json_encode($datos_JSON);
?>