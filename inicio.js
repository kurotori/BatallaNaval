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
    $("#caja_menu_principal .boton").delay(1000).show();
}

function volverAmenu(){
    $(".no_menu_p").animate(
        {height:"toggle"}
    );
    $("#caja_menu_principal").delay(800).animate(
        {height:"toggle"
        },
    );
    $

}

$(document).ready(
    function(){
        
        $("#bt_entrar").click(
            function(){
                cerrarMenuPrincipal();
                abrirMenuLogin();
            }
        );
        
        $(".bt_volver").click(
            function(){
                volverAmenu();
            }
        );
        
    }
);