@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url'), 'color' => $header_color ?? null, 'header_bottom_color' => $header_bottom_color ?? ''])

        @endcomponent
    @endslot

    @slot('saludo')
    {{ $saludo ?? null }}
    @endslot

    {{-- Body --}}
    {{ $slot }}

    @slot('despedida')
    {{ $despedida ?? null }}
    @endslot

    @slot('firma')
    {{ $firma ?? null }}
    @endslot

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer', ['color' => $header_color ?? null, 'font_color' => $font_color ?? null, 'eje_trabajo' => $eje_trabajo ?? null])
        © {{ date('Y') }} {{ config('app.name') }}. @lang('Todos los derechos reservados.')
        @endcomponent
    @endslot
@endcomponent
