<?php
    include_once "conexionbd.php";
if(empty($_POST["celda_x"])){
    $celda_x = "";
}
else{
    $celda_x = $_POST["celda_x"];
}



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
        echo "$celda_x";
        ?>
        <div class='tablero'>
        <?php
            // Generación dinámica de la grilla
            
            for($c=1;$c<9;$c++){
                echo "<div class='fila'>";
                
              for($i=1;$i<12;$i++){
                  if($c!=8 && $i==11){
                      echo "<div id='$c-$i' class='celda_enc celda_enc_fila'>$c</div>";
                  }
                  if($c==8 && $i!=11){
                      echo "<div id='$c-$i' class='celda_enc celda_enc_columna'>$i</div>";
                  }
                  if($c!=8 && $i!=11){
                      echo "<div id='$c-$i' class='celda'></div>"; 
                  }
                  if($c==8 && $i==11){
                      echo "<div id='tablero_punta'></div>"; 
                  }
                                    
              }
                echo "</div>";
            }
            
            //echo "<span id='bala'>".$casilla."</span>";
        ?>
        </div>
        <br>
        Realizar disparo en <b><span id="casilla"></span></b>
        <form action="juego.php" method="post">
            <input type="text" name= "celda_x" id="datoC"><input type="submit" value="Disparar">
        </form>
        
 
<script>
    marcarDisparos();
    //
    //$($h).addClass("CasillaSel");
</script>
    </body>
</html>