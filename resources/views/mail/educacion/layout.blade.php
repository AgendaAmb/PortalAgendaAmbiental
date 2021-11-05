@component('mail::message', [ 'header_color' => '#3a97ba', 'header_bottom_color' => '#086588', 'eje_trabajo' => 'Educación' ])
    @slot('saludo')
    Estimado(a) usuario(a):
    @endslot

    {!!$content!!}
@endcomponent
