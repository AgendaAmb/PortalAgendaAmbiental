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
    </nav>

    <main class="container-fluid justify-content-between">
      @yield('Contenido-Nosotros')
    </main>

    <footer>
        @include('Parciales.footer')
    </footer>
</body>
</html>