/*globals $:false */
/* jshint browser: true */

function cerrarMenuPrincipal(){
    $("#cont_menu_principal").hide();
    //$("#caja_menu_principal .boton").hide();
    $("#caja_menu_principal").animate(
        {height:"0px"
        }
    );
}

function abrirMenuLogin(){    
    $("#caja_menu_principal").delay(600).animate(
        {height:"300px"
        },
        function(){
            $("#cont_login").show();
        }
    );
}

function abrirRegistro(){    
    $("#caja_menu_principal").delay(600).animate(
        {height:"600px"
        },
        function(){
            $("#cont_registro").show();
        }
    );
}

function volverMenuPrincipal(){
    $(".no_menu_p").hide();
    cerrarMenuPrincipal();
    $("#caja_menu_principal").delay(800).animate(
        {height:"185px"
        },
        function(){
            $("#cont_menu_principal").show();
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
        
        $(".bt_volver").click(
            function(){
                volverMenuPrincipal();
            }
        );
        
        $("#bt_registrarse").click(
            function(){
                cerrarMenuPrincipal();
                abrirRegistro();
            }
        );
        
    }
);