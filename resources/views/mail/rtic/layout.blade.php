@component('mail::message', [ 'header_color' => '#003590', 'header_bottom_color' => '#001D56' ])
    @slot('saludo')
    Estimado(a) usuario(a):
    @endslot

    {!!$content!!}
@endcomponent
