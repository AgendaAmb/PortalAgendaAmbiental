@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-4 justify-content-center my-2">
    <img src="{{ asset('storage/imagenes/Logos/Bs_dr.jpg') }}" class="rounded mx-auto d-block w-50 py-xl-5 py-md-5"
        alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-8">
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
        <img src="{{asset('storage/imagenes/introduccion/DateUnRespiro.jpg')}}" class="img-fluid" alt="" srcset="">
    </div>

</div>


<div
    class="row mt-1 col-md-12 col-sm-12 pl-md-4 justify-content-xl-start  justify-content-lg-start  justify-content-md-start justify-content-around">
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">


        <a href="http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/_layouts/15/FormServer.aspx?XsnLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/Reg_DateUnRespiro/forms/template.xsn&OpenIn=browser&SaveLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/Reg_DateUnRespiro&Source=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/Reg_DateUnRespiro"
            class="btn btnCur m-2 " target="_blank" role="button group">REGISTRATE </a>
        <a href="{{asset('storage/imagenes/DateUnRespiro/Cartel_dateunrespiro.jpg')}}" class="btn btnCur m-2 " href="#"
            role="button group" download="Cartel_dateunrespiro.jpg">CARTEL GENERAL </a>


    </div>


</div>

@endsection

@section('ObjetivosTexto')
<div class="pSize text-justify mt-5">



    <div style="font-size: 14px; font-family: 'Myraid light';">
        <h3 style="color: #5c94d7;">Objetivo general</h3>
        <p>Ofrecer un espacio de relajación-activación, para el aprovechamiento y optimización de la energía de la
            comunidad universitaria para fortalecer y motivar sus actividades.</p>
        <h3 style="color: #5c94d7;">Descripción</h3>
        <p>El programa se basa en la realización de ejercicios de respiración, activación, estiramiento, fortalecimiento
            y meditación.<br>Está disponible en dos formatos: de 5 minutos para líneas de producción y se amplía hasta a
            15 minutos para oficinas según convenga.<br>Cuenta con dos variantes para llevarse a cabo: en áreas verdes,
            fomentando el aprovechamiento responsable y la mejora continua de éstas; y en espacios cerrados de plantas
            de producción u oficina, dónde resulta práctico y benéfico.<br>La práctica está pensada para no necesitar de
            ningún instrumento, vestimenta ni accesorio especial.<br>Los ejercicios incluyen técnicas de disciplinas y
            prácticas como: Educación física, yoga, meditaciones de diferentes vertientes (budistas, atención plena,
            yóguicas), tai chi chuan, pilates y otras disciplinas afines.</p>
        <h3 style="color: #5c94d7;">Beneficios del programa</h3>
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
        <h4 style="color: #5c94d7;">Más información</h4>
        <p style="font-size: 14px !important;">Laura Daniela Hernández Rodríguez<br>Sistema de Gestión
            Ambiental<br>Agenda Ambiental de la UASLP<br>Tel. 826-2300 ext. 7210<br><a
                href="mailto:gestion.ambiental@uaslp.mx">gestion.ambiental@uaslp.mx</a></p>
    </div>
</div>
@endsection