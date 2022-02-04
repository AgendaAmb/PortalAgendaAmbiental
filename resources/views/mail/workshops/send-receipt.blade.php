@component('mail::message', [ 'header_color' => $header_color, 'font_color' => $footer_color])
# Estimado(a) usuario(a):<br><br>

Gracias por preinscribirse al Curso-Taller: Unihuerto en casa. <br><br>

Anexo le estamos enviando su ficha de pago y le recordamos que tiene cuatro días
hábiles para realizar su pago y enviar su comprabante <br><br>

NOTA: Queda oficialmente inscrito (a) una vez hecho el pago. <br><br>

Estamos a su disposición para cualquier duda o comentario, <br><br>

IBP Laura Daniela Hernández Rodríguez <br>
Programa Uihuerto

@isset($with_image)
@if ($with_image !== false)
<img src="{{ asset('/storage/imagenes/Logos/SGA.png') }}">
@endif
@else
<img src="{{ asset('/storage/imagenes/Logos/SGA.png') }}">
@endisset
@endcomponent
