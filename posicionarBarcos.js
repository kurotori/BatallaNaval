/*globals $:false */
/* jshint browser: true */


//Contiene la colección de celdas del tablero
var celdas = [];
//Estructura de una celda:
//{nombre:String, barco:Object, inicial:bool }

//Contiene la colección de barcos del tablero
var barcos = []; 
//Estructura de un barco: 
//{tipo: String, tamanio: int, asignado: bool, orientacion:String, celdas:Object}

var columnas = 0;
var filas = 0;

var orientacion = "H";

var barco_actual = null;
var celda_actual = null;


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
            //{nombre:String, asignada:bool, barco:Object, inicial:bool }
            celdas[celdas.length] = {nombre:$(this).attr('id'),
                                     asignada:false,
                                     barco:null,
                                     inicial:false
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
function obtenerCeldaDeID(obj){
    var idCelda = obj.attr('id');
    return indexCelda = celdas.findIndex(ele => ele.nombre === idCelda);
}

//------------------------------------------------------------
function asignarCeldasABarco(celdaInicio,orientacion,cantidad){
    for(c=0;c<tamanioBarco;c++){
            
        }
}

//-------------------------------------------------------------------

//Define las celdas que un barco ocupa a partir de la celda inicial
function marcarBarco(tamanioBarco, orientacion, filas, columnas){
    var celdasBarco = [];
    //Los barcos se definen desde un extremo, o sea, la celda seleccionada
    // es uno de los extremos del barco
    var letras = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    
    var idCelda = "#"+celdas[celda_actual].nombre;
    
    if($(idCelda).hasClass("vacia")){
        var indexCelda = celda_actual;//obtenerCeldaDeID(objCelda);
        var celda_columna = celdas[indexCelda].nombre[0];
        var celda_columna_num = letras.findIndex(ele => ele == celda_columna);
        var celda_fila = parseInt(celdas[indexCelda].nombre.split("-")[1]);

        //console.log("num_columna:"+celda_columna_num+" num_fila:"+celda_fila);

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

        var c = celdasBarco.findIndex(ele => $("#"+ele).hasClass("celda_asignada"));
        console.log("----"+c);
        
        celdasBarco.forEach(
            function(ele){
                //console.log(ele);
                var nombre_celda = "#"+ele;
                var nombre_celda_interna = "#"+ele+" .celda_interna";
                $(nombre_celda_interna).addClass('seleccionada');
            }
        );
    }
    return celdasBarco;
    //console.log(celda.nombre[0]);
}

//-------------------------------------------------------------------

function colocarBarco(celda_ini, barco){
    var celdas_barco = marcarBarco(barco.tamanio,orientacion,filas,columnas);
        
    //Procesar primera celda
    var indiceCelda = celdas.findIndex( e => e.nombre === celdas_barco[0]);
    celdas[indiceCelda].inicial = true;
    
    var idCelda = "#"+celdas[indiceCelda].nombre;
    $(idCelda).addClass(orientacion + " barco_normal_frente celda_asignada");
    
    celdas_barco.forEach(
        function(ele){
            //Se ubica la ID de la celda en el array
            indiceCelda = celdas.findIndex( e => e.nombre === ele);
            console.log(indiceCelda);
            
            celdas[indiceCelda].asignada=true;
            celdas[indiceCelda].barco = barco;
            
            idCelda = "#"+celdas[indiceCelda].nombre;
            $(idCelda).removeClass("vacia");
            var nombre_celda_interna = idCelda+" .celda_interna";
            $(nombre_celda_interna).removeClass('seleccionada');
            
            if(!celdas[indiceCelda].inicial){
                $(idCelda).addClass(orientacion + " barco_normal_medio celda_asignada"); 
            }   
        }  
    );
    
    
    //Procesar última celda
    indiceCelda = celdas.findIndex( e => e.nombre === celdas_barco[barco.tamanio - 1]);
    $(idCelda).removeClass("barco_normal_medio");
    $(idCelda).addClass("barco_normal_cola");
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
function cerrarCuadroUbicarBarcos(){
    $("#caja_ubicar_barco").hide();
}


//Ejecución en la página

$(document).ready(
    function(){
    
    listarBarcos();
    
    $(".celda").click(
        function(){
            var ID = $(this).attr('id');
            var indexCelda = celdas.findIndex(ele => ele.nombre === ID);
            celda_actual = indexCelda;
        }
    );
        
        
    
    //Procedimiento al dar click sobre un barco no asignado en la lista de barcos
    $(".no_asignado").click(
        function(){
            $(".no_asignado").removeClass("barco_seleccionado");
            var numero = $(this).attr('id');
            barco_actual = barcos[numero];
            $(this).addClass("barco_seleccionado");
            cerrarCuadroUbicarBarcos();
            resetCeldas();
        }
    );    
        
    // Procedimiento al dar click en una celda no ocupada
    $(".vacia").click(
        function (e) {
            //Se actualiza la celda actual con la celda clickeada
            
            //Se resetean las celdas
            resetCeldas();
            //Se marca la ubicación donde estaría el barco
            marcarBarco(barco_actual.tamanio,orientacion,filas,columnas);
            
            var pos_x = $(this).offset();
            $("#caja_ubicar_barco").show();
            $("#caja_ubicar_barco").css({
              "top":(pos_x.top + $(this).height() + 10),
              "left":(pos_x.left + $(this).width() + 10)
                              });
        }
    );
    
    //Rotar barco
    $("#bt_rotar").click(
        function(){
            cambiarOrientacion();
            resetCeldas();
            marcarBarco(barco_actual.tamanio,orientacion,filas,columnas);
        }
    );
        
    //Colocar barco
    $("#bt_colocar").click(
        function(){
            colocarBarco(celdas[celda_actual],barco_actual);
        }
    );
        
    
    //Cerrar ventana de ubiación de barcos
    $(".cerrar").click(
        
        function(){
            cerrarCuadroUbicarBarcos();
          //  $(this).parent().css({"display":"none"});
        }
    );    
        
    }
);


