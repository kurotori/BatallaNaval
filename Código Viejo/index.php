<?php
session_start();

include_once "datosApp.php";
include_once "funcionesVarias.php";

if(sesionExiste()){
    header("Location: pagina_usuario.php");
}
    


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

//echo "Modo: $modo - Error: $error";

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
        <script type="text/javascript" src="jquery-ui/datepicker-es.js"></script>
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
            
            <div class="dialogo_mensaje" id="dialogo_espera">
                <div id="contenedor_icono_espera">
                    <div class="loadingio-spinner-double-ring-f0x0maatzdg">
                        <div class="ldio-axtye24iahr">
                            <div></div>
                            <div></div>
                            <div>
                                <div></div>
                            </div>
                            <div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="atribucion">
                    Ícono de espera diseñado en <a href="https://loading.io/" target="_blank">loading.io</a>
                </span>
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
                                    <span class="subtitulo">Nombre de Usuario:</span>
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
                                        <span class="subtitulo registro">Documento ID:</span>
                                    </td>
                                    <td>
                                        <input type="text" name="reg_ci" id="reg_ci" size="20">
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
                            <div id="bt_registrar" class="boton">CREAR USUARIO</div>
                            <div id="bt_cancelar_registro" class="boton">CANCELAR</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <form id="form_login" name="form_login" action="pagina_usuario.php" method="post">
            
            <input id="sesion_id_usuario" name="sesion_id_usuario" type="hidden" /> <br />
            
            <input id="sesion_nombre_u" name="sesion_nombre_u" type="hidden" /> <br />
            
            <input id="sesion_id_sesion" name="sesion_id_sesion" type="hidden" /> <br />
        </form>
        
    </body>
</html>