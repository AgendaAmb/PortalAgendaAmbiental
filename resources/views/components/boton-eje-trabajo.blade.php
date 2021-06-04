
<a @if ($idBoton=="v-pills-boton1" ) class="nav-link active  " @else class="nav-link  " @endif
    id="{{ $idBoton."-tab" }}" data-toggle="pill" href="{{ $idSlider }}" role="tab" aria-controls="{{$idBoton}}"
    aria-selected="true">
    {{ $nombreBoton }}
</a>