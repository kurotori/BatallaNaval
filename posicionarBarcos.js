/*globals $:false */
/* jshint browser: true */


//Contiene la colección de celdas del tablero
var celdas = [];
//Estructura de una celda:
//{nombre:String, barco:Object, esPrimera:bool }

//Contiene la colección de barcos del tablero
var barcos = []; 
//Estructura de un barco: 
//{tipo: String, tamanio: int, asignado: bool, orientacion:String}

var disparos = [];

var columnas = 0;
var filas = 0;

var orientacion = "H";

var barco_actual;
var celda_actual;

//Establece la cantidad y tipos de barcos según el tamaño del tablero
function crearFlota(tamanio){
    switch(tamanio){
        case "min":
            barcos=[
                {tipo:"destructor", tamanio:3, asignado:false},
                {tipo:"escolta", tamanio:2, asignado:false},
                {tipo:"escolta", tamanio:2, asignado:false},
                {tipo:"submarino", tamanio:1, asignado:false}
            ];
            break;
        case "med":
            barcos=[
                {tipo:"acorazado", tamanio:4, asignado:false},
                {tipo:"destructor", tamanio:3, asignado:false},
                {tipo:"escolta", tamanio:2, asignado:false},
                {tipo:"escolta", tamanio:2, asignado:false},
                {tipo:"submarino", tamanio:1, asignado:false},
                {tipo:"submarino", tamanio:1, asignado:false}
            ];
            break;
        case "max":
            barcos=[
                {tipo:"acorazado", tamanio:4, asignado:false},
                {tipo:"destructor", tamanio:3, asignado:false},
                {tipo:"destructor", tamanio:3, asignado:false},
                {tipo:"escolta", tamanio:2, asignado:false},
                {tipo:"escolta", tamanio:2, asignado:false},
                {tipo:"submarino", tamanio:1, asignado:false},
                {tipo:"submarino", tamanio:1, asignado:false}
            ];
            break;
    }
}


//Analiza la ventana y obtiene la dimension adecuada para las celdas, 
// luego crea la colección de barcos para el tablero

function prepararTablero(tamanio){
    //Se establece la cantidad de filas y columnas de acuerdo al tamaño de tablero
    switch(tamanio){
        case "min":
            num_col=8;
            num_fil=5;
            break;
        case "med":
            num_col=12;
            num_fil=8;
            break;
        case "max":
            num_col=16;
            num_fil=10;
            break;
    }
    
    //REDUCIR ESTE CÓDIGO
    //Se obtiene el tamaño en pixeles del objeto contenedor
    var alt_ventana=$('#contenedor_tablero').height();
    var ancho_ventana = $('#contenedor_tablero').width();
    
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

// Listar los barcos generados en el panel lateral
function listarBarcos(){
    $("#panel_lat_contenido>#lista_barcos").html("");
    barcos.forEach(
        function(ele){            
            var cont=$("#panel_lat_contenido>#lista_barcos").html();
            var tipo = "<li id='"+(barcos.indexOf(ele))+"'";
            
            if(ele.asignado){
                tipo = tipo + " class='asignado'>";
            }
            else{
                tipo = tipo + " class='no_asignado'>";
            }
            
            $("#panel_lat_contenido>#lista_barcos").html(cont + tipo +ele.tipo+"</li>");
        }
    );
}

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
function ubicarBarco(objCelda, tamanioBarco, orientacion, filas, columnas){
    var celdasBarco = [];
    //Los barcos se definen desde un extremo, o sea, la celda seleccionada
    // es uno de los extremos del barco
    var letras = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    
    var indexCelda = obtenerCeldaDeID(objCelda);
    var celda_columna = celdas[indexCelda].nombre[0];
    var celda_columna_num = letras.findIndex(ele => ele == celda_columna);
    var celda_fila = parseInt(celdas[indexCelda].nombre.split("-")[1]);
    
    console.log("num_columna:"+celda_columna_num+" num_fila:"+celda_fila);
    
    //Orientación Horizontal
    if(orientacion == "H"){
        //La primer celda del barco esta en la columna A
        if( celda_columna_num < (columnas - tamanioBarco)){
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
    
    if(orientacion=="V"){
        if(celda_fila <= (filas - tamanioBarco +1 )){
            for(c=0;c<tamanioBarco;c++){
                celdasBarco[c]=letras[celda_columna_num] + "-" + (celda_fila + c);
            }
        }
        
        if(celda_fila > (filas - tamanioBarco +1 )){
            for(c=0;c<tamanioBarco;c++){
                celdasBarco[c]=letras[celda_columna_num] + "-" + ((filas-tamanioBarco+1) + c);
            }
        }
        
    }
    
    
    
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

//Cambiar orientación aplicada a los barcos
function cambiarOrientacion(){
    if(orientacion == "H"){
                orientacion = "V";
            }
            else{
                orientacion = "H";
            }
}

//...........................................................

//Cerrar el cuadro de ubicación de barcos
function cerrarCuadroUbicarCuadros(){
    
}


//Ejecución en la página

$(document).ready(
    function(){
    
    listarBarcos();
    
    $(".no_asignado").click(
        function(){
            $(".no_asignado").removeClass("barco_seleccionado");
            var numero = $(this).attr('id');
            barco_actual = barcos[numero];
            $(this).addClass("barco_seleccionado");
            resetCeldas();
        }
    );    
        
    // Procedimiento al dar click en una celda no ocupada
    $(".vacia").click(
        function (e) {
            
            celda_actual = $(this);
            resetCeldas();
            ubicarBarco($(this),barco_actual.tamanio,orientacion,filas,columnas);
            
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
    
    $("#btn_rotar_barco").click(
        function(){
            cambiarOrientacion();
            resetCeldas();
            ubicarBarco(celda_actual,barco_actual.tamanio,orientacion,filas,columnas);
        }
    );
    
    $(".cerrar").click(
        function(){
            $(this).parent().css({"display":"none"});
        }
    );    
        
    }
);


