@component('mail::message', [ 'header_color' => '#52AA00', 'header_bottom_color' => '#009100', 'eje_trabajo' => 'Gestión institucional' ])


Muchas gracias por registrarse a las siguientes actividades :<br><br>
<ul>
    @if (is_array($workshops))
    @foreach($workshops as $workshop)
    <li> {{ $workshop->name }} </li>
@endforeach
</ul><br>
    @else
    <li> {{ $workshops->name }} </li>
    @endif


Agradecemos su registro.<br><br><br>
Saludos cordiales. <br>
@endcomponent
