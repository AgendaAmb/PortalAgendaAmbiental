@component('mail::message', [ 'header_color' => $header_color, 'font_color' => $footer_color])
Estimado(a) usuario(a):<br><br>

Gracias por inscribirse a: {{$ws_name}}.
<br><br>
Estamos a su disposición para cualquier duda o comentario.
<br><br>

@if($ws_name != 'Uniruta Cerro de San Pedro')
<p>Dra. Mariana Buendía Oliva</p>
<p>EDUCACIÓN E INVESTIGACIÓN</p>
@endif

@if ($with_image !== false)
<img src="{{ asset('/storage/imagenes/Logos/Educacion.png') }}">
@endif

@endcomponent
