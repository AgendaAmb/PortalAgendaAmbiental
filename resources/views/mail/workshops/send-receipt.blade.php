@component('mail::message', [ 'header_color' => $header_color, 'font_color' => $footer_color])
Estimado(a) usuario(a):<br><br>

Gracias por preinscribirse a la Unirodada por los ríos urbanos.

Anexo le estamos enviando su ficha de pago y le recordamos que tiene cuatro días hábiles para realizar su pago.

NOTA: Queda oficialmente inscrito (a) una vez hecho el pago.

Estamos a su disposición para cualquier duda o comentario,

IBP Laura Daniela Hernández Rodríguez
UNIBICI

@isset($with_image)
@if ($with_image !== false)
<img src="{{ asset('/storage/imagenes/Logos/SGA.png') }}">
@endif
@else
<img src="{{ asset('/storage/imagenes/Logos/SGA.png') }}">
@endisset
@endcomponent
