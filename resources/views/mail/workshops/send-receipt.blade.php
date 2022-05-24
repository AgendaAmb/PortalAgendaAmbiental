@component('mail::message', [ 'header_color' => $header_color, 'font_color' => $footer_color])
Estimado(a) usuario(a):<br><br>

Gracias por preinscribirse a la uniruta en Sierra Álvarez. Anexo le estamos enviando su ficha de pago y le recordamos que tiene tres días hábiles para realizar su pago. <b>NOTA: Queda oficialmente inscrito (a) una vez hecho el pago</b>. 
<br><br>
Estamos a su disposición para cualquier duda o comentario.
<br><br>

<p>IBP Laura Daniela Hernández Rodríguez</p> 
<p>GESTION AMBIENTAL</p>

@if ($with_image !== false)
<img src="{{ asset('/storage/imagenes/Logos/SGA.png') }}">
@endif

@endcomponent
