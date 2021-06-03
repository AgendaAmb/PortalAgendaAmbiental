<div class="col-xl-4  col-lg-5 col-md-4 justify-content-center d-xl-block  d-lg-block  d-md-block d-none ml-3">
    <div class="ruedaODS">
        <img src="storage/imagenes/ods/circulo-UASLP-SOCIEDAD-e1587668903442.png"
            class="img-fluid ejeTrabajo"
            width="125"
            usemap="#circuloODS"
            style="z-index: 2; left: -106px; top:4px">

        <a href="#">
            <img class="img-fluid ejeTrabajo"
                src="{{ asset('storage/imagenes/ods/gestion.png') }}"
                width="150"
                style="top:-126px; left:-246px; @if (route('Gestion') === url()->full()) transform: scale(1.2) translate(-12px, -11px); @endif">
        </a>
        <a href="#">
            <img class="img-fluid ejeTrabajo"
                src="{{ asset('storage/imagenes/ods/educacion.png') }}"
                width="150"
                style="top:143px; left:-246px; @if (route('Educacion') === url()->full()) transform: scale(1.2) translate(-12px, 11px); @endif">
        </a>

        <a href="#">
            <img class="img-fluid ejeTrabajo"
            src="{{ asset('storage/imagenes/ods/vinculacion.png') }}"
            width="150"
            style="top: -98px; @if (route('Vinculacion') === url()->full()) transform: scale(1.2) translate(10px, -14px); @endif">
        </a>

        <a href="#">
            <img class="img-fluid ejeTrabajo"
                src="{{ asset('storage/imagenes/ods/comunicacion.png') }}"
                width="150"
                style="top: 117px; @if (route('Comunicacion') === url()->full()) transform: scale(1.2) translate(10px, 14px); @endif">
        </a>
    </div>
</div>
