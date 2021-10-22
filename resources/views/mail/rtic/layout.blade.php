@component('mail::message', [ 'header_color' => '#003590', 'header_bottom_color' => '#001D56' ])
    @slot('saludo')
    Estimado(a) usuario(a):
    @endslot

    {{$content}}


    @slot('firma')
    <img src="{{ asset('/storage/imagenes/Logos/rtic.png') }}">
    @endslot
@endcomponent
