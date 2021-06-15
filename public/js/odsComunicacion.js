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

    $('#imgVinculacion').on('mouseover', function(){
        scaleImage('#imgVinculacion', 1.2, 10, -10);
    });

    $('#imgVinculacion').on('mouseout', function(){
        scaleImage('#imgVinculacion', 1.0, 0, 0);
    });
});
