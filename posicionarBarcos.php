<?php

    include_once "conexionbd.php";
    include_once "Tablero.php";
    

?>
<html>
    <head>
        <meta http-equiv='Content-type' content='text/html;charset=UTF-8'>
		<link rel="stylesheet" href="juego.css">
        <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
		<script type='text/javascript' src='jquery.js'></script>
		<script type='text/javascript' src='posicionarBarcos.js'></script>
        <script type="text/javascript" src="jquery-ui/jquery-ui.js"></script>
    </head>
    <body>
        <div id="contenedor_tablero">
            
            <?php
            crearTablero("max");
            ?>
            
        </div>
        
        <div id="panel_lat">
            <div id="panel_lat_titulo">Barcos Disponibles:</div>
            <div id="panel_lat_contenido">
                <ol id="lista_barcos"></ol>
            </div>
            <div id="panel_lat_btn"></div>
        </div>
        
        <div id='caja_ubicar_barco'>
            <div class='cerrar'></div>  
            <div id='ubicar_barco'>
                <button id="btn_rotar_barco">Rotar Barco</button>
            </div>
        </div>
    </body>
</html>