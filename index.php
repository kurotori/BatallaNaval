<?php
include_once "datosApp.php";

if(empty($_GET["modo"])){
    $modo = 0;
}
else{
    $modo = $_GET["modo"];
}

if(empty($_GET["error"])){
    $error = 0;
}
else{
    $error = $_GET["error"];
}






echo "Modo: $modo - Error: $error";



?>

<html>
    <head>
        <meta http-equiv='Content-type' content='text/html;charset=UTF-8'>
		<link rel="stylesheet" href="jquery-ui/jquery-ui.css">
        <link rel="stylesheet" href="inicio.css">
        <title>
            <?php 
                echo "$nombre_app - v $version_app";
            ?>
        </title>
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
        <script type="text/javascript">
            <?php
            echo "var modo=$modo;";
            echo "var error=$error;";
            ?>
        </script>
		<script type='text/javascript' src='jquery.js'></script>
        <script type="text/javascript" src="inicio.js"></script>
        <script type="text/javascript" src="jquery-ui/jquery-ui.js"></script>
        <script type="text/javascript"></script>
    </head>
    <body>
        
        <div id="cuadro_fondo">
            
            <div class="dialogo_mensaje" id="dialogo_pregunta">
                <span id="dialogo_pregunta_msg" class="dialogo_mensaje_txt">¿ALGO ALGO ALGO?</span>
                <div id="bt_dialogo_si" class="boton">SI</div>
                <div id="bt_dialogo_no" class="boton">NO</div>
            </div>
            
            <div class="dialogo_mensaje" id="dialogo_error">
                <span id="dialogo_mensaje_msg" class="dialogo_mensaje_txt">¿ALGO ALGO ALGO ALGO?</span>
                <div id="bt_dialogo_aceptar" class="boton">ACEPTAR</div>
            </div>
            
        </div>
        
        <div id="caja_centro" >
            <div id="caja_menu">
                <div id="caja_logo"></div>
                
                <div id="caja_menu_principal">
                    <div id="cont_menu_principal">
                        <div id="bt_entrar" class="boton">ENTRAR</div>
                        <div id="bt_registrarse" class="boton">REGISTRARSE</div>
                    </div>
                
                    <div class="no_menu_p" id="cont_login">
                        <span class="titulo">Ingresa al Sistema</span>
                        <table class="tabla_inicio">
                            <tr>
                            </tr>
                            <tr>
                                <td>
                                    <span class="subtitulo registro">Nombre de Usuario:</span>
                                </td>
                                <td>
                                    <input type="text" name="nombre" id="nombre" >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="subtitulo">Contraseña:</span>
                                </td>
                                <td>
                                    <input type="password" name="contrasenia" id="contrasenia" >
                                </td>
                            </tr>
                        </table>
                        <div id="bt_login" class="boton">INICIAR SESIÓN</div>
                        <div class="boton bt_volver">&lt;&lt;&nbsp;&nbsp;Regresar</div>
                    </div>
                    
                    <div class="no_menu_p" id="cont_registro">
                        <span class="titulo">Regístrate Como Usuario</span>
                        <form>
                            <table class="tabla_inicio">
                                <tr>
                                    <td colspan="2">
                                    <span class="subtitulo seccion_tabla">Datos de Usuario</span>
                                    </td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td>
                                        <span class="subtitulo registro">Nombre de Usuario:</span>
                                    </td>
                                    <td>
                                        <input type="text" name="reg_nombre" id="reg_nombre" size="16" >
                                    </td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td>
                                        <span class="subtitulo registro">Contraseña:</span>
                                    </td>
                                    <td>
                                        <input type="password" name="reg_contrasenia" id="reg_contrasenia" >
                                    </td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td>
                                        <span class="subtitulo registro">Repetir Contraseña:</span>
                                    </td>
                                    <td>
                                        <input type="password" name="reg_rep_contrasenia" id="reg_rep_contrasenia" >
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <span class="subtitulo seccion_tabla">
                                            Datos Personales
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="subtitulo registro">Nombre:</span>
                                    </td>
                                    <td>
                                        <input type="text" name="reg_nombre_p" id="reg_nombre_p" size="30">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="subtitulo registro">Apellido:</span>
                                    </td>
                                    <td>
                                        <input type="text" name="reg_apellido_p" id="reg_apellido_p" size="30">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="subtitulo registro">Fecha de Nacimiento:</span>
                                    </td>
                                    <td>
                                        <input type="text" name="reg_fecha_nac_p" id="reg_fecha_nac_p">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>