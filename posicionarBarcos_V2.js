/*globals $:false */
/* jshint browser: true */

//Variables 

//Listado de barcos disponibles
var barcos = [];
//Estructura de un barco: 
//barco={tipo:String, tamanio:Int, asignado:bool}

//El barco actual, debe apuntar a una posición de la lista de barcos.
//Al inicializarse la lista de barcos, se debe actualizar este valor
//para que indique el primer barco de la lista.
//barco_actual:Int
var barco_actual= 0;
//

//Dimensiones del tablero, se deben actualizar los valores de estas variables
//al crear el tablero. 
var columnas = 0;
var filas = 0;

//Listado de las celdas de la grilla. Se rellena con la función 'inicializarCeldas()'
var celdas = [];
//Estructura de una celda:
//celda={nombre:String, asignada:bool, barco:Object, inicial:bool }

//La celda seleccionada por el usuario. Debe actualizarse para que apunte
//a la posición de la celda seleccionada en cada click
var celda_actual=0;

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
    
    //Actualización de los valores de filas y columnas
    columnas = num_col;
    filas = num_fil;
}

//Inicializa las celdas en una colección para que JS reconozca el tablero
//Los datos se almacenan en el listado de celdas de la grilla, llamado 'celdas'
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

//Listar los barcos generados en el panel lateral.
//Se debe llamar cada vez que el 
function listarBarcos(){
    //Resetear el contenido del panel
    $("#panel_lat_contenido>#lista_barcos").html("");
    //Anális de cada barco de la lista
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


//Función que inicializa todo el tablero de juego. Esta pensada para ser ejecutada
//desde la función 'crearTablero()' del archivo Tablero.php
function inicializarTodo(tamanio){
    //Ajustar el tablero
    prepararTablero(tamanio);
    //Inicializar las celdas
    inicializarCeldas();
    //Creación de la flota de barcos para el tablero
    crearFlota(tamanio);
    //Listar los barcos
    listarBarcos();
    barco_actual = 0;
}

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

$(document).ready(
    function(){
        inicializarTodo(tamanio);
    }
);