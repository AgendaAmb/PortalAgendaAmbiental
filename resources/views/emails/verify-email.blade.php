@component('mail::message')

Bienvenido a nuestro Sistema de Biodiversidad. Es necesario que verifiques tu correo dando click en el siguiente botón:

@component('mail::button')
    Verificar correo electrónico
@endcomponent

¡Gracias por usar nuestra aplicación! <br><br>

Atentamente: Equipo de Gestion Ambiental <br>
{{ config('app.name') }}
@endcomponent
