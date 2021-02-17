<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    
    <!--
        Contenido del slider (imágenes).
    -->
    <div class="carousel-inner">
        @foreach ($imagenes as $imagen)

        <div class="carousel-item @if ($loop->first) active @endif">
            <img class="img-fluid w-100 " src="{{ $imagen }}" alt="">
        </div>

        @endforeach
    </div>

    <!--
        Indicadores para avanzar o regresar a las diferentes 
        imágenes del slider.
    -->
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>