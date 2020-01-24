<?php
    
    
    


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
    
//Funciones de manejo de sesión a nivel servidor

    function sesionExiste(){
        $resultado = false;
        if(isset($_SESSION['id_usuario'])){
            if(isset($_SESSION['id_sesion'])){
                if(isset($_SESSION['nombre_u'])){
                    $resultado = true;
                }
            }
        }
        return $resultado;
    }
    
    function refrescarSesion(){
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;
    }

?>