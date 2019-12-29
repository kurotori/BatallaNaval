<?php
    include_once "datosbd.php";
    include_once "conexionbd.php";
    include_once "funcionesVarias.php";
    //var_dump($_POST);
    $nombre = $_POST["nombre"];
    $contrasenia = $_POST["contrasenia"];
    
    $datos_JSON->id_sesion=0;
    $datos_JSON->id_usuario=0;
    $datos_JSON->id_estado=0;
?>
<html>
    <head>
        <meta http-equiv='Content-type' content='text/html;charset=UTF-8'>
		<link rel="stylesheet" href="nuevoJugador.css">
		<script type='text/javascript' src='jquery-3.2.1.js'></script>
		<script type='text/javascript' src='nuevoJugador.js'></script>
    </head>
    <body>

<?php
    //1 - Búsqueda del usuario por su nombre
    $sqlLogin="SELECT * FROM usuario where nombre='".$nombre."'";
    
    //1.1 - Creación de la conexión con la consulta correspondiente y obtención del resultado
    $resultado=consultaDB($sqlLogin);
        //consultaDB($sqlLogin,$servidor,$usuario,$contraseña,$bdd);
    
    //1.2 - Análisis del resultado de la consulta
    // El resultado debe contener exactamente una (1) fila para que sea el deseado
    // si hay menos de una fila, el usuario no existe, si hay más, el usuario aparece repetido
    // indicando un error interno de la BdD y debe ser invalidado.
    if(mysqli_num_rows($resultado) == 1){
        while($registro = mysqli_fetch_assoc($resultado)){
            
            //1.3 - Obtención de datos de verificación: id de usuario y el hash
            $id_usuario=$registro['id'];
            $hash=$registro['hash'];
            
            //1.4 - Verificación de la contraseña 
            if(password_verify($contrasenia,$hash)){
                
                //1.5 - Obtención del ID de sesión
                $id_sesion=iniciarSesion($id_usuario);         
                $id_estado = 0;
                //1.6 - Generación de errores de estado a partir de datos de inicio de sesión
                if($id_sesion == 0){
                    // Caso id_sesion = 0 -> No se pudo crear la sesión por errores del servidor,
                    // falla de conexión a MySQL o similares
                    $id_estado = 1;
                }
                
                
                
                
                //1. - Pasaje de datos al objeto contenedor
                $datos_JSON->id_sesion=$id_sesion;
                $datos_JSON->id_usuario=$id_usuario;
                $datos_JSON->id_estado=$id_estado;
                
                
                
                
                
                
                if(mysqli_num_rows($resultado2) > 0){
                    
                    $id_sesion=0;
                     while($sesiones = mysqli_fetch_assoc($resultado2)){
                         $id_sesion=$sesiones['id'];
                         //echo "ID SESION: ".$id_sesion;
                        }
                        echo "
                            <br>
                            Bienvenido <b>".$nombre."</b><br>
                            <form id='irAJuego' action='inicioJuego.php' method='post'>
                                <input name='id_sesion' type='hidden' value='".$id_sesion."'>
                                <input name='nombre' type='hidden' value='".$nombre."'>
                                <input type='submit' value='Continuar'>
                            </form>
                        ";
                    }
                else{
                    echo "
                    <br>
                    Error, no fue posible iniciar sesión<br>
                    Por favor intente nuevamente más tarde.
                            <form id='irAJuego' action='InicioSesion.php' method='post'>
                                <input name='id_sesion' type='hidden' value='".$id_sesion."'>
                                <input type='submit' value='Continuar'>
                            </form>
                    ";
                }
                
                }
            else{
                echo "
                    <br>
                    Error, la contraseña no es correcta<br>
                            <form id='irAJuego' action='InicioSesion.php' method='post'>
                                <input name='status' type='hidden' value='errorPass'>
                                <input name='nombre' type='hidden' value='".$nombre."'>
                                <input type='submit' value='Continuar'>
                            </form>";
                
                    }
            }
    }
    else{
        
        echo "
                    <br>
                    Error, el usuario <b>".$nombre."</b>, no existe<br>
                            <form id='irAJuego' action='InicioSesion.php' method='post'>
                                <input name='status' type='hidden' value='errorNoUser'>
                                <input type='submit' value='Continuar'>
                            </form>";
    }
?>
    </body>
</html>