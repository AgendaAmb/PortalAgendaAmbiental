@component('mail::message', [ 'header_color' => '#dab631', 'header_bottom_color' => '#C39C00', 'eje_trabajo' => 'Vinculación' ])
    @slot('saludo')
    Estimado(a) usuario(a):
    @endslot

    {{$content}}
@endcomponent
