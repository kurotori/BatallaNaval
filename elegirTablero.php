<html>
    <head>
        <meta http-equiv='Content-type' content='text/html;charset=UTF-8'>
		<link rel="stylesheet" href="juego.css">
        <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
        
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">

        
		<script type='text/javascript' src='jquery.js'></script>
		<script type='text/javascript' src='elegirTablero.js'></script>
        <script type="text/javascript" src="jquery-ui/jquery-ui.js"></script>
    </head>
    <body>
        <div id="panel_elegir_tablero">
            <span class="titulo">Elige el tamaño del tablero de juego</span>
            <form id="elegir_tablero" name="elegir_tablero" action="posicionarBarcos.php" method="post">
                
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
                
                <div id="bt_dialogo_aceptar" class="boton">ACEPTAR</div> 
            </form>
        </div>
    </body>
</html>