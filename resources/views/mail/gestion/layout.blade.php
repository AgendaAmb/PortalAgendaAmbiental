@component('mail::message', [ 'header_color' => '#52AA00', 'header_bottom_color' => '#009100', 'eje_trabajo' => 'Gestión institucional' ])
    @slot('saludo')
    Buenas tardes:
    @endslot

    Gracias por inscribirte a la Unirodada a la Cañada del Lobo este próximo 25 de septiembre 2021 de 7:30 a 11:00 horas. 
    Necesitamos definir urgentemente el cupo que tendremos, te pedimos de favor realizar el pago correspondiente a más tardar mañana jueves a las 14:00 horas. 
    ¡Si por alguna razón no te ha llegado su ficha por favor avísenos!

    @slot('despedida')
    Saludos, <br><br>

    Equipo Unibici, Agenda Ambiental, UASLP
    @endslot

    @slot('firma')
    <img src="{{ asset('/storage/imagenes/Logos/rtic.png') }}">
    @endslot
@endcomponent
