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
    cerrarMenuPrincipal();
    $("#caja_menu_principal").delay(600).animate(
        {height:"300px"
        },
        function(){
            $("#cont_login").show();
        }
    );
}

function abrirRegistro(){
    cerrarMenuPrincipal();
    $("#caja_menu_principal").delay(600).animate(
        {height:"550px"
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

function chequearModo(modo){
     switch(modo){
         //modo normal: se muestra el menú inicio.
         case 0: 
             break;
         //modo inicio de sesión: se pasa del menú inicio al menu de inicio de sesión
         // para errores de inicio de sesión.
         case 1:
             abrirMenuLogin();
             break;
         //modo registro: se pasa del menú inicio al menu de registro, para errores
         // durante el proceso de resgistro.
         case 2:
             abrirRegistro();
             break;
     }
}


$(document).ready(
    function(){
        
        $("#reg_fecha_nac_p").datepicker();
        
        chequearModo(modo);
        
        $("#bt_entrar").click(
            function(){
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
                abrirRegistro();
            }
        );
        
    }
);