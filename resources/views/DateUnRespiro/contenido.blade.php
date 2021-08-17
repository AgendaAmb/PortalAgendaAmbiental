@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-4 justify-content-center ">
    <img src="{{ asset('storage/imagenes/DateUnRespiro/Logo_DateRespiro.png') }}" class="rounded mx-auto d-block w-75 py-xl-5 py-md-5"
        alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-8 mt-xl-5 mt-lg-3">
    <p class="text-justify pSize pt-5 pt-xl-4 pt-lg-3  pt-md-0">
        Con base en el Derecho Humano a la salud, el Objetivo del Desarrollo Sostenible 3: Garantizar una vida sana y
        promover el bienestar y el Objetivo 8: Promover el crecimiento económico sostenido, inclusivo y sostenible, el
        empleo pleno y productivo y el trabajo decente para todos, la NOM-035-STPS-2018 y la preocupación por la calidad
        de vida que se ve amenazada por el estrés, la inactividad y los trastornos psicológicos; se cuenta con el
        Programa “Date un Respiro".
        <br>
        <br>
        El programa entiende la relación simbiótica que la salud humana y ambiental
        mantienen, buscando el buen clima laboral, la reducción de factores de riesgo y su impacto en la disminución de
        accidentes bajo el enfoque sistémico. Así, “Date un Respiro” desde el 2013 incide en obtener una vida sana a
        través de la activación física en conjunto con la relajación mental en diversas áreas de la UASLP así como
        también en el sector privado.

</div>
@endsection

@section('BannerBotones')
<div
    class="row justify-content-center justify-content-xl-between justify-content-lg-between justify-content-md-between justify-content-sm-between">
    <div class="col-12 ">
        <img src="{{asset('storage/imagenes/DateUnRespiro/BannerDateRepiroCompleto.png')}}" class="img-fluid" alt="" srcset="">
    </div>

</div>




</div>
<div class="mt-1 col-md-12 col-sm-12 p-0">
    <div class="nav nav-tabs justify-content-center">
       
        <a class="nav-link w-100 p-1 m-0" data-toggle="modal" data-target="#CartelDataUnRespiro"  
        role="button group" >Cartel General</a>
           
    </div>
</div>


@endsection
@section('Modales')
<div class="modal fade" id="CartelDataUnRespiro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body py-0">
                <div class="col-12 mb-4 ml-3 p-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 ">
                            <img  src="{{asset('storage/imagenes/DateUnRespiro/Banner_DaterEspiro.png')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class="col-6  col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/DateUnRespiro/Banner_DaterEspiro.png')}}"
                                class="btn btn-secondary bg-light  text-muted  " href="#" role="button" style="border-radius: 20px;
                                height: 35px;
                                font-weight: 900;
                                width: 145px;
                                "
                                download="Banner_DaterEspiro.png">CARTEL</a>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
<script>
@section('ObjetivosTexto')
<div class="pSize text-justify mt-5">
    <div style="font-size: 15px; font-family: 'Myraid light';">
        <h3 >Objetivo general</h3>
        <p>Ofrecer un espacio de relajación-activación, para el aprovechamiento y optimización de la energía de la
            comunidad universitaria para fortalecer y motivar sus actividades.</p>
        <h3 >Descripción</h3>
        <p>El programa se basa en la realización de ejercicios de respiración, activación, estiramiento, fortalecimiento
            y meditación.<br>Está disponible en dos formatos: de 5 minutos para líneas de producción y se amplía hasta a
            15 minutos para oficinas según convenga.<br>Cuenta con dos variantes para llevarse a cabo: en áreas verdes,
            fomentando el aprovechamiento responsable y la mejora continua de éstas; y en espacios cerrados de plantas
            de producción u oficina, dónde resulta práctico y benéfico.<br>La práctica está pensada para no necesitar de
            ningún instrumento, vestimenta ni accesorio especial.<br>Los ejercicios incluyen técnicas de disciplinas y
            prácticas como: Educación física, yoga, meditaciones de diferentes vertientes (budistas, atención plena,
            yóguicas), tai chi chuan, pilates y otras disciplinas afines.</p>
        <h3 >Beneficios del programa</h3>
        <ul>
            <li>Reducir niveles de estrés</li>
            <li>Mejorar la oxigenación</li>
            <li>Estimular focalización y concentración</li>
            <li>Recuperar vitalidad</li>
            <li>Tener mayor eficiencia en las actividades</li>
            <li>Relajación física y mental</li>
            <li>Promoción de la creatividad</li>
            <li>Ayudar a enfrentar situaciones con más tranquilidad</li>
        </ul>
        <h4 >Más información</h4>
        <p style="font-size: 14px !important;">Laura Daniela Hernández Rodríguez<br>Sistema de Gestión
            Ambiental<br>Agenda Ambiental de la UASLP<br>Tel. 826-2300 ext. 7210<br><a
                href="mailto:gestion.ambiental@uaslp.mx">gestion.ambiental@uaslp.mx</a></p>
    </div>
</div>
@endsection
@push('stylesheets')
<link href="{{ asset('css/nav-tabs_contenido.css') }}" rel="stylesheet" type="text/css">
@endpush
