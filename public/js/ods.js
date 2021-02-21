var numerosOds = 
{
    "#gestion":[ "#ods3", "#ods11", "#ods12" ],
    "#vinculacion":[ "#ods4", "#ods6", "#ods11", "#ods12", "#ods17" ],
    "#comunicacion":[ "#ods3", "#ods11", "#ods12", "#ods13", "#ods16", "#ods17" ],
    "#educacion": [ "#ods3", "#ods4", "#ods6", "#ods7", "#ods11" ],
}

function MuestraODS(idSeccion) {
    $(idSeccion).fadeTo(1,1);

    for (var numeroOds of numerosOds[idSeccion])
        $(numeroOds).fadeTo(1,1);
}

function QuitaODS(idSeccion) {
    $(idSeccion).fadeTo(1,0);

    for (var numeroOds of numerosOds[idSeccion])
        $(numeroOds).fadeTo(1,0);
}

$(document).ready(function() 
{
    $('#gestion').on('mouseover', function() {
        MuestraODS('#gestion');
    }).on('mouseleave', function() {
        QuitaODS('#gestion');
    });

    $('#vinculacion').on('mouseover', function() {
        MuestraODS('#vinculacion');
    }).on('mouseleave', function() {
        QuitaODS('#vinculacion');
    });

    $('#educacion').on('mouseover', function() {
        MuestraODS('#educacion');
    }).on('mouseleave', function() {
        QuitaODS('#educacion');
    });

    $('#comunicacion').on('mouseover', function() {
        MuestraODS('#comunicacion');
    }).on('mouseleave', function() {
        QuitaODS('#comunicacion');
    });

    /*
    $('#columnaInicio').hover(function(){
    $('#rangoODS').hover(function() {
        $('#ods4').css('display', 'none').delay(800);
        $('#ods6').css('display', 'none').delay(800);
        $('#ods13').css('display', 'none').delay(800);
        $('#ods17').css('display', 'none').delay(800);
        $('#ods3').css('display', 'none').delay(800);
        $('#ods11').css('display', 'none').delay(800);
        $('#ods12').css('display', 'none').delay(800);
        $('#ods7').css('display', 'none').delay(800);
        $('#ods16').css('display', 'none').delay(800);
       
    });
    $('.carousel').carousel('pause');
    $('#gestionCirculo').hover(function() {
        $('#gestion').css('display', 'inline');
        $('#vinculacion').css('display', 'none');
        $('#comunicacion').css('display', 'none');
        $('#educacion').css('display', 'none');
        $('#ods3').css('display', 'block');
        $('#ods11').css('display', 'block');
        $('#ods12').css('display', 'block');
        $('#ods4').css('display', 'none');
        $('#ods6').css('display', 'none');
        $('#ods13').css('display', 'none');
        $('#ods17').css('display', 'none');
        $('#ods7').css('display', 'none');
        $('#ods16').css('display', 'none');
    });

    $('#gestion').mouseleave(function() {
        $('#gestion').css('display', 'none');
    });
    $('#areaVinculacion').mouseenter(function() {
        $('#vinculacion').css('display', 'inline');
        $('#gestion').css('display', 'none');
        $('#comunicacion').css('display', 'none');
        $('#educacion').css('display', 'none');
        $('#ods4').css('display', 'block');
        $('#ods6').css('display', 'block');
        $('#ods11').css('display', 'block');
        $('#ods12').css('display', 'block');
        $('#ods17').css('display', 'block');
        $('#ods3').css('display', 'none');
        $('#ods13').css('display', 'none');
        $('#ods7').css('display', 'none');
        $('#ods16').css('display', 'none');
    });
    $('#vinculacion').mouseleave(function() {
        $('#vinculacion').css('display', 'none');
    });
    $('#areaComunicacion').mouseenter(function() {
        $('#comunicacion').css('display', 'inline');
        $('#gestion').css('display', 'none');
        $('#vinculacion').css('display', 'none');
        $('#educacion').css('display', 'none');
        $('#ods13').css('display', 'block');
        $('#ods3').css('display', 'block');
        $('#ods4').css('display', 'none');
        $('#ods6').css('display', 'none');
        $('#ods12').css('display', 'block');
        $('#ods11').css('display', 'block');
        $('#ods17').css('display', 'block');
        $('#ods7').css('display', 'none');
        $('#ods16').css('display', 'block');
    });
    $('#comunicacion').mouseleave(function() {
        $('#comunicacion').css('display', 'none');
    });
    $('#areaEducacion').mouseenter(function() {
        $('#educacion').css('display', 'inline');
        $('#gestion').css('display', 'none');
        $('#vinculacion').css('display', 'none');
        $('#comunicacion').css('display', 'none');
        $('#ods4').css('display', 'block');
        $('#ods3').css('display', 'block');
        $('#ods13').css('display', 'none');
        $('#ods6').css('display', 'block');
        $('#ods7').css('display', 'block');
        $('#ods12').css('display', 'none');
        $('#ods11').css('display', 'block');
        $('#ods17').css('display', 'none');
        $('#ods16').css('display', 'none');
    });
    $('#educacion').mouseleave(function() {
        $('#educacion').css('display', 'none');
    });
    */
});