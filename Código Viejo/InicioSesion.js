$(document).ready(
    function(){ 

        $("#LoginUser").click(
                function () {
                    var nombre = $("#nombre").val();
                    var pass1 = $("#contrasenia").val();
                    if(!nombre){
                        $("#nombre").addClass("error");
                        $("#errorNombre").text("El nombre de usuario no puede estar vacío");
                    }
                    if(!pass1){
                        $("#contrasenia").addClass("error");
                        $("#errorPass").text("La contraseña no puede estar vacía");
                    }

                    if(nombre && pass1){
                        document.getElementById("iniciarSesion").submit();
                    }
                }
             );
    }
);