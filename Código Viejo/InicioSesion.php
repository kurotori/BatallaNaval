<?php
    include_once "datosbd.php";
    include_once "conexionbd.php";
    include_once "funcionesVarias.php";
    $status="";
    if($_POST){
        $status=$_POST["status"];
    }
    else{
        //$status="errorPass";
    }
    echo $status;
?>
<html>
    <head>
        <meta http-equiv='Content-type' content='text/html;charset=UTF-8'>
		<link rel="stylesheet" href="nuevoJugador.css">
		<script type='text/javascript' src='jquery-3.2.1.js'></script>
		<script type='text/javascript' src='InicioSesion.js'></script>
    </head>
    <body>
        <form id="iniciarSesion" name="iniciarSesion" action="login.php" method="post">
            <table>
                <tr>
                    <td>
                        <h1>Inicio de Sesión</h1>
                    </td>
                </tr>
              <tr>
                <td>Nombre de usuario:</td>
                <td>
                    <input name="nombre" id="nombre" type="text">
                    <br><span id="errorNombre" class="textoError"></span>
                </td>
              </tr>
              <tr>
                <td>Contraseña:</td>
                <td>
                    <input name="contrasenia" id="contrasenia" type="password">
                    <br><span id="errorPass" class="textoError"></span> 
                </td>
              </tr>
              <tr>
                <td><input type="button" value="Entrar al Juego" id="LoginUser">
                  </td>
                <td>
                    <input type="submit" value="OK" style="display:none;">
                  </td>
              </tr>
            </table>

        <?php
            if($status==="errorNoUser"){
                echo "
                    <script type='text/javascript'>
                        $('#nombre').addClass('error');
                        $('#errorNombre').text('No existe ese usuario');
                    </script>
                ";
            }
            if($status==="errorPass"){
                echo "
                    <script type='text/javascript'>
                        $('#contrasenia').addClass('error');
                        $('#errorPass').text('Contraseña Incorrecta');
                    </script>
                ";
            }
        ?>
        </form>
    </body>
</html>