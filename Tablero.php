<?php
        
        $tablero="";
    
        
    function crearTablero($tamanio){
        $letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        switch($tamanio){
            case "med":
                    $dim_x=13; //12 + 1
                    $dim_y=9;  //8 + 1
                    break;
            case "min":
                    $dim_x=9; //8 + 1
                    $dim_y=6;  //5 + 1
                    break;
            case "max":
                    $dim_x=17; //16 + 1
                    $dim_y=11;  //10 + 1
                    break;
            default:
                    $dim_x=9; //8 + 1
                    $dim_y=6;  //5 + 1
                    break;
        }
        
        
        // Generación dinámica de la grilla
            /*  tamaño  celdas  tamaño de celda  
            min 8x5     40      86 px
            med 10x8    80      56 px
            max 16x10   160     46 px
            
            
            $dim_x=10 + 1; //largo - cantidad de columnas - dimension horizontal
            $dim_y=8 + 1;  //altura - cantidad de filas - dimension vertical
            $tam_x = (86 * ($dim_x-1))+40;
            $tam_y = (86 * ($dim_y-1))+38;
            */
        
            echo "<div class='tablero'>";
            //Creación de FILAS
            for($y=0; $y < $dim_y; $y++){
                $etiq_f = $y + 1; //etiquetas para las filas
                echo "<div class='fila' id='fila".$etiq_f."'>";
                
                //Creación de CELDAS en cada fila
                for($x=0; $x < $dim_x; $x++){
                    $etiq_c = $letras[($x)]; //etiquetas para las columnas
                    //Celdas comunes
                    if( $x != ($dim_x - 1) && $y != ($dim_y - 1) ){
                        echo "<div id='$etiq_c-$etiq_f' class='celda vacia $tamanio'>";
                        echo "<div class='celda_interna'></div>";
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
                        echo "<span>".$etiq_f."</span>";
                        echo "</div>";
                    }
                    //Celda final, no usada
                    if( $x == ($dim_x - 1) && $y == ($dim_y - 1) ){
                        echo "<div id='tablero_punta'></div>";
                    }
                }
                
                echo "</div>";
            }
        echo "<script>";

        echo "var tamanio='$tamanio';";
       
        echo "</script>";
        
    }
     
    
    
?>