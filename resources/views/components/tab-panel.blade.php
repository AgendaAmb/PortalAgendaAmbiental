<div class="my-3 row justify-contents-center">
    <div class="col-12 ">
        {{--
            Renderiza los botones del tab-panel.
        --}}
        <nav class="nav flex-row nav-tabs justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center" id="v-pills-tab" role="tablist">
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
