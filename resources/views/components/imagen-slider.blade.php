@if (!$isDobleImg)
<div class="carousel-item @if ($primerImagen) active @endif">
    @isset($linkRedireccion)
    <a href="{{ $linkRedireccion }}">
    @endisset
        <img class="img-fluid p-xl-4" src="{{ $linkImagen }}"
            {{--
                Si se especificó la anchura de la imagen, entonces
                se le asigna la anchura a la propiedad width.
            --}}
            @isset($ancho) width="{{ $ancho }}" @endisset

            {{--
                Si se especificó la altura de la imagen, entonces
                se le asigna la altura a la propiedad height.
            --}}
            @isset($alto) height="{{ $alto }}" @endisset
        >
    @isset($linkRedireccion)
    </a>
    @endisset
</div>
@else
<div class="carousel-item ">
    <div class=" d-lg-block d-md-block">
        <div class="slide-box">
            <a href="#">
                <img src="{{$linkImagen }}" class="imgCaoursel "
                alt="First slide">
            </a>
            <a href="#">
                <img src="{{ $linkImagen2 }}" class="imgCaoursel "
                alt="First slide">
            </a>
        </div>
    </div>
</div>
@endif


