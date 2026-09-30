<?php
    include_once "datosbd.php";
    include_once "conexionbd.php";
    include_once "funcionesVarias.php";
    //var_dump($_POST);
    $nombre = $_POST["nombre"];
    $contrasenia = $_POST["contrasenia"];
    
    $datos_JSON = "";
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
    $sqlLogin="SELECT * FROM usuario where nombre='".$nombre."'";
    
    
    $resultado=consultaDB($sqlLogin,$servidor,$usuario,$contraseña,$bdd);

    if(mysqli_num_rows($resultado) > 0){
        while($registro = mysqli_fetch_assoc($resultado)){
            $id_usuario=$registro['id'];
            $hash=$registro['hash'];
            
            $sqlSesion="INSERT INTO sesion(id_usuario) values (".$id_usuario.")";
            $sqlSesionesAbiertas="UPDATE sesion SET estado='cerrada' WHERE id_usuario=".$id_usuario;
            $sqlIDsesion="SELECT id FROM sesion WHERE id_usuario=".$id_usuario." AND estado='abierta'";
                
            if(password_verify($contrasenia,$hash)){
                consultaDB($sqlSesionesAbiertas,$servidor,$usuario,$contraseña,$bdd);
                consultaDB($sqlSesion,$servidor,$usuario,$contraseña,$bdd);            
                
                $resultado2=consultaDB($sqlIDsesion,$servidor,$usuario,$contraseña,$bdd);
                
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