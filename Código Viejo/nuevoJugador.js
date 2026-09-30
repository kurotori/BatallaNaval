$(document).ready(
    function(){
	
    $("#crearUser").click(
        function () {
            var nombreValido=false;
            var passValido=false;
            var passIguales=false;
            var nombre = $("#nombre").val();
            var pass1 = $("#contrasenia").val();
            var pass2 = $("#repcontrasenia").val();
            if(!nombre){
                $("#nombre").addClass("error");
                $("#errorNombre").text("El nombre de usuario no puede estar vacío");
            }
            else{
                if(nombre.length < 8){
                    $("#nombre").addClass("error");
                    $("#errorNombre").text("El nombre de usuario debe tener por lo menos 8 caracteres");
                }
                else{
                    $("#nombre").removeClass("error");
                    $("#errorNombre").text("");
                    nombreValido=true;
                }
            }
            
            if(!pass1){
                $("#contrasenia").addClass("error");
                $("#errorPass").text("La contraseña no puede estar vacía");
            }
            else{
                if(pass1.length < 8){
                    $("#contrasenia").addClass("error");
                    $("#errorPass").text("La contraseña debe tener por lo menos 8 caracteres");
                }
                else{
                    $("#contrasenia").removeClass("error");
                    $("#errorPass").text("");
                    passValido=true;
                }
            }
            
            if(!pass2){
                $("#repcontrasenia").addClass("error");
                $("#errorRepPass").text("Debe repetir la contraseña");
            }
            else{
                if(pass1!=pass2){
                     $("#repcontrasenia").addClass("error");
                    $("#errorRepPass").text("Las contraseñas no coinciden");
                }
                else{
                    $("#repcontrasenia").removeClass("error");
                    $("#errorRepPass").text("");
                    passIguales=true;
                }
                
            }
            if(nombreValido){
                if(passValido){
                    if(passIguales){
                        document.getElementById("datosjugador").submit();
                    }
                }
            }
        }
    );
    }
);