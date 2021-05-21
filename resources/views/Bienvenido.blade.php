<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('Parciales.head')
</head>

<body>
    <header>
        @include('Parciales.header')
    </header>
    <nav>
        @include('Parciales.navbar')

        @if (route('Gestion')==url()->full())

        <div class="containe-fluid" id="odsHeader">
            <div class="row no-gutters w-100">
                <div class="col mb-1 mt-1 ml-2" >
                    <a href="https://www.un.org/sustainabledevelopment/es/sustainable-development-goals/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS.jpg')}} class="imgODS">
                    </a>
                </div>
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/poverty/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS1_Fin_Pobreza.png')}} class="imgODS">
                    </a>
                </div>
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/hunger/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS2_Hambre_Cero.png')}} class="imgODS">
                    </a>
                </div>
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/health/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS3_Salud_Bienestar.png')}} class="imgODS">
                    </a>
                </div>
                
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/education/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS4_Educacion.png')}} class="imgODS">
                    </a>
                </div>
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/gender-equality/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS5_Igualdad_Genero.png')}} class="imgODS">
                    </a>
                </div>
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/water-and-sanitation/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS6_Agua_Sanamiento.png')}} class="imgODS">
                    </a>
                </div>
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/energy/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS7_Energia.png')}} class="imgODS">
                    </a>
                </div>
                
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/economic-growth/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS8_Trabajo.png')}} class="imgODS">
                    </a>
                </div>
               
               
            </div>
            <div class="row no-gutters w-100">
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/infrastructure/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS9_Industria.png')}} class="imgODS">
                    </a>
                </div>
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/inequality/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS10_Reduccion_Desigualdades.png')}} class="imgODS">
                    </a>
                </div>
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS1_Fin_Pobreza.png')}} class="imgODS">
                    </a>
                </div>
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS1_Fin_Pobreza.png')}} class="imgODS">
                    </a>
                </div>
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS1_Fin_Pobreza.png')}} class="imgODS">
                    </a>
                </div>
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS1_Fin_Pobreza.png')}} class="imgODS">
                    </a>
                </div>
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS1_Fin_Pobreza.png')}} class="imgODS">
                    </a>
                </div>
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS1_Fin_Pobreza.png')}} class="imgODS">
                    </a>
                </div>
                <div class="col mb-1 mt-1 " >
                    <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
                        <img src={{ asset('storage/imagenes/ods/Iconos/ODS1_Fin_Pobreza.png')}} class="imgODS">
                    </a>
                </div>
                
            </div>
        </div>

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