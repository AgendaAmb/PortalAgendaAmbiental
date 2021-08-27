<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{config('app.name', 'Portal Agenda Ambiental') }}</title>
<!--Icono de la aplicación-->
<link rel="shortcut icon" href="{{ asset('img/cropped-UASLPAgendaAmbiental-32x32.png') }}">

<script  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<!--estilos-->
<script src="{{ asset('/js/app.js') }}"></script>
<script async src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
    integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
</script>
<script async src="{{asset('js/ods.js') }}"></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">

<!-- Styles -->
<link defer href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

<link defer href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
<!-- Desarrollo
-->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<!--Produccion
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
-->
@stack('Styles')
@stack('stylesheets')

{{--
    Pila de scripts
--}}
@stack('scripts')
<!--pruebas de servidor
    --->

