{{--
    Vista del slider correspondiente a los ejes de trabajo.
--}}
<div class="my-3 row justify-contents-center">
    <div class="col-12 ">
        {{--
            Renderiza los botones de navegación, en caso de que se
            hayan especificado
        --}}
        <div class="nav flex-row nav-pills  justify-content-lg-between  " id="v-pills-tab" role="tablist" >
            {{ $botones }}
        </nav>
        <div class="tab-content" id="nav-tabContent">
            {{ $sliders }}
        </div>

        {{--
            Determina si en la parte inferior del slider se agregará un
            conjunto de imágenes evaluando el estado de 'contieneImagenes'
        --}}
        @if($contieneImagenes)
        <div class="row justify-content-between">
            {{ $parteInferiorSlider }}
        </div>
        @elseif ($contieneTexto)
        <div class="row justify-content-center">
            <div class="col-12 col-lg-11 my-5">
                {{ $parteInferiorSlider }}
            </div>
        </div>
        @endif
    </div>
</div>
