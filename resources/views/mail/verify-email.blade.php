@component('mail::message')
# Estimado(a) usuario(a):<br><br><br>

Para continuar con el proceso, favor de verificar su correo electrónico en el siguiente botón:

@component('mail::button', ['url' => $url, 'color' => 'blue' ])
VERIFICAR EMAIL
@endcomponent

Agradecemos su registro, y le damos la bienvenida a la comunidad de Agenda Ambiental.<br>
Si tiene algún problema con el botón de acción, copie y pegue el enlace en su navegador;<br><br>

{{ $url }}<br><br>

Saludos cordiales, <br>
<img src="{{ asset('/storage/imagenes/Logos/rtic.png') }}">
@endcomponent
