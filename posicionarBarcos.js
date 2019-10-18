/*globals $:false */
/* jshint browser: true */

var celdas = [];

var barcos = [];

var disparos = [];

//datos de prueba
//------------------------------------------------------------
var barcos_1 = [{posicion:"B-3"},
                {posicion:"C-3"},
                {posicion:"D-3"}
               ];

var celdas_1 = [{nombre:"A-3",alcanzada:true,barco:true},
                {nombre:"C-3",alcanzada:true,barco:false},
                {nombre:"D-4",alcanzada:false,barco:true}
               ];
//------------------------------------------------------------

//Analiza la ventana y obtiene la dimension adecuada para las celdas

function prepararTablero(tamanio){
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
//------------------------------------------------------------


//Obtiene la celda a partir de la id del elemento clickeado
function obtenerCeldaDeID(objClickeado){
    var idCelda = objClickeado.attr('id');
    return indexCelda = celdas.findIndex(ele => ele.nombre === idCelda);
}

//------------------------------------------------------------
function asignarCeldasABarco(celdaInicio,orientacion,cantidad){
    for(c=0;c<tamanioBarco;c++){
            
        }
}

//-------------------------------------------------------------------

//Define las celdas que un barco ocupa a partir de la celda inicial
function ubicarBarco(objCelda,tamanioBarco,orientacion){
    //Los barcos se definen desde un extremo, o sea, la celda seleccionada
    // es uno de los extremos del barco
    var letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var indexCelda = obtenerCeldaDeID(objCelda);
    var celda = celdas[indexCelda];
    
    var celdasBarco = [];
    //Orientación Horizontal
    if(orientacion == "H"){
        //La primer celda del barco
        if(celda.nombre[0] == "A"){
            for(c=0;c<tamanioBarco;c++){
                console.log("--->"+celda.nombre[2]);
                celdasBarco[c]="A-"+(parseInt(celda.nombre[2])+c);
                //console.log(celdasBarco[c]);
            }
        }
    
    }
    
    
    celdasBarco.forEach(
        function(ele){
            console.log(ele);
            var nombre_celda = "#"+ele+" .celda_interna";
            $(nombre_celda).addClass('seleccionada');
        }
    );
    
    //console.log(celda.nombre[0]);
}

//-------------------------------------------------------------------

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

//Reiniciar la apariencia de las celdas no ocupadas para que se muestren vacías
function resetCeldas(){
    $(".vacia").removeClass('apunta');
    $(".celda_interna").removeClass('seleccionada');
}


//Ejecución en la página

$(document).ready(
    function(){
	
    
    
        
    $(".vacia").click(
        function (e) {
            
            
            resetCeldas();
            ubicarBarco($(this),3,"H");
            
            $("#datoC").val($(this).attr('id'));
            $("#casilla").text($(this).attr('id'));
            
            var pos_x = $(this).offset();
            $("#caja_gatillo").show();
            $("#caja_gatillo").css({
              "top":(pos_x.top + 10),
              "left":(pos_x.left + $(this).width() + 10)
                              });
        }
    );
    
    $(".cerrar").click(
        function(){
            $(this).parent().css({"display":"none"});
        }
    );    
        
    }
);


