/*globals $:false */
/* jshint browser: true */

var celdas = [];

var barcos = [];

var disparos = [];

//datos de prueba
//------------------------------------------------------------
var barcos_1 = [{posicion:"5-3"},
                {posicion:"4-3"},
                {posicion:"3-3"}
               ];

var celdas_1 = [{nombre:"4-5",alcanzada:true,barco:true},
                {nombre:"7-4",alcanzada:true,barco:false},
                {nombre:"2-9",alcanzada:false,barco:true}
               ];
//------------------------------------------------------------

//Inicializa las celdas en una colección para que JS reconozca el tablero
function inicializarCeldas(){
    $(".celda").each(
        function(){
            celdas[celdas.length] = {nombre:$(this).attr('id'),
                                     alcanzada:false,
                                     barco:false
                                    };
        }
    );
}

//Analiza el listado de barcos y actualiza el listado de  celdas con esa información
function barcosACeldas(lista_barcos=[]){
    for(barco of lista_barcos){
        celdas.find(
            function(element){
                return element.nombre == barco.posicion;
            }
        ).barco = true;
    }
}

//Agrega un disparo nuevo a la lista
function agregarDisparo()


//Agregan la imagen correspondiente a una celda alcanzada por un disparo
function agregarBlanco(una_celda){
            var nombre = "#"+una_celda.nombre;
            $(nombre).html("<div class='blanco'></div>");
            $(nombre).removeClass("vacia");
}

function agregarAgua(una_celda){
            var nombre = "#"+una_celda.nombre;
            $(nombre).html("<div class='agua'></div>");
            $(nombre).removeClass("vacia");
}

//Actualiza el estado de cada celda de acuerdo a su estado
function revisarCeldas(lista_celdas=[]){
    for(celda of lista_celdas){
        if(celda.alcanzada){
            switch(celda.barco){
                case true:
                    agregarBlanco(celda);
                    break;
                case false:
                    agregarAgua(celda);
                    break;
            }   
        }
    }
}


function resetCeldas(){
     $(".vacia").html("");
}

//Funcion de prueba, debe reemplazarse por otra
function probarDisparo(x_celda, y_celda ){
    var nombre_celda = "#"+x_celda+"-"+y_celda;
    $(nombre_celda).html("<div class='agua'></div>");
    $(nombre_celda).removeClass("vacia");
}



//Ejecución en la página

$(document).ready(
    function(){
	
    inicializarCeldas();
    barcosACeldas(barcos_1);
        //revisarCeldas(celdas_1);
        
    $(".vacia").click(
        function (e) {
            //console.log($(this).attr('id'));
            resetCeldas();
            $("#datoC").val($(this).attr('id'));
            $("#casilla").text($(this).attr('id'));
            $(this).html("<div class='apunta'></div>");
            var pos_x = $(this).offset();
            $("#caja_gatillo").show();
            $("#caja_gatillo").css({
              "top":(pos_x.top+40),
              "left":(pos_x.left + 80)
                              });
            //$("#gatillo")
        }
    );
    
    $(".cerrar").click(
        function(){
            $(this).parent().css({"display":"none"});
        }
    );    
        
    }
);


