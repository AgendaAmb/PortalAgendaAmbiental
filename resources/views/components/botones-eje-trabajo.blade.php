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


        {{--
            Contenido del slider
        --}}
        <div class="tab-content" id="nav-tabContent">
            {{ $sliders }}
        </div>
    </div>
</div>
