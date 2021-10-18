@component('mail::message', [ 'header_color' => '#de3043', 'header_bottom_color' => '#9E0000', 'eje_trabajo' => 'Comunicación' ])
    @slot('saludo')
    Estimado(a) usuario(a):
    @endslot

    {{$content}}


    @slot('firma')
    <img src="{{ asset('/storage/imagenes/Logos/rtic.png') }}">
    @endslot
@endcomponent
