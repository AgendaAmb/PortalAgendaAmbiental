<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @if (Str::contains(url()->full(),'20Aniversario'))
        @include('templates.head')
    @else
        @include('Parciales.head')
    @endif
</head>

<body>
    <header>

        @if (Str::contains(url()->full(),'20Aniversario'))
            @include('templates.header')
        @else
            @include('Parciales.header')
        @endif

        {{-- @include('Parciales.header') --}}
        
        @if (route('Index')==url()->full())
        <div class="col-12 my-2 p-0 d-flex d-xl-none d-lg-none d-md-none">
            <a href="https://www.un.org/sustainabledevelopment/es/"> <img
                    src={{ asset('storage/imagenes/ods/Iconos/ODS_LOGO.png')}} class="img-fluid" alt="" srcset=""
                    id="imgODSLogo"></a>
        </div>
        @endif
    </header>
    <nav>
        @if (route('panel')==url()->full()||route('Administracion')==url()->full() || Str::contains(url()->full(),'20Aniversario'))
        @else
        @include('Parciales.navbar')
        @endif
        @if (Str::contains(url()->full(),route('Gestion'))
        ||Str::contains(url()->full(),route('Educacion'))
        ||Str::contains(url()->full(),route('Vinculacion'))
        ||Str::contains(url()->full(),route('Comunicacion'))
        ||Str::contains(url()->full(),route('Unibici'))
        ||Str::contains(url()->full(),route('Unihuerto'))
        ||Str::contains(url()->full(),route('Cineminuto'))
        ||Str::contains(url()->full(),route('FotografiaS'))
        ||Str::contains(url()->full(),route('DateUnRespiro'))
        ||Str::contains(url()->full(),route('Proserem'))
        ||Str::contains(url()->full(),route('ConsumoResponsable'))
        ||Str::contains(url()->full(),route('mmus2021'))
        ||Str::contains(url()->full(),route('Cursos'))
        ||Str::contains(url()->full(),route('Uniruta'))
        ||Str::contains(url()->full(),route('GlobalGoalsJam2022'))
        ||Str::contains(url()->full(),route('mmus2022'))
        
        )
        <x-navbar-o-d-s>
        </x-navbar-o-d-s>
        <x-btns-ejes>
        </x-btns-ejes>
        @else

        @endif
        @yield('navbarModulos')
    </nav>

    <main class="container-fluid" id="app">

        @yield('Introduccion')
        @yield('ContenidoPrincipal')
    </main>


    @if (route('panel')==url()->full()||route('Administracion')==url()->full())
    @else
    <footer>
        @include('Parciales.footer')
    </footer>
    @endif


</body>
@stack('vuescrip')
</html>