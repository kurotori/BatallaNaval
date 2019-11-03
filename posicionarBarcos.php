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
        <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">

        
		<script type='text/javascript' src='jquery.js'></script>
		<script type='text/javascript' src='posicionarBarcos_V2.js'></script>
        <script type="text/javascript" src="jquery-ui/jquery-ui.js"></script>
    </head>
    <body>
        <div id="cuadro_fondo">
            <div class="dialogo_mensaje">
                <span class="dialogo_mensaje_txt">¿ALGO ALGO ALGO ALGO ALGO ALGO?</span>
                <div id="bt_dialogo_si" class="boton">SI</div>
                <div id="bt_dialogo_no" class="boton">NO</div>
            </div>
        </div>
        
        <div id="contenedor_tablero">
            
            <?php
            crearTablero("med");
            ?>
            
        </div>
        
        <div id="panel_lat">
            <div id="panel_lat_titulo">BARCOS DISPONIBLES:</div>
            <div id="panel_lat_contenido">
                <ol id="lista_barcos"></ol>
                <div id="bt_guardar_mapa" class="boton inactivo tooltip">
                    Guardar Mapa
                    <span class="tooltiptext">Guardar el mapa y continuar</span>
                </div>
                <div id="bt_limpiar_mapa" class="boton inactivo tooltip">
                    Limpiar Mapa
                    <span class="tooltiptext">Limpiar el mapa de todos los barcos</span>
                </div>
            </div>
            <div id="panel_lat_btn"></div>
        </div>
        
        <div id='caja_ubicar_barco'>
            <div class='cerrar'></div>  
            <div id='ubicar_barco'>
                <div id="bt_rotar" class="boton tooltip">
                    <span class="tooltiptext">Rotar Barco</span>
                </div>
                <div id="bt_colocar" class="boton tooltip">
                    <span class="tooltiptext">Colocar Barco</span>
                </div>
            </div>
        </div>
        
        <div id="formulario_enviar">
            <form>
                <input type="text" name="lista_barcos_enviar" id="lista_barcos_enviar">
            </form>
        </div>
        
        
    </body>
</html>