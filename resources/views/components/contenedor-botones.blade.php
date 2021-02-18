<div class="row justify-content-start mx-1 my-3">
    <!-- 
        Botones de cambio de diapositiva 
    -->
    @foreach ($informacionBotones as $nombreBoton => $informacionBoton)
        
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 my-1"> 
        <button class="px-1 btn btn-link shadow-none" id="{{ $nombreBoton }}">
            <img class="img-fluid" src="{{ $informacionBoton['FotoBoton'] }}">
        </button>
    </div>

    @endforeach

</div>