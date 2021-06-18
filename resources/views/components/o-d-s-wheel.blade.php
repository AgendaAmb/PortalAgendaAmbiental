<div class="col-xl-4  col-lg-5 col-md-4 justify-content-center d-xl-block  d-lg-block  d-md-block d-none ml-3">
    <div class="ruedaODS">
        <img src="storage/imagenes/ods/circulo-UASLP-SOCIEDAD-e1587668903442.webp"
            class="img-fluid ejeTrabajo"
            width="125"
            usemap="#circuloODS"
            style="z-index: 2;">

        <a href="{{ route('Gestion') }}">
            <img
                id ="imgGestion"
                class="img-fluid ejeTrabajo"
                src="{{ asset('img/ods/gestion.png') }}"
                width="150"
                style="top: -134px; left:-135px; @if (route('Gestion') === url()->full()) transform: scale(1.2) translate(-11px, -11px); @endif">
        </a>
        <a href="{{ route('Educacion') }}">
            <img
                id ="imgEducacion"
                class="img-fluid ejeTrabajo"
                src="{{ asset('img/ods/educacion.png') }}"
                width="150"
                style="top:132px; left:-135px; @if (route('Educacion') === url()->full()) transform: scale(1.2) translate(-11px, 11px); @endif">
        </a>

        <a href="{{ route('Vinculacion') }}">
            <img
            id ="imgVinculacion"
            class="img-fluid ejeTrabajo"
            src="{{ asset('img/ods/vinculacion.png') }}"
            width="150"
            style="top: -130px; left: 134px; @if (route('Vinculacion') === url()->full()) transform: scale(1.2) translate(10px, -11px); @endif">
        </a>
        <a href="{{ route('Comunicacion') }}">
            <img class="img-fluid ejeTrabajo"
                id ="imgComunicacion"
                src="{{ asset('img/ods/comunicacion.png') }}"
                width="150"
                style="top: 120px; left: 122px; @if (route('Comunicacion') === url()->full()) transform: scale(1.08) translate(10px, 11px); @else transform: scale(0.91) @endif">
        </a>
    </div>
</div>
