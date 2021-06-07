<!doctype html>
<html>

<head>
    @include('Parciales.head')
    @stack('st')
   
</head>

<body>
    @section('Encabezado')
    <header class="container-fluid px-0">
        <div class="row text-center justify-content-center">
            <div class="col-12 franjaEncabezado"></div>
            <div class="col-12 ">
                <img class="mt-4 img-fluid" src="{{ asset('storage/imagenes/Logos/LoginI.jpeg') }}">
            </div>
        </div>
    </header>
    @show
    @section('ContenidoPrincipal')

    <main class="container-fluid" id="fondoRayas">
      
        @yield('FormularioInicioSesion')
      
    </main>

   
</body>

</html>