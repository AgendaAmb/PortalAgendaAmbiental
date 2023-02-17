@component('mail::message', [ 'header_color' => $header_color, 'font_color' => $footer_color])
Estimado(a) usuario(a):<br><br>

Gracias por preinscribirse al curso: {{$ws_name}}. Anexo le estamos enviando su ficha de pago y le recordamos que tiene tres días hábiles, a partir del envío de este correo, para realizar su pago. <b>NOTA: Queda oficialmente inscrito (a) una vez hecho el pago</b>.
<br><br>
Estamos a su disposición para cualquier duda o comentario.
<br><br>

<p>Dra. Mariana Buendía Oliva</p>
<p>EDUCACIÓN E INVESTIGACIÓN</p>

@if ($with_image !== false)
<img src="{{ asset('/storage/imagenes/Logos/Educacion.png') }}">
@endif

@endcomponent
