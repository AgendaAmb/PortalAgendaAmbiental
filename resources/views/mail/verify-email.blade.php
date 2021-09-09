@component('mail::message')
# Estimado(a) usuario(a):<br><br><br>

Para continuar con el proceso, favor de verificar su correo electrónico en el siguiente botón:

@component('mail::button', ['url' => $url, 'color' => 'blue' ])
VERIFICAR EMAIL
@endcomponent

<br>Agradecemos su registro, y le damos la bienvenida a la <strong> comunidad de Agenda Ambiental. </strong><br><br>
Si tiene algún problema con el botón de acción, <a href="{{ $url }}"> por favor de clic a este enlace </a><br><br><br>
Saludos cordiales. <br>
<img src="{{ asset('/storage/imagenes/Logos/rtic.png') }}">
@endcomponent
