<?php
    $usuario=12345678;
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
		<script type='text/javascript' src='crearPartida.js'></script>
        <script type="text/javascript" src="jquery-ui/jquery-ui.js"></script>
        <title>Batalla Naval - Crear Nueva Partida</title>
    </head>
    <body>
        <div id="panel_elegir_tablero">
            <form id="crear_partida" name="crear_partida" action="posicionarBarcos.php" method="post">
            
                <span class="titulo">Crear una Partida</span>
                
                <table>
                    <tr>
                    </tr>
                    <tr>
                        <td>
                            <span class="subtitulo">Nombre de la Partida:</span>
                        </td>
                        <td>
                             <input type="text" name="nombre" id="nombre" >
                        </td>
                    </tr>
                </table>
                
                <span class="titulo">Elige el Tamaño del Tablero de Juego</span>
            
                
                <label class="container">Pequeño
                    <input type="radio" name="tamanio" value="min">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Mediano
                    <input type="radio" name="tamanio" value="med" checked>
                    <span class="checkmark"></span>
                </label>
                <label class="container">Grande
                    <input type="radio" name="tamanio" value="max">
                    <span class="checkmark"></span>
                </label>
    <?php
        echo "<input type='hidden' name='usuario' id='usuario' value='$usuario'>";    
    ?>
                
                <div id="bt_dialogo_aceptar" class="boton">ACEPTAR</div> 
            </form>
        </div>
    </body>
</html>