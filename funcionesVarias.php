<?php
    
    function crearTablero($tamanio){
        $tablero="";
        switch($tamanio){
                case:"min"
                    $
        }
        
        
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
        
    }
    


    function crearSal(){
        $baseSal="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+=][}{";
        $sal="";
        for($i=0;$i<100;$i++){
            $pos=random_int(1,79);
            $letra=substr($baseSal,$pos,1);
            //echo $i."- ".$letra."\n";
            $sal=$sal."".$letra;
        }
        return $sal;
    }

    function crearHash($contrasenia){
        $hashC = password_hash($contrasenia,PASSWORD_DEFAULT);
        return $hashC;
    }
    
    

?>