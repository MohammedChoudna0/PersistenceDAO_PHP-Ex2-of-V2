$(document).ready(function(){
    $("#enlace-equipos").click(function(e){
        e.preventDefault();
        $("#partidos").hide();
        $("#equipos").show();
    });

    $("#enlace-partidos").click(function(e){
        e.preventDefault();
        $("#equipos").hide();
        $("#partidos").show();
    });
});
