<div id="{{ $idSlider }}" class="carousel slide" data-ride="carousel">
    {{--
        Contenido del slider (imágenes).
    --}}
    <div class="carousel-inner">
        {{ $slot }}
        
        @if ($titulo!=null)
        <div class="container">
            <p class="descripionP">
                <b class="TituloRes">{{$titulo}}</b> 
               <br> {{$descripcion}}<br>
            </p>
        </div>
      
        @endif
       
    </div>

    {{-- 
        Permite transitar en los sliders
    --}}
    @if($transitable === true)
    <a class="carousel-control-prev" href="{{ '#'.$idSlider }}" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="{{ '#'.$idSlider }}" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    @endif
    
</div>