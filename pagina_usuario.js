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
            function(e){
                console.log("pestania");
                
                //console.log(e.target);
                
                var objeto = e.target;
                var posobj = objeto.baseURI.search("#");
                //console.log(posobj);
                var nombreobj = objeto.baseURI.slice(posobj);
                console.log(nombreobj);
                $(nombreobj).show();
                
                if($(this).hasClass("pestania_inactiva")){
                    $(".pestania").addClass("pestania_inactiva");
                    $(".pestania").removeClass("pestania_activa");
                    $(this).addClass("pestania_activa");
                    $(this).removeClass("pestania_inactiva");                    
                }
//                $(".pestania_activa").removeClass("pestania_activa");
//                $(".pestania").addClass("pestania_inactiva");
//                $(this).removeClass("pestania_inactiva");
//                $(this).addClass("pestania_activa");
            }
        );
    }
);