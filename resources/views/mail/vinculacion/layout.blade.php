@component('mail::message', [ 'header_color' => '#dab631', 'header_bottom_color' => '#C39C00', 'eje_trabajo' => 'Vinculación' ])
    @slot('saludo')
    Estimado(a) usuario(a):
    @endslot

    {{$content}}

    @slot('firma')
    <img src="{{ asset('/storage/imagenes/Logos/rtic.png') }}">
    @endslot
@endcomponent
