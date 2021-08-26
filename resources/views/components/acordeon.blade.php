<div class="my-3">
    <!--
        Botón principal del acordeón.
    -->

    <a 
    @if ($haveStyle)
    class="btn w-100 font-weight-bolder " style="background-color: white;color:gray;border: 2px solid gray;border-radius: 0.0rem;"
    @else
    class="btn btn-secondary w-100 font-weight-bolder  "
    @endif
    class="btn btn-secondary w-100 font-weight-bolder  " data-toggle="collapse" data-target="{{ '#'.$idAcordeon }}"
        role="button" aria-expanded="false" aria-controls="collapseExample">

        {{ $tituloAcordeon }}

        <i id="i" class="fa fa-chevron-down"></i>
    </a>

    <!--
        Items del acordeón.
    -->
    <div id="{{ $idAcordeon }}" class="collapse">
        <div class="card card-body">

            @foreach($componentesAcordeon as $nombreComponente => $detallesComponente)

            @if ($detallesComponente['FotoComponente']=="#")
            <x-botonAcordeon :textoItem="$detallesComponente['TextoComponente']"
                :linkReferencia="$detallesComponente['LinkReferencia']">
            </x-botonAcordeon>
            @else
            <x-botonAcordeon :fotoItem="$detallesComponente['FotoComponente']"
                :textoItem="$detallesComponente['TextoComponente']"
                :linkReferencia="$detallesComponente['LinkReferencia']">
            </x-botonAcordeon>
            @endif


            @endforeach
        </div>
    </div>
</div>