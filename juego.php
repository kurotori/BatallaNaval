<?php
    include_once "conexionbd.php";
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

$letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

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
            // Generación dinámica de la grilla
            
            
            $dim_x=10 + 1; //largo - cantidad de columnas - dimension horizontal
            $dim_y=8 + 1;  //altura - cantidad de filas - dimension vertical
            $tam_x = (86 * ($dim_x-1))+40;
            $tam_y = (86 * ($dim_y-1))+38;
        
        
        
            echo "<div class='tablero' style='width:".$tam_x."px;height:".$tam_y."px'>";
            //Creación de FILAS
            for($y=0; $y < $dim_y; $y++){
                $etiq_f = $y + 1; //etiquetas para las filas
                echo "<div class='fila' id='fila".$etiq_f."'>";
                
                //Creación de CELDAS en cada fila
                for($x=0; $x < $dim_x; $x++){
                    $etiq_c = $letras[($x)]; //etiquetas para las columnas
                    //Celdas comunes
                    if( $x != ($dim_x - 1) && $y != ($dim_y - 1) ){
                        echo "<div id='$etiq_c-$etiq_f' class='celda vacia'>";
                        echo "</div>"; 
                    }
                    //Celdas con encabezados de columna
                    if( $x != ($dim_x - 1) && $y == ($dim_y - 1) ){
                        echo "<div id='$etiq_c-$etiq_f' class='celda_enc celda_enc_columna'>";
                        echo $etiq_c;
                        echo "</div>";
                    }
                    //Celdas con encabezado de fila
                    if( $x == ($dim_x - 1) && $y != ($dim_y - 1) ){
                        echo "<div id='$etiq_c-$etiq_f' class='celda_enc celda_enc_fila'>";
                        echo $etiq_f;
                        echo "</div>";
                    }
                    //Celda final, no usada
                    if( $x == ($dim_x - 1) && $y == ($dim_y - 1) ){
                        echo "<div id='tablero_punta'></div>";
                    }
                }
                
                echo "</div>";
            }
            
            
            
            //for($c=1;$c<10;$c++){
/*                echo "<div class='fila'>";
                $etiq = $letras[($c)];
              for($i=1;$i<12;$i++){
                  if($c!=9 && $i==11){
                      
                      echo "<div id='$etiq-$i' class='celda_enc celda_enc_fila'>$etiq</div>";
                  }
                  if($c==9 && $i!=11){
                      echo "<div id='$etiq-$i' class='celda_enc celda_enc_columna'>$i</div>";
                  }
                  if($c!=9 && $i!=11){
                      echo "<div id='$etiq-$i' class='celda vacia'></div>"; 
                  }
                  if($c==9 && $i==11){
                       
                  }
                                    
              }
                
            }*/
            
            //echo "<span id='bala'>".$casilla."</span>";
        ?>
        </div>
        
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