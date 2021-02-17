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
        
    </nav>

    <main class="container-fluid">
        <!--
            El contenido principal de las páginas se colocará 
            en esta sección.
        -->
        @yield('ContenidoPrincipal')
    </main>

    <footer>
        @include('Parciales.footer')
    </footer>
</body>
</html>