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

//Chequea el valor de un campo para determinar si es vacío,
//chequeando su longitud.
function valorEsVacio(dato){
    var resultado = false;
    if (dato.length<1){
        resultado = true;
    }
    return resultado;
}

function chequearRegistro(){
    var error_reg = 0;
    
    var regex_1 = /[0-9a-zA-Z]/g;
    var regex_2 = /\s/g;
    
    var nombre_usuario = $("#reg_nombre").val();
    var contrasenia = $("#reg_contrasenia").val();
    var rep_contrasenia = $("#reg_rep_constrasenia").val();
    var nombre_p = $("#reg_nombre_p").val();
    var apellido_p = $("#reg_apellido_p").val();
    var fecha_nac_p = $("#reg_fecha_nac_p").val();
    //ERRORES:   
    //nombre vacio
    if( valorEsVacio(nombre_usuario) ){
        error_reg = 1;
        return error_reg;
    }
    //nombre menor a 8 caracteres
    if( nombre_usuario.length < 8 ){
        error_reg = 2;
        return error_reg;
    }
    //nombre contiene espacios
    if( nombre_usuario.match(regex_2) != null ){
        error_reg = 3;
        return error_reg;
    }
    return error_reg;
}


$(document).ready(
    function(){
        
        $.datepicker.setDefaults( $.datepicker.regional[ "es" ] );
       
       $("#reg_fecha_nac_p").datepicker({dateFormat:'yy-mm-dd'});
        
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
        
        $("#bt_registrar").click(
            function(){
                chequearRegistro();
                console.log("click");
            }
        );
        
        $("#bt_cancelar_registro").click(
            function(){
                volverMenuPrincipal();
            }
        );
    }
);