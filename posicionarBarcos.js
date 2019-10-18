/*globals $:false */
/* jshint browser: true */

var celdas = [];

var barcos = [];

var disparos = [];

var columnas = 0;
var filas = 0;

//Barcos según tablero
function crearFlota(tamanio){
    switch(tamanio){
        case "min":
            barcos=[
                {tipo:"destructor", tamanio:3, asignado:"no"},
                {tipo:"destructor", tamanio:3, asignado:"no"},
                {tipo:"escolta", tamanio:2, asignado:"no"},
                {tipo:"escolta", tamanio:2, asignado:"no"},
                {tipo:"escolta", tamanio:2, asignado:"no"}
            ];
            break;
        case "med":
            barcos=[
                {tipo:"porta-aviones", tamanio:4, asignado:"no"},
                {tipo:"destructor", tamanio:3, asignado:"no"},
                {tipo:"destructor", tamanio:3, asignado:"no"},
                {tipo:"escolta", tamanio:2, asignado:"no"},
                {tipo:"escolta", tamanio:2, asignado:"no"},
                {tipo:"escolta", tamanio:2, asignado:"no"},
                {tipo:"escolta", tamanio:2, asignado:"no"}
            ];
            break;
        case "max":
            barcos=[
                {tipo:"acorazado", tamanio:5, asignado:"no"},
                {tipo:"porta-aviones", tamanio:4, asignado:"no"},
                {tipo:"destructor", tamanio:3, asignado:"no"},
                {tipo:"destructor", tamanio:3, asignado:"no"},
                {tipo:"destructor", tamanio:3, asignado:"no"},
                {tipo:"escolta", tamanio:2, asignado:"no"},
                {tipo:"escolta", tamanio:2, asignado:"no"},
                {tipo:"escolta", tamanio:2, asignado:"no"},
                {tipo:"escolta", tamanio:2, asignado:"no"}
            ];
            break;
    }
}

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
    
    columnas = num_col;
    filas = num_fil;
    crearFlota(tamanio);
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
function ubicarBarco(objCelda,tamanioBarco,orientacion,filas,columnas){
    var celdasBarco = [];
    //Los barcos se definen desde un extremo, o sea, la celda seleccionada
    // es uno de los extremos del barco
    var letras = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    
    var indexCelda = obtenerCeldaDeID(objCelda);
    var celda_columna = celdas[indexCelda].nombre[0];
    var celda_columna_num = letras.findIndex(ele => ele == celda_columna);
    var celda_fila = parseInt(celdas[indexCelda].nombre.split("-")[1]);
    
    console.log("num_columna:"+celda_columna_num);
    
    //Orientación Horizontal
    if(orientacion == "H"){
        //La primer celda del barco esta en la columna A
        if(celda_columna_num >= 0){
            for(c=0;c<tamanioBarco;c++){
                celdasBarco[c]=letras[celda_columna_num + c] + "-" + (celda_fila);
            }
        }
        
        //La celda esta cerca al extremo final de la tabla
        if( celda_columna_num >= (columnas - tamanioBarco)){
            for(c=0;c<tamanioBarco;c++){
                celdasBarco[c]=letras[(columnas - tamanioBarco) + c] + "-" + (celda_fila);
            }
        }
    }
    //if(orientacion=="V")
    
    celdasBarco.forEach(
        function(ele){
            console.log(ele);
            var nombre_celda = "#"+ele;
            var nombre_celda_interna = "#"+ele+" .celda_interna";
            $(nombre_celda_interna).addClass('seleccionada');
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
            ubicarBarco($(this),4,"H",filas,columnas);
            
            $("#datoC").val($(this).attr('id'));
            $("#casilla").text($(this).attr('id'));
            
            var pos_x = $(this).offset();
            $("#caja_ubicar_barco").show();
            $("#caja_ubicar_barco").css({
              "top":(pos_x.top + $(this).height() + 10),
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


