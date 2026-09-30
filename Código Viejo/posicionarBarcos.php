<?php
    include_once "datosbd.php";
    include_once "conexionbd.php";
    include_once "Tablero.php";
    
    $usuario = $_POST["usuario"];
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tamanio = validarDatos($_POST["tamanio"]);
        $nombre = validarDatos($_POST["nombre"]);
    }
    //echo "$tamanio - $nombre";
    $conexion = GenerarConexion();
    //$num_partida = crearPartida($conexion,$nombre,$tamanio);
    
?>
<html>
    <head>
        <meta http-equiv='Content-type' content='text/html;charset=UTF-8'>
		<link rel="stylesheet" href="juego.css">
        <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
        <title>
            <?php echo "Batalla Naval - Partida: '$nombre' de $usuario"; ?>
        </title>
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">

        
		<script type='text/javascript' src='jquery.js'></script>
		<script type='text/javascript' src='posicionarBarcos_V2.js'></script>
        <script type="text/javascript" src="jquery-ui/jquery-ui.js"></script>
    </head>
    <body>
        <?php
        
        ?>
        <div id="cuadro_fondo">
            
            <div class="dialogo_mensaje" id="dialogo_pregunta">
                <span class="dialogo_mensaje_txt">¿ALGO ALGO ALGO ALGO ALGO ALGO?</span>
                <div id="bt_dialogo_si" class="boton">SI</div>
                <div id="bt_dialogo_no" class="boton">NO</div>
            </div>
            
            <div class="dialogo_mensaje" id="dialogo_error">
                <span class="dialogo_mensaje_txt">¿ALGO ALGO ALGO ALGO ALGO ALGO?</span>
                <div id="bt_dialogo_aceptar" class="boton">ACEPTAR</div>
            </div>
            
        </div>
        
        <div id="contenedor_tablero">
            
            <?php
            crearTablero($tamanio);
            ?>
            
        </div>
        
        <div id="panel_lat">
            <div id="panel_lat_titulo">BARCOS DISPONIBLES:</div>
            <div id="panel_lat_contenido">
                <ol id="lista_barcos"></ol>
                <div id="bt_guardar_mapa" class="boton tooltip">
                    Guardar Mapa
                    <span class="tooltiptext">Guardar el mapa y continuar</span>
                </div>
                <div id="bt_limpiar_mapa" class="boton tooltip">
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
            <form id="form_enviar_datos" method="post" action="prepararPartida.php">
                <input type="hidden" name="datos_barcos" id="datos_barcos">
    <?php
        echo "<input type='hidden' name='tamanio' id='tamanio' value='$tamanio'>";
        echo "<input type='hidden' name='nombre' id='nombre' value='$nombre'>";
        echo "<input type='hidden' name='usuario' id='usuario' value='$usuario'>";    
    ?>

            </form>
        </div>
        
        
    </body>
</html>