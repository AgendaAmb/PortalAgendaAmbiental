<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('Parciales.head')
</head>

<body>
    <header>
        
        @include('Parciales.header')
        @if (route('Index')==url()->full())
      
            <div class="col-12 my-2 p-0 d-flex d-xl-none d-lg-none d-md-none">

                <a href="https://www.un.org/sustainabledevelopment/es/"> <img src={{ asset('storage/imagenes/ods/Iconos/ODS_LOGO.png')}} class="img-fluid" alt="" srcset="" id="imgODSLogo"></a>
            </div>
            
        
    @endif
    </header>
    <nav>
        @include('Parciales.navbar')

        @if (route('Gestion')==url()->full()
        ||route('Educacion')==url()->full()
        ||route('Vinculacion')==url()->full()
        || route('Comunicacion')==url()->full()
        ||route('Unibici')==url()->full()
        ||route('Unihuerto')==url()->full()
        ||route('Cineminuto')==url()->full()
        ||route('FotografiaS')==url()->full()
        ||route('DateUnRespiro')==url()->full()
        ||route('Proserem')==url()->full()

        )
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