@component('mail::message')
# Estimado(a) usuario(a):<br><br><br>

Para reestablecer su contraseña, favor de dar clic en el siguiente botón:

@component('mail::button', ['url' => $url, 'color' => 'blue' ])
REESTABLECER CONTRASEÑA
@endcomponent

Si tiene algún problema con el botón de acción, copie y pegue el enlace en su navegador;<br><br>

{{ $url }}<br><br>

Saludos cordiales, <br>
<img src="{{ asset('/storage/imagenes/Logos/rtic.png') }}">
@endcomponent
