@component('mail::message', [ 'header_color' => $header_color, 'font_color' => $footer_color])
# Estimado(a) usuario(a):<br><br>

Gracias por preinscribirse a la Taller: Agricultura urbana ¿Qué? ¿Cuándo? ¿Cómo? ¿Por qué? . <br><br>

Anexo le estamos enviando su ficha de pago y le recordamos que tiene cuatro días
hábiles para realizar su pago y enviar su comprabante <br><br>

NOTA: Queda oficialmente inscrito (a) una vez hecho el pago. <br><br>

Estamos a su disposición para cualquier duda o comentario, <br><br>

IBP Laura Daniela Hernández Rodríguez <br>
UNIBICI

@isset($with_image)
@if ($with_image !== false)
<img src="{{ asset('/storage/imagenes/Logos/rtic.png') }}">
@endif
@else
<img src="{{ asset('/storage/imagenes/Logos/rtic.png') }}">
@endisset
@endcomponent
