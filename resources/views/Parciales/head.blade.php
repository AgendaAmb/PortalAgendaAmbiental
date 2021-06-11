<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{config('app.name', 'Portal Agenda Ambiental') }}</title>
<!--Icono de la aplicación-->
<link rel="shortcut icon" href="{{ asset('img/cropped-UASLPAgendaAmbiental-32x32.png') }}">
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
</script>

<script src="{{asset('js/ods.js') }}"></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
<!--Comparacion de parametro opcional para poder poner la hoja de estilos correspondiente-->
@if (route('Nosotros')==url()->full()
||
route('Nosotros',['id'=> 'Historia'])==url()->full()
||
route('Nosotros',['id'=> 'QuienesSomos'])==url()->full()
||
route('Nosotros',['id'=> 'Normativa'])==url()->full()
||
route('Nosotros',['id'=> 'MisiónVisión'])==url()->full()
||
route('Nosotros',['id'=> 'Directorio'])==url()->full()
||
route('Nosotros',['id'=> 'Contacto'])==url()->full()
)
<!--Condiciones para poner el estilo de los nav-pill correspondiente en cada una de sus vistas-->
<link href="{{ asset('css/nav-pill_Nosotros.css') }}" rel="stylesheet" type="text/css">
@endif
@if (route('Gestion')==url()->full())
<link href="{{ asset('css/nav-pill_Gestion.css') }}" rel="stylesheet" type="text/css">
@endif
@if (route('Educacion')==url()->full())
<link href="{{ asset('css/nav-pill_Nosotros.css') }}" rel="stylesheet" type="text/css">
@endif
@if (route('Vinculacion')==url()->full())
<link href="{{ asset('css/nav-pill_Nosotros.css') }}" rel="stylesheet" type="text/css">
@endif
@if (route('Comunicacion')==url()->full())
<link href="{{ asset('css/nav-pill_Nosotros.css') }}" rel="stylesheet" type="text/css">
@endif
@stack('Styles')