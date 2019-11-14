/*globals $:false */
/* jshint browser: true */

function cerrarMenuPrincipal(){
    $("#caja_menu_principal .boton").hide();
    $("#caja_menu_principal").animate(
        {height:"toggle"
         //left:"350px"
        }
    );
}

function abrirMenuLogin(){
    $("#caja_login").delay(800).animate(
        {height:"toggle"
         //left:"20px"
        }
    );
}


$(document).ready(
    function(){
        
        $("#bt_entrar").click(
            function(){
                cerrarMenuPrincipal();
                abrirMenuLogin();
            }
        );
        
    }
);