<?php

    include_once "conexionbd.php";
    include_once "Tablero.php";
    

?>
<html>
    <head>
        <meta http-equiv='Content-type' content='text/html;charset=UTF-8'>
		<link rel="stylesheet" href="juego.css">
        <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
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
    </body>
</html>