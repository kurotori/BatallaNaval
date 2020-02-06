<?php
    session_start();
    include_once "datosApp.php";
    include_once "funcionesVarias.php";
    
    if(!sesionExiste()){
        header("Location: index.php");
    }

    $id_usuario=0;
    $nombre_u="";
    $id_sesion="";

//Chequeo de datos de sesión: id de usuario
if(empty($_POST["sesion_id_usuario"])){
    $id_usuario = $_SESSION['id_usuario'];
}
else{
    $id_usuario=$_POST["sesion_id_usuario"];
    $_SESSION['id_usuario'] = $id_usuario;
}

//Chequeo de datos de sesión: id de sesión
if(empty($_POST["sesion_id_sesion"])){
    $id_sesion = $_SESSION['id_sesion'];
}
else{
    $id_sesion=$_POST["sesion_id_sesion"];
    $_SESSION['id_sesion'] = $id_sesion;
}

//Chequeo de datos de sesión: nombre de usuario
if(empty($_POST["sesion_nombre_u"])){
    $nombre_u = $_SESSION['nombre_u'];
}
else{
    $nombre_u=$_POST["sesion_nombre_u"];
    $_SESSION['nombre_u'] = $nombre_u;
}
    
    refrescarSesion();
    $nombre_sesion = session_id();
    $status_sesion = session_status();
    $fin_sesion = $_SESSION['expire'];

    
    
?>

<html>
    <head>
        <meta http-equiv='Content-type' content='text/html;charset=UTF-8'>
		<link rel="stylesheet" href="jquery-ui/jquery-ui.css">
        <link rel="stylesheet" href="pagina_usuario.css">
        <link rel="stylesheet" href="tooltip.css">
        <title>
            <?php 
                echo "$nombre_app - v $version_app";
            ?>
        </title>
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
		<script type='text/javascript' src='jquery.js'></script>
        <script type="text/javascript" src="pagina_usuario.js"></script>
        <script type="text/javascript" src="jquery-ui/jquery-ui.js"></script>
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
            <div id="caja_logo"></div>
            <div id="caja_datos_usuario">
                
                    <div id="datos_usuario" >
                        <?php
                            echo "Hola, $nombre_u";
                        ?>
                    </div>
            </div>
            <div id="caja_avatar_controles_usuario">
                <div id="avatar_usuario"></div>
                <div id="controles_usuario">
                    <div id="boton_logout" class="caja_boton_control_usuario tooltip">
                        <span class="tooltiptext izquierda">Cerrar Sesión</span>
                    </div>
                    <div id="boton_ajustes" class="caja_boton_control_usuario tooltip">
                        <span class="tooltiptext izquierda">Perfil y Ajustes</span>
                    </div>
                </div>
            </div> 
            
            
            <div id="caja_pestanias" class="bordes_fondo_naranja">
                <div id="cabecera_pestanias" >
                    <p class="pestania pestania_activa">Crear Partida</p>
                    <p class="pestania pestania_inactiva">Unirse A Una Partida</p>
                </div>
                <div class="contenido_pestania bordes_fondo_naranja"></div>
                
                <!--
                <div class="solapa_pestania borde_simple_fondo_naranja solapa_activa"></div>
                <div class="solapa_pestania borde_simple_fondo_naranja solapa_inactiva"></div>
                <div id="caja_cuerpo_pestania" class="borde_simple_fondo_naranja">
                </div>
                -->
            </div>
            
            <?php
            echo "ID USUARIO: $id_usuario <br>";
            echo "NOM USUARIO: $nombre_u <br>";
            echo "ID SESION: $id_sesion <br> $nombre_sesion <br> $status_sesion <br> $fin_sesion";
            ?>
        </div>
        
    </body>
</html>

