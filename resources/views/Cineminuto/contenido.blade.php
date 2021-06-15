@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-4 justify-content-center my-2">
    <img src="{{ asset('storage/imagenes/Logos/BS_Cineminuto.png') }}"
        class="rounded mx-auto d-block w-75 py-xl-5 py-md-5" alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-8">
    <p class="text-justify pSize pt-5 pt-xl-4 pt-lg-3  pt-md-0">
        El cambio climático, la pérdida acelerada de la biodiversidad, entre otros factores, son una consecuencia de los
        modos de vida insostenibles que se han mantenido hasta el momento. Desde el 2015 los Objetivos de Desarrollo
        Sostenible (ODS) forman parte de una agenda internacional llamada Agenda 2030, a la cual se han sumado más de
        195 países para generar acciones estratégicas a fin de alcanzar la sostenibilidad. Los ODS se integran de 17
        metas, las cuales abordan las problemáticas sociales, ambientales y económicas desde un enfoque integrador a la
        escala global, nacional, regional y local.<br><br>Aunado a ello, las Naciones Unidas han promovido el periodo
        2021-2030 como el Decenio de las Naciones Unidas para la Restauración de los Ecosistemas, con la finalidad de
        reforzar y acelerar la generación de instrumentos y políticas públicas que tengan la restauración de los
        ecosistemas como prioridad en las agendas internacionales. Desde los gobiernos, la sociedad civil y la academia,
        se sumarán esfuerzos para preservar y restaurar la salud de los ecosistemas y los modos de vida de las personas
        que en ellos habitan.<br><br>Por ello el tercer concurso <b>“Cineminuto por la sostenibilidad”</b> centra su
        temática principal en el marco del Decenio de las Naciones Unidas sobre la restauración de los ecosistemas, así
        como la resiliencia que podemos encontrar en los ecosistemas habitados, que podemos encontrar en parques,
        avenidas, jardines, plazas públicas, espacios en desusos, comunidades rurales, azoteas útiles, huertos urbanos,
        entre muchos otros ejemplos.
</div>
@endsection

@section('BannerBotones')
<div
    class=" mx-auto row justify-content-center justify-content-xl-between justify-content-lg-between justify-content-md-between justify-content-sm-between">
    <div class="col-12 ">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               
                    <div class="carousel-item active">
                        <img src="{{asset('storage/imagenes/Cineminuto/B_Cineminuto.png')}}"
                            class="d-block img-fluid" alt="...">
                    </div>
              
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>

</div>


<div
    class="row mt-1 col-md-12  col-sm-12 pl-xl-5 ml-xl-5 justify-content-xl-start  justify-content-lg-start  justify-content-md-start justify-content-around">
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">

        <a class="btn btnCur m-2 " 
        target="_blank"
            href="http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/_layouts/15/FormServer.aspx?XsnLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/Cineminuto/Forms/template.xsn&OpenIn=browser&SaveLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/Cineminuto&Source=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/Cineminuto"
            role="button group">
            REGISTRATE
        </a>
      

       
        <a class="btn btnCur m-2 " href="#" role="button" data-toggle="modal"
                data-target="#exampleModalCenter">
                CARTEL GENERAL 
            </a>
    </div>


</div>

@endsection

@section('ObjetivosTexto')
<div class="pSize text-justify mt-5">
    <div style="font-size: 15px; font-family: 'Myraid light'; color: black;"><h3 style="color: #5c94d7;">Bases generales</h3><p>Podrán participar estudiantes, egresados, docentes y trabajadores de la UASLP de todos sus campus: Unidad Académica Multidisciplinaria Zona Huasteca, Unidad Académica Multidisciplinaria Zona Media, Coordinación Académica Región Altiplano, Coordinación Académica Región Huasteca Sur y Coordinación Académica Región Altiplano Oeste y UASLP capital.<br><br>La convocatoria estará vigente a partir de su publicación y el último día para registrarse como participante será el viernes 14 de mayo de 2021.<br>El concurso constará de cuatro etapas:<br><br>
        <b>ETAPA 1. Registro de propuestas</b><br>Los participantes deberán llenar una ficha de registro con el nombre de la propuesta o temática que se quiere abordar en el cineminuto, en esta etapa, sólo se registrará la propuesta de participación. <b>La fecha límite para registrar propuestas será el viernes 14 de mayo de 2021.</b><br>
        </p><ul>
            <li>Sólo se podrá registrar un trabajo por participante o equipo (en este último caso se deberá nombrar a un representante, quien será responsable ante el comité organizador)</li>
            <li>La temática a abordar deberá estar relacionada con ecosistemas en entornos habitados, resiliencia y modos de vida sostenibles. También puedes abordar los Objetivos de Desarrollo Sostenible, siempre y cuando el abordaje sea el antes mencionado.</li>
            <li>Una vez registrados, los participantes recibirán un correo de confirmación de: <a href="mailto:cinesust@uaslp.mx">cinesust@uaslp.mx</a></li>	
        </ul><br><br>
        <b>ETAPA 2. Taller de acompañamiento</b><br>Se realizará un taller como parte de la asesoría y acompañamiento para la producción del cineminuto, el taller de acompañamiento es obligatorio y se llevará a cabo en dos módulos impartidos a través de la plataforma Zoom.<br><br>
        <i>Módulo 1. Ecosistemas habitados. Resiliencia y modos de vida sostenible.</i><br>
        Lunes 17 de mayo de 2021<br>
        17:00 - 19:00 horas<br><br>
        <i>Módulo 2. Lenguaje audiovisual.</i><br> 
        Martes 18 de mayo de 2021<br>
        17:00 - 19:00 horas<br><br>
        Notas:
        <ul>
            <li>Cumplir el 100% de la asistencia al taller es requisito indispensable para poder continuar en el proceso, en caso de no asistir o faltar a alguna de las dos sesiones, es descalificación automática.</li>
            <li>Todos los participantes que asistan al taller recibirán un reconocimiento.</li>
            <li>Posterior a la realización del taller, los participantes deberán de realizar la producción de sus cineminutos y los trabajos deberán de ser inéditos.</li>
        </ul><br><br>
        <b>ETAPA 3. Entrega.</b><br>
        Los cineminutos ya producidos deberán ser almacenados y compartidos en OneDrive al correo cinesust@uaslp.mx a más tardar el miércoles 23 de junio a las 23:00 horas. Los participantes recibirán un correo de confirmación.<br>
        <ul>
            <li>Se evaluará principalmente la aportación crítica de los trabajos (mensaje) así como las siguientes características técnicas: narrativa, audio, fotografía y ritmo.</li>
            <li>Podrá utilizarse cualquier técnica de grabación, incluyendo teléfonos móviles.</li>
            <li>Es responsabilidad del participante quedarse con un respaldo de su cineminuto.</li>
        </ul><br><br>
        <b>ETAPA 4. Premiación.</b><br>
        Un jurado experto premiará los 3 mejores cineminutos, mismo que se darán a conocer en una ceremonia virtual o presencial si las condiciones lo permiten, el día viernes 20 de agosto de 2021 a las 11:00 horas.<br>
        Se otorgarán tres premios de jurado:
        <ul>
            <li><b>Primer Lugar:</b> Cámara profesional</li>
            <li><b>Segundo Lugar:</b> Cámara deportiva</li>
            <li><b>Tercer Lugar:</b> Tableta gráfica</li>
        </ul><br><p></p>
        <p style="text-align: center;"> El registro en este concurso implica la total aceptación de la convocatoria. Los asuntos no previstos en la presente convocatoria serán resueltos por las entidades organizadoras.<br><br><b>EL FALLO DEL JURADO SERÁ INAPELABLE</b><br><br><span>Este concurso es realizado por Agenda Ambiental de la UASLP, la Coordinación Académica en Arte, la División de Difusión Cultural y Cineclub Universitario.
        </span></p></div>
</div>
</div>
@endsection


@section('Modales')
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <img src="{{asset('storage/imagenes/Cineminuto/Cartel_Cineminuto.jpg')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class="col-6  col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                          

                                <a href="{{asset('storage/imagenes/Cineminuto/Cartel_Cineminuto.jpg')}}"   class="btn btn-secondary bg-light  text-muted downloadBtn " 
                                href="#" role="button" download="Cartel_Cineminuto.jpg">CARTEL GENERAL 
                            </a>
                        </div>

                    </div>
                    
                </div>

            </div>

        </div>
    </div>
</div>
@endsection