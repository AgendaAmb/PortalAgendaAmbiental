<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('Parciales.head')
</head>

<body>
    <header>
        
        @include('Parciales.header')
        @if (route('Index')==url()->full())
        <div class="row">
            <a href="https://www.un.org/sustainabledevelopment/es/"> <img src={{ asset('storage/imagenes/ods/Iconos/ODS_LOGO.png')}} class="img-fluid p-4" alt="" srcset="" id="imgODSLogo"></a>
            
        </div>
    @endif
    </header>
    <nav>
        @include('Parciales.navbar')

        @if (route('Gestion')==url()->full()||route('Educacion')==url()->full()||
        route('Vinculacion')==url()->full()|| route('Comunicacion')==url()->full())
        <x-navbar-o-d-s>

        </x-navbar-o-d-s>
        <x-btns-ejes>
        </x-btns-ejes>
        @else
           
        @endif

    </nav>

    <main class="container-fluid">

        @yield('Introduccion')
        @yield('ContenidoPrincipal')
    </main>

    <footer>
        @include('Parciales.footer')
    </footer>
</body>

</html>