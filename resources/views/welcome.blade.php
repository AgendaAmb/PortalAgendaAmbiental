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

    <footer>
        @include('Parciales.footer')
    </footer>
</body>
</html>