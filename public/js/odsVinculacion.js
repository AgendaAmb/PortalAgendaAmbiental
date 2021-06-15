$(function(){
    $('#imgGestion').on('mouseover', function(){
        scaleImage('#imgGestion', 1.2, -12, -11);
    });

    $('#imgGestion').on('mouseout', function(){
        scaleImage('#imgGestion', 1.0, 0, 0);
    });

    $('#imgEducacion').on('mouseover', function(){
        scaleImage('#imgEducacion', 1.2, -11, 11);
    });

    $('#imgEducacion').on('mouseout', function(){
        scaleImage('#imgEducacion', 1.0, 0, 0);
    });

    $('#imgComunicacion').on('mouseover', function(){
        scaleImage('#imgComunicacion', 1.08, 10, 11);
    });

    $('#imgComunicacion').on('mouseout', function(){
        scaleImage('#imgComunicacion', 0.91, 0, 0);
    });
});
