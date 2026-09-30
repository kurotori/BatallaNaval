<?php
    session_start();
    include_once "funcionesVarias.php";
    include_once "conexionbd.php";
    $id_sesion = 
    
    cerrarSesion($_SESSION['id_sesion']);
    
    session_unset();
    session_destroy();
    //session_write_close();
    //setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
    $_SESSION = array();

    header("Location: index.php");
?>