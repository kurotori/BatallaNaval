/*globals $:false */
/* jshint browser: true */
var dato="vacio";
var error_reg = 0;
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
    error_reg = 0;
    
    var regex_1 = /[0-9a-zA-Z]/g;
    var regex_2 = /\s/g;
    
    var nombre_usuario = $("#reg_nombre").val();
    var contrasenia = $("#reg_contrasenia").val();
    var rep_contrasenia = $("#reg_rep_contrasenia").val();
    var ci = $("#reg_ci").val();
    var nombre_per = $("#reg_nombre_p").val();
    var apellido_per = $("#reg_apellido_p").val();
    var fecha_nac_per = $("#reg_fecha_nac_p").val();
    //ERRORES:   
    //nombre vacio
    if( valorEsVacio(nombre_usuario) ){
        error_reg = 1;
        return error_reg;
        chequearError(error_reg);
    }
    //nombre mayor a 8 caracteres
    else if( nombre_usuario.length < 8 ){
        error_reg = 2;
        return error_reg;
        chequearError(error_reg);
    }
    //nombre mayor a 8 caracteres
    else if( nombre_usuario.length < 8 ){
        error_reg = 2;
        return error_reg;
        chequearError(error_reg);
    }
    //nombre contiene espacios
    else if( nombre_usuario.match(regex_2) != null ){
        error_reg = 3;
        return error_reg;
        chequearError(error_reg);
    }
    //nombre contiene palabras prohibidas - 4 - RESERVADO
    
    //Contraseña vacía
    else if(valorEsVacio(contrasenia)){
        error_reg = 5;
        return error_reg;
        chequearError(error_reg);
    }
    //Contraseña menor a 8 caracteres
    else if( contrasenia.length < 8 ){
        error_reg = 6;
        return error_reg;
        chequearError(error_reg);
    }
    //Contraseña superior a 20 caracteres - mismo código de error que anterior
    else if( contrasenia.length > 20 ){
        error_reg = 6;
        return error_reg;
        chequearError(error_reg);
    }
    //Contraseña no es lo suficientemente compleja - 7 - RESERVADO
    
    //Contraseña no coincide con su repetición
    else if( contrasenia != rep_contrasenia ){
        error_reg = 8;
        return error_reg;
        chequearError(error_reg);
    }
    
    //Nombre propio vacío
    else if( nombre_per.length < 1 ){
        error_reg = 9;
        return error_reg;
        chequearError(error_reg);
    }
    //Apellido propio vacío
    else if( apellido_per.length < 1 ){
        error_reg = 10;
        return error_reg;
        chequearError(error_reg);
    }
    //Fecha de nacimiento vacía
    else if( fecha_nac_per.length < 1 ){
        error_reg = 11;
        return error_reg;
        chequearError(error_reg);
    }
    //CI vacía
    else if( ci.length < 1 ){
        error_reg = 12;
        return error_reg;
        chequearError(error_reg);
    }
    //CI inferior a 8 dígitos
    else if( ci.length < 8 ){
        error_reg = 12;
        return error_reg;
        chequearError(error_reg);
    }
    else{
        
        var resultado = $.ajax(
            {
                url: "registro.php",
                method: "POST",
                data:{
                    id_usuario: ci, 
                    nombre_u: nombre_usuario,
                    nombre_p: nombre_per,
                    apellido_p: apellido_per,
                    fecha_nac: fecha_nac_per,
                    contrasenia: contrasenia
                    },
                dataType: "json",
                success:function(data){
                    console.log(data.estado);
                    error_reg = data.estado;
                    chequearError(error_reg);
                }
            }
            );

    }
    
    
    return error_reg;
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

//Resetea la apariencia del formulario y quita la clase error
function resetearErrores(){
    $("*").removeClass("error");
}

//Chequea el error, resalta el campo afectado y muestra el mensaje correspondiente
function chequearError(var_error){
    console.log("Error: "+var_error);
    resetearErrores();
    switch(var_error){
        case 0: 
            mostrarMensajeError("Usuario registrado con éxito.");
            break;
        case 1:
            $("#reg_nombre").addClass("error");
            mostrarMensajeError("El nombre de usuario no puede<br>quedar en blanco.");
            break;
        case 2:
            $("#reg_nombre").addClass("error");
            mostrarMensajeError("El nombre de usuario no puede<br>tener menos de 8 caracteres.");
            break;
        case 3:
            $("#reg_nombre").addClass("error");
            mostrarMensajeError("El nombre de usuario no puede<br>tener espacios.");
            break;
        case 4:
            break;
        case 5:
            $("#reg_contrasenia").addClass("error");
            mostrarMensajeError("Debe ingresar una contraseña.");
            break;
        case 6:
            $("#reg_contrasenia").addClass("error");
            mostrarMensajeError("La contraseña debe tener entre<br>8 y 20 caracteres.");
            break;
        case 7: //RESERVADO
            break;
        case 8:
            $("#reg_contrasenia").addClass("error");
            $("#reg_rep_contrasenia").addClass("error");
            mostrarMensajeError("Las contraseñas no coinciden.");
            break;
        case 9:
            $("#reg_nombre_p").addClass("error");
            mostrarMensajeError("Debe ingresar su nombre.");
            break;
        case 10:
            $("#reg_apellido_p").addClass("error");
            mostrarMensajeError("Debe ingresar su apellido.");
            break;
        case 11:
            $("#reg_fecha_nac_p").addClass("error");
            mostrarMensajeError("Debe ingresar su fecha de nacimiento.");
            break;
        case 12:
            $("#reg_ci").addClass("error");
            mostrarMensajeError("Debe ingresar corréctamente su Documento de Identidad.");
            break;
        case 13: //Error externo: nombre de usuario repetido
            $("#reg_nombre").addClass("error");
            mostrarMensajeError("Este nombre de usuario<br>ya fue registrado.");
            break;
        case 14: //Error externo: usuario ya existe
            $("#reg_ci").addClass("error");
            mostrarMensajeError("Ya hay un usuario registrado<br>con este Documento.");
            break;
    }
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
                //var error_reg = 
                chequearRegistro();
                //chequearError(error_reg);
                console.log("click - "+error_reg);
            }
        );
        
        $("#bt_cancelar_registro").click(
            function(){
                volverMenuPrincipal();
            }
        );
        
        $("#bt_dialogo_aceptar").click(
            function(){
                cerrarMensajeError();
            }
        );
    }
);