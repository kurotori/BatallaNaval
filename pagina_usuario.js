/*globals $:false */
/* jshint browser: true */


//Permite mostrar el diálogo de espera
function mostrarDialogoEspera(){
    $("#cuadro_fondo").show();
    $("#dialogo_espera").show();
}

//Permite ocultar el diálogo de espera
function ocultarDialogoEspera(){
    $("#cuadro_fondo").hide();
    $("#dialogo_espera").hide();
}

//Permite establecer y mostrar el mensaje de error en el diálogo de error
function mostrarMensajeError(mensaje){
    $("#cuadro_fondo").show();
    $("#dialogo_error").show();
    $("#dialogo_mensaje_msg").html(mensaje);
}

//Permite cerrar el mensaje de error
function cerrarMensajeError(){
    $("#cuadro_fondo").hide();
    $("#dialogo_error").hide();
}

//Permite establecer y mostrar el mensaje en el diálogo de pregunta
function mostrarMensajePregunta(mensaje){
    $("#cuadro_fondo").show();
    $("#dialogo_pregunta").show();
    $("#dialogo_pregunta_msg").html(mensaje);
}

//Permite cerrar el mensaje de pregunta
function cerrarMensajePregunta(){
    $("#cuadro_fondo").hide();
    $("#dialogo_pregunta").hide();
}

//Eventos de la interfáz de usuario
$(document).ready(
    function(){
        
        //Logout del usuario
        $("#boton_logout").click(
            function(){
                mostrarMensajePregunta("Va a cerrar la sesión<br>¿Continuar?");
                $("#bt_dialogo_si").click(
                    function(){
                        window.location.href='logout.php';
                    }
                );
                $("#bt_dialogo_no").click(
                    function(){
                        cerrarMensajePregunta();
                    }
                );
            }
        );
    }
);