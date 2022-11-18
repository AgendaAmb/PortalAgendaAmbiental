<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('templates.head')
    </head>
    <body class="bg-light">
        <header>
            @include('templates.header')
        </header>
        <nav>
            @yield('navbarModulos')
        </nav>
        <main id="app" v-cloak>
            @yield('Introduccion')
            @yield('ContenidoPrincipal')
        </main>
    </body>
</html>