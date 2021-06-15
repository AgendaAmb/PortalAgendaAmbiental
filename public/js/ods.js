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

function scaleImage(id, scale, translateX, translateY) {
    $(id).css('transform', '');
    $(id).css('transform', "scale(" + scale + ") translate(" + translateX + "px, " + translateY + "px)");
}

function animaRuedaODS()
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
}

$(function()
{
    animaRuedaODS();
});
