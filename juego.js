/*globals $:false */
/* jshint browser: true */

var disparos=["1"];

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

$(document).ready(
    function(){
	
    $("td").click(
        function () {
            //console.log($(this).attr('id'));
            $("#datoC").val($(this).attr('id'));
            $("#casilla").text($(this).attr('id'));
        }
    );
    }
);


