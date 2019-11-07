<?php
    $datos_barcos = $_POST["datos_barcos"];
    $datos_barcos_barcos = explode("_",$datos_barcos);
    //print_r($datos_barcos_barcos);
    foreach($datos_barcos_barcos as $barco){
        $barco_datos = explode(":",$barco);
        print_r($barco);
    }
?>