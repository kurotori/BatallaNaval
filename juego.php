<?php
    include_once "conexionbd.php";


?>
<html>
    <head>
        <meta http-equiv='Content-type' content='text/html;charset=UTF-8'>
		<link rel="stylesheet" href="estiloBase.css">
		<script type='text/javascript' src='jquery-3.2.1.js'></script>
		<script type='text/javascript' src='juego.js'></script>
    </head>
    <body>
        <?php
            // Generación dinámica de la grilla
            echo "<table class='tablero'>\n";
            for($c=1;$c<8;$c++){
              echo "\t\t\t<tr>\n";
              for($i=1;$i<11;$i++){
                  echo "\t\t\t\t<td id='".$c."-".$i."' class='fila'></td>\n";
              }
              echo "\t\t\t</tr>\n";
            }
            echo "</table>";
            echo "<span id='bala'>".$casilla."</span>";
        ?>
        
        <br>
        Realizar disparo en <b><span id="casilla"></span></b>
        <form action="juego.php" method="post">
            <input type="text" name= "datoC" id="datoC"><input type="submit" value="Disparar">
        </form>
        
 
<script>
    marcarDisparos();
    //
    //$($h).addClass("CasillaSel");
</script>
    </body>
</html>