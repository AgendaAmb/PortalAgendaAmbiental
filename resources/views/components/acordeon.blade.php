<div class="my-3">
    <!--
        Botón principal del acordeón.
    -->
    
    <a class="btn btn-secondary w-100 font-weight-bolder " data-toggle="collapse" 
    data-target="{{ '#'.$idAcordeon }}" role="button" aria-expanded="false" aria-controls="collapseExample">
     
            {{ $tituloAcordeon }}
            
            <i id="i" class="fa fa-chevron-down"></i>
    </a>

    <!--
        Items del acordeón.
    -->
    <div  id="{{ $idAcordeon }}" class="collapse">
        <div class="card card-body">
        
        @foreach($componentesAcordeon as $nombreComponente => $detallesComponente)
        
            <x-botonAcordeon :fotoItem="$detallesComponente['FotoComponente']"
                :textoItem="$detallesComponente['TextoComponente']"
                :linkReferencia="$detallesComponente['LinkReferencia']">
            </x-botonAcordeon>
        
        @endforeach
        </div>
    </div>
</div>