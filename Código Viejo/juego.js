/*globals $:false */
/* jshint browser: true */

var celdas = [];

var barcos = [];

var disparos = [];

//datos de prueba
//------------------------------------------------------------
var barcos_1 = [{posicion: "B-3"},
                {posicion: "C-3"},
                {posicion: "D-3"}
               ];

var celdas_1 = [{nombre: "A-3", alcanzada: true, barco: true},
                {nombre: "C-3", alcanzada: true, barco: false},
                {nombre: "D-4", alcanzada: false, barco: true}
               ];
//------------------------------------------------------------

//Analiza la ventana y obtiene la dimension adecuada para las celdas

function prepararTablero(tamanio) {
    switch(tamanio){
        case "min":
            num_col=8;
            num_fil=5;
            break;
        case "med":
            num_col=10;
            num_fil=8;
            break;
        case "max":
            num_col=16;
            num_fil=10;
            break;
    }
    
    
    var alt_ventana=$('#contenedor_tablero').height();
    var ancho_ventana = $('#contenedor_tablero').width();
    console.log(alt_ventana+","+ancho_ventana);
    var alt_tablero_max=alt_ventana;
    var ancho_tablero_max=ancho_ventana;
    
    var dim_celda = (alt_ventana)/num_fil;
    var dim_celda_interna = dim_celda - 6;
    $('.celda').css({'height':dim_celda, 'width':dim_celda});
    $('.celda_interna').css({'height':dim_celda_interna, 'width':dim_celda_interna});
    
    $('.celda_enc_columna').css({'width':dim_celda - 3});
    
    $('.celda_enc_fila').css({'height':dim_celda - 3});
    $('.celda_enc_fila > span').css({'top':(dim_celda - 23)/2});
    
    var alt_tablero_final = (dim_celda * num_fil)+38;
    var ancho_tablero_final = (dim_celda * num_col)+38;
    
    $('.tablero').css({'height':alt_tablero_final});
    $('.tablero').css({'width':ancho_tablero_final});
    $('.tablero').css({'top':(alt_ventana - alt_tablero_final)/2});
    $('.tablero').css({'left':(ancho_ventana - ancho_tablero_final)/2});
}


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
function agregarDisparo(){}


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
     $(".vacia").removeClass('apunta');
}

//Funcion de prueba, debe reemplazarse por otra
function probarDisparo(x_celda, y_celda ){
    var nombre_celda = "#"+x_celda+"-"+y_celda;
    $(nombre_celda).addClass('agua');
    $(nombre_celda).removeClass("vacia");
}



//Ejecución en la página

$(document).ready(
    function(){
	
    
    inicializarCeldas();
        
    $(".vacia").click(
        function (e) {
            //console.log($(this).attr('id'));
            resetCeldas();
            $("#datoC").val($(this).attr('id'));
            $("#casilla").text($(this).attr('id'));
            $(this).addClass('apunta');
            
            var pos_x = $(this).offset();
            $("#caja_gatillo").show();
            $("#caja_gatillo").css({
              "top":(pos_x.top + 10),
              "left":(pos_x.left + $(this).width() + 10)
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


