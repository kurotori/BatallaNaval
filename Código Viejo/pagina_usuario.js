/*globals $:false */
/* jshint browser: true */

var cosa;
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

//Permite cambiar de pestaña activa al dar click sobre una pestaña inactiva
function activarPestania(pestania){
    
    var datosPestania = pestania.html();
    var posObj = datosPestania.search("#");
    var posFinObj = datosPestania.search(">") - 1;
    var nombreObj = datosPestania.slice(posObj,posFinObj);

    console.log("pestania: "+nombreObj);

    $(".contenido_pestania").hide();
    $(nombreObj).show();

    if($(this).hasClass("pestania_inactiva")){
        $(".pestania").addClass("pestania_inactiva");
        $(".pestania").removeClass("pestania_activa");
        $(this).addClass("pestania_activa");
        $(this).removeClass("pestania_inactiva");                    
    }
}


//Eventos de la interfáz de usuario
$(document).ready(
    function(){
        //$("#caja_pestanias").tabs();
        
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
        
        $(".pestania").click(
            function(){
                activarPestania($(this));
                
            }
        );
    }
);