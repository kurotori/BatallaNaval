/*globals $:false */
/* jshint browser: true */

var disparos=["1"];
var celda=[];
function agregarDisparo(dato){
   // var tope = disparos.length;
    //console.log("datos:");
}

function marcarDisparos(){
    for(i = 0;i < (disparos.length); i++){
        console.log("->"+disparos[i]);
        var h = "#"+(disparos[i]);
        $(h).addClass("CasillaSel");
    }
}

function resetCeldas(){
     $(".vacia").html("");
}

function probarDisparo(x_celda, y_celda ){
    var nombre_celda = "#"+x_celda+"-"+y_celda;
    $(nombre_celda).html("<div class='agua'></div>");
    $(nombre_celda).removeClass("vacia");
}

$(document).ready(
    function(){
	

    $(".vacia").click(
        function (e) {
            //console.log($(this).attr('id'));
            resetCeldas();
            $("#datoC").val($(this).attr('id'));
            $("#casilla").text($(this).attr('id'));
            $(this).html("<div class='apunta'></div>");
            $("#gatillo").css({
                "top":(e.pageY + 10),
                "left":(e.pageX + 10)
                              });
            
            var pos_x = window.pageX;
            console.log(e.pageX+","+ e.pageY);
            //$("#gatillo")
        }
    );
        
    }
);


