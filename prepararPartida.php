<?php
    $nombre_partida = $_POST["nombre"];
    $num_partida = $_POST["partida"];
    $datos_todos = $_POST["datos_barcos"];

    $datos_barcos = explode("_",$datos_todos);
    echo "$nombre_partida : #$num_partida";
    echo "<br>";
    echo "<br>";
    //Separar los barcos
    foreach($datos_barcos as $barco){
        $datos_barco=explode(":",$barco);
        
        //Separar barcos de las celdas
        $nombre_barco=$datos_barco[0];
        $celdas_barco=$datos_barco[1];
        echo "$nombre_barco<br>";
        
        //Separar Celdas
        $celdas=explode(",",$celdas_barco);
        foreach($celdas as $celda){
            echo "-->$celda<br>";
        }
    }
?>