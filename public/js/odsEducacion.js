$(function(){
    $('#imgGestion').on('mouseover', function(){
        scaleImage('#imgGestion', 1.2, -12, -11);
    });

    $('#imgGestion').on('mouseout', function(){
        scaleImage('#imgGestion', 1.0, 0, 0);
    });

    $('#imgVinculacion').on('mouseover', function(){
        scaleImage('#imgVinculacion', 1.2, 10, -10);
    });

    $('#imgVinculacion').on('mouseout', function(){
        scaleImage('#imgVinculacion', 1.0, 0, 0);
    });

    $('#imgComunicacion').on('mouseover', function(){
        scaleImage('#imgComunicacion', 1.2, 10, 14);
    });

    $('#imgComunicacion').on('mouseout', function(){
        scaleImage('#imgComunicacion', 1.0, 0, 0);
    });
});
