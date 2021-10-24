@component('mail::message', [ 'header_color' => '#52AA00', 'header_bottom_color' => '#009100', 'eje_trabajo' => 'Gestión institucional' ])
    @slot('saludo')
    Buenas tardes:
    @endslot

    {{$content}}
@endcomponent
