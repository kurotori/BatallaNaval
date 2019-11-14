<?php
include_once "datosApp.php";


?>

<html>
    <head>
        <meta http-equiv='Content-type' content='text/html;charset=UTF-8'>
		<link rel="stylesheet" href="inicio.css">
        <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
        <title>
            <?php 
                echo "$nombre_app - v $version_app";
            ?>
        </title>
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
        
		<script type='text/javascript' src='jquery.js'></script>
        <script type="text/javascript" src="inicio.js"></script>
        <script type="text/javascript" src="jquery-ui/jquery-ui.js"></script>
    </head>
    <body>
        
        <div id="caja_centro" >
            <div id="caja_menu">
                <div id="caja_logo"></div>
                <div id="caja_menu_principal">
                    <div id="bt_entrar" class="boton">ENTRAR</div>
                    <div id="bt_registrarse" class="boton">REGISTRARSE</div>
                </div>
                <div id="caja_login">
                    <span class="titulo">Ingresa al Sistema</span>
                    <table>
                        <tr>
                        </tr>
                        <tr>
                            <td>
                                <span class="subtitulo">Nombre de Usuario:</span>
                            </td>
                            <td>
                                <input type="text" name="nombre" id="nombre" >
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
    </body>
</html>