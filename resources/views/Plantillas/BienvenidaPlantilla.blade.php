<!doctype html>
<html>

<head>
    @include('Parciales.head')
    @stack('st')

</head>
<div class="container-fluid py-2" style="background-color: #115089; ">
    <div class="row justify-content-end ">
        <div class="col-xl-2 col-md-2  col-4 my-auto">
            <h4 style="color: white;" class="m-0 text-center"> Mi portal</h4>
        </div>

        <div class="col-xl-2  col-md-2  col-4" style=" border-left: 2px solid white; border-right:2px solid white;">
            <a class="" href="{{route('Index')}}">
                <img src="{{asset('/storage/imagenes/Logos/logoagenda-Bienvenida.png')}}" class="w-75 h-100">
            </a>
        </div>
        <div class="col-xl-2  col-md-2  col-4 my-auto">
            <a class="" href="#">
                <img src="{{asset('/storage/imagenes/Logos/LogoUaslp_17Gemas.png')}}" class="w-75 h-75 ">
            </a>
        </div>
      
    </div>
</div>

<body>
    @section('Encabezado')

    @show
    @section('ContenidoPrincipal')

    <main >

        @yield('Contenido')

    </main>


</body>

</html>