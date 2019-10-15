<?php
    include_once "conexionbd.php";
    include_once "funcionesVarias.php";
//Obtención de datos de disparos
if(empty($_POST["celda_x"])){
    $celda_x = 0;
    $celda_y = 0;
}
else{
    $celda = explode("-",$_POST["celda_x"]);
    $celda_x = $celda[0];
    $celda_y = $celda[1];
}
//--------------------------------



?>
<html>
    <head>
        <meta http-equiv='Content-type' content='text/html;charset=UTF-8'>
		<link rel="stylesheet" href="estiloBase.css">
        <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
		<script type='text/javascript' src='jquery.js'></script>
		<script type='text/javascript' src='juego.js'></script>
        <script type="text/javascript" src="jquery-ui/jquery-ui.js"></script>
    </head>
    <body>
        
        <?php
            crearTablero("min");
        ?>
        
        <div id="caja_gatillo">
            
            <div class="cerrar"></div>
            <div id="gatillo">
                Fuego en <b><span id="casilla"></span></b>
                <form action="juego.php" method="post">
                    <input type="hidden" name= "celda_x" id="datoC">
                    <input type="submit" value="" class="disparar">
                </form>
            </div>
        </div>
        
        <?php
        echo "<script>";
        echo "probarDisparo($celda_x,$celda_y);";
        echo "</script>";
        echo "x:$celda_x - y:$celda_y";
        ?>
 
    </body>
</html>