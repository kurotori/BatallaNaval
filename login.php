<?php
    include_once "datosbd.php";
    include_once "conexionbd.php";
    include_once "funcionesVarias.php";
    //var_dump($_POST);
    $nombre = $_POST["nombre"];
    $contrasenia = $_POST["contrasenia"];
    //$nombre_u = "fulano";
    //$contrasenia = "22222";

    $datos_JSON = new \stdClass();
    $datos_JSON->id_sesion=0;
    $datos_JSON->id_usuario=0;
    $datos_JSON->id_estado=0;
    $datos_JSON->mensaje="";
?>

<?php
    //1 - Búsqueda del usuario por su nombre
    //$sqlLogin="SELECT * FROM usuario where nombre_u='".$nombre_u."'";
    
    //1.1 - Creación de la conexión con la consulta correspondiente y obtención del resultado
    //$resultado=consultaDB($sqlLogin);
        //consultaDB($sqlLogin,$servidor,$usuario,$contraseña,$bdd);
    
    //1.2 - Análisis del resultado de la consulta
    // El resultado debe contener exactamente una (1) fila para que sea el deseado
    // si hay menos de una fila, el usuario no existe, si hay más, el usuario aparece repetido
    // indicando un error interno de la BdD y debe ser invalidado.
    
    if(usuarioExiste($nombre_u)){
            
            $registro = datosDelUsuario($nombre_u);
            //1.3 - Obtención de datos de verificación: id de usuario y el hash
            $id_usuario = $registro->id_usuario;
            $hash = $registro->hash;
            
            //1.4 - Verificación de la contraseña 
            if(password_verify($contrasenia,$hash)){
                
                //1.5 - Obtención del ID de sesión
                $id_sesion=iniciarSesion($id_usuario);         
                $id_estado = 0;
                $mensaje="";
                
                //1.6 - Generación de errores de estado a partir de datos de inicio de sesión
                if($id_sesion->id == 0){
                    // Caso id_sesion = 0 -> No se pudo crear la sesión por errores del servidor,
                    // falla de conexión a MySQL o similares
                    $id_estado = 1;
                    $mensaje= $id_sesion->mensaje;
                }
                else{
                    $id_estado = 10;
                    $mensaje= "OK";
                }
                
                //1. - Pasaje de datos al objeto contenedor
                $datos_JSON->id_sesion=$id_sesion;
                $datos_JSON->id_usuario=$id_usuario;
                $datos_JSON->id_estado=$id_estado;
                $datos_JSON->mensaje=$mensaje;

                }
            //Error de constraseña
            else{
                $datos_JSON->id_sesion=0;
                $datos_JSON->id_usuario=0;
                $datos_JSON->id_estado=3;
                $datos_JSON->mensaje="Contrase&ntilde;a incorrecta";
            }
            
            
    }
    
    //2.0 - El usuario no se encuentra en la base de datos, por lo tanto no existe
    else{
         $datos_JSON->id_sesion=0;
         $datos_JSON->id_usuario=0;
         $datos_JSON->id_estado=2;
         $datos_JSON->mensaje="Usuario no existe";
    }
    
    $JSON_final = json_encode($datos_JSON);
    echo $JSON_final;
?>