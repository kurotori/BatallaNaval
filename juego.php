<?php
    include_once "conexionbd.php";
if(empty($_POST["celda_x"])){
    $celda_x = 0;
    $celda_y = 0;
}
else{
    $celda = explode("-",$_POST["celda_x"]);
    $celda_x = $celda[0];
    $celda_y = $celda[1];
}



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
                      echo "<div id='$c-$i' class='celda vacia'></div>"; 
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
        
        <div id="caja_gatillo">
            
            <div class="cerrar">x</div>
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
 
<script>
    marcarDisparos();
    //
    //$($h).addClass("CasillaSel");
</script>
    </body>
</html>