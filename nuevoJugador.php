<?php
    include_once "datosbd.php";
    include_once "conexionbd.php";
    include_once "funcionesVarias.php";
?>
<html>
    <head>
        <meta http-equiv='Content-type' content='text/html;charset=UTF-8'>
		<link rel="stylesheet" href="nuevoJugador.css">
		<script type='text/javascript' src='jquery-3.2.1.js'></script>
		<script type='text/javascript' src='nuevoJugador.js'></script>
    </head>
    <body>
        <form id="datosjugador" name="datosjugador" action="registro.php" method="post">
            <table>
                <tr>
                    <td>
                        <h1>Nuevo Usuario</h1>
                    </td>
                </tr>
              <tr>
                <td>Nombre de usuario:</td>
                <td>
                    <input name="nombre" id="nombre" type="text">
                    <span id="errorNombre" class="textoError"></span>
                </td>
              </tr>
              <tr>
                <td>Contraseña:</td>
                <td>
                    
                    <input name="contrasenia" id="contrasenia" type="password">
                    <span id="errorPass" class="textoError"></span>
                </td>
              </tr>
              <tr>
                <td>Repetir Contraseña: </td>
                <td>
                    <input id="repcontrasenia" type="password">
                    <span id="errorRepPass" class="textoError"></span>
                </td>
              </tr>
              <tr>
                <td><input type="button" value="Crear Usuario" id="crearUser">
                  </td>
                <td>
                    <input type="submit" value="OK" style="display:none;">
                  </td>
              </tr>
            </table>
        <?php
            //$pass = "solamenteyo";
            //$sal=crearHash($pass);
            //echo "<br/><span style=font-family:monospace;>".$sal."</span><br/>";
            //echo password_verify($pass,$sal);
            //$n = 100;
            //$t = true;
            //echo (openssl_random_pseudo_bytes ( $n, $t ));
        ?>
        
        </form>
    </body>
</html>