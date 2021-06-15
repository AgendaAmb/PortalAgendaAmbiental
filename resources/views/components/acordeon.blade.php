<div class="my-3">
    <!--
        Botón principal del acordeón.
    -->
    
    <a class="btn btn-secondary w-100 font-weight-bold " data-toggle="collapse" 
        href="{{ '#'.$idAcordeon }}" role="button">
        {{ $tituloAcordeon }}
    </a>

    <!--
        Items del acordeón.
    -->
    <div class="collapse" id="{{ $idAcordeon }}">
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