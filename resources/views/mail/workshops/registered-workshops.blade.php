@component('mail::message')
# Estimado(a) usuario(a):<br><br><br>

Muchas gracias por registrarte a los siguientes talleres:<br><br>

<ul>
@foreach($workshops as $workshop)
    <li> {{ $workshop->name }} </li>
@endforeach
</ul>

<br>Agradecemos su registro <br><br><br>
Saludos cordiales. <br>
<img src="{{ asset('/storage/imagenes/Logos/rtic.png') }}">
@endcomponent
