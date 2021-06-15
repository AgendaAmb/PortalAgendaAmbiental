<div class="my-3 row justify-contents-center">
    <div class="col-12 ">
        {{--
            Renderiza los botones del tab-panel.
        --}}
        <nav class="nav flex-row nav-pills justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-around" id="v-pills-tab" role="tablist">
            {{ $tabButtons }}
        </nav>


        {{--
            Contenido del tab panel.
        --}}
        <div class="tab-content" id="nav-tabContent">
            {{ $tabContent }}
        </div>
    </div>
</div>
