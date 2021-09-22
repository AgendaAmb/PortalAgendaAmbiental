@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url'), 'color' => $header_color ?? null])

        @endcomponent
    @endslot

    @slot('saludo')
    {{ $saludo ?? null }}
    @endslot

    {{-- Body --}}
    {{ $slot }}

    @slot('firma')
    {{ $firma ?? null }}
    @endslot

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer', ['color' => $header_color ?? null, 'font_color' => $font_color ?? null])
        © {{ date('Y') }} {{ config('app.name') }}. @lang('Todos los derechos reservados.')
        @endcomponent
    @endslot
@endcomponent
