@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-4 justify-content-center my-5 pt-0">
    <img src="{{ asset('storage/imagenes/17Gemas/Logo17Gemas.png') }}" class=" mx-auto d-block w-75 " alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-8 my-5">
    <p class="text-justify pSize pt-2 pt-xl-4 pt-lg-3  pt-md-0">
        La crisis ambiental se ha agudizado y en las últimas décadas los efectos del cambio climático se han hecho
        sentir en todo el planeta. La pérdida acelerada de la biodiversidad es consecuencia de los modos de vida
        insostenibles y del modelo económico actual. Ante esta alarmante situación, en el 2015, la ONU propone los 17
        Objetivos de Desarrollo Sostenible ODS como una guía para que los países firmantes, diseñen acciones
        estratégicas a nivel global para alcanzar la sostenibilidad al atender las problemáticas sociales, ambientales y
        económicas desde un enfoque integrador en diferentes escalas.
        <br><br>
        Bajo este marco global la UASLP ha diseñado diversas estrategias para que, desde todos los ámbitos de su
        desempeño (académico, administrativo y de vinculación con la sociedad), toda la comunidad universitaria realice
        acciones que contribuyan a alcanzar las metas de los 17 ODS.
        <br><br>
        Es así como surge el concurso "Gemas de la Unisostenibilidad", como un espacio creativo e innovador que invita a
        profesores, administrativos y alumnos a conocer más sobre los ODS, al mismo tiempo que realiza acciones para
        lograr la mejor universidad de los 14 millones de futuros posibles.
</div>
@endsection

@section('BannerBotones')
<div class="row justify-content-md-start ">
    <div class="col-12">
        <img src="{{ asset('storage/imagenes/17Gemas/Banner_seccion.png') }}" class="img-fluid " alt="" srcset="">
    </div>


</div>



<div class="mt-1 col-md-12 col-sm-12 p-0">
    <div class="nav nav-tabs justify-content-around my-1">
        <a class="nav-link w-25 p-1 m-0" aria-controls="nav-home" aria-selected="true"
            href="{{route('login')}}">Registro</a>
        <a class="nav-link w-25 p-1 m-0" download="UASLP-AgendaAmbiental_GemasSostenibilidad.pdf"
            aria-controls="nav-home"
            href="{{asset('storage/imagenes/17Gemas/UASLP-AgendaAmbiental_GemasSostenibilidad.pdf')}}"
            aria-selected="true">Bases</a>
        <a class="nav-link w-25 p-1 m-0" href="#" data-toggle="modal" data-target="#Concurso17gemas"
            aria-controls="nav-home" aria-selected="true">Cartel</a>
    </div>
</div>

@endsection

@section('ObjetivosTexto')
<div class="pSize text-justify mt-5">

    <h2> ¡Ayúdanos a encontrar las 17 gemas de la sostenibilidad y lograr la mejor universidad de los 14 millones de
        futuros posibles! </h2> <br><br>
    <h3 style="color: #5c94d7;">Bases generales </h3>
    <p style="font-size: 15px !important;">Podrán participar administradores, docentes, alumnos de todos los campus de
        la UASLP del estado.
        <br>
     
    
          
     
    </p>
    <strong>¿Cómo participar?</strong> 
    <p style="font-size: 15px !important;">
        Durante el periodo septiembre 2021 – junio 2022 podrás ganar las 17 gemas del Desarrollo Sostenible lo que debes
        hacer es participar en las actividades que se llevan a cabo en la Agenda Ambiental de la UASLP en actividades
        similares a las propuestas que realices por tu cuenta. Esta actividad deberá reflejar investigación sobre el
        tema y estar explícitamente relacionada con el Objetivo para el Desarrollo Sostenible (ODS) que vas a registrar.
        <br><br>
        <strong>¿Cómo valido mis actividades? </strong>
         
        <br>
        
        Deberás documentar tu actividad, universitaria o por tu cuenta, a través de:  
    </p>
    <ol>
        <li> Un solo video corto de máximo dos minutos de duración que contenga:  
            <ul>
                <li>Toma video selfie donde digas tu nombre, si eres empleado o estudiante, de qué campus, entidad o facultad, carrera y edad (máximo 20 segundos).  </li>
                <li>El restante del tiempo te pedimos que hagas tomas de tu actividad donde describas el ODS que estás atendiendo, el tipo de actividad, la relación que 3 tiene con el ODS y su importancia o reto que significa para alcanzar la sostenibilidad.  </li>
                <li>Los clips que no sean propios de la persona deben contar con los derechos de uso sin fines de lucro. Estos derechos son establecidos de manera visible y directa en las diversas plataformas digitales.  </li>
            </ul>
        </li>
        <br>
        <li>
            Texto de 500 palabras*: el sistema incluye una ventana para que subas un texto propio de máximo 500 palabras donde describas el ODS seleccionado, la meta que atiende para ese objetivo y la actividad que realizaste y cómo ayudan a alcanzar esa meta o metas. Las metas de cada ODS las puedes consultar con facilidad en el sitio
            <a href="https://www.un.org/sustainabledevelopment/es/objetivosde-desarrollo-sostenible/">https://www.un.org/sustainabledevelopment/es/objetivosde-desarrollo-sostenible/.</a> Del menú de los 17 ODS seleccionas el de tu interés para conocer su detalle y las metas asociadas.  
            <br><br>
            *El reporte de investigación personal puede ser para producir el texto de 500 palabras asociado al video. 
        </li>
    </ol>
    <strong>¿Cómo colecto mis gemas? </strong>
    <br>
    <p>Personal de la Agenda Ambiental validará tus actividades de cada reto que corresponda a un ODS y podrás recoger tu gema el último viernes de cada mes en las instalaciones de la Agenda Ambiental (Av. Manuel Nava 201 último piso, Zona Universitaria, horario de 8:00 a 16:00 h). Si logras colectar las 17 gemas de la sostenibilidad antes del 15 de junio de 2022 podrás entrar en la rifa de 3 bicicletas Turbo, 20 vales con valor de $1000 c/u canjeables en Unimanía o en la Librería Universitaria y 2 cursos completos que organice la Agenda Ambiental en el siguiente ciclo escolar. Cada participante que sea elegible a la rifa sólo podrá obtener un máximo de un premio.  </p> 
    <strong> ¿Cómo me registro?</strong>  
    <p>Para participar primero tendrás que registrarte con tu correo institucional a la Comunidad de la Agenda Ambiental en el botón "Registro", sigue los pasos que se te indican después complementa el registro del concurso “17 gemas para la Unisostenibilidad” dando clic en la imagen correspondiente, terminado tendrás acceso a la plataforma donde subirás tus evidencias.  
<br>
        Para mayor información consulta las <a  href="{{asset('storage/imagenes/17Gemas/UASLP-AgendaAmbiental_GemasSostenibilidad.pdf')}}" download="UASLP-AgendaAmbiental_GemasSostenibilidad.pdf">bases</a> </p>
    <br>
    <h3>Informes</h3>
   
        Agenda Ambiental de la UASLP<br>
        Universidad Autónoma de San Luis Potosí<br>
        Manuel Nava No. 201, segundo piso<br>
        Zona Universitaria, C.P. 78210<br>
        San Luis Potosí, S.L.P.<br>
        Tel. (444) 826-2300 ext. 7210<br>
        <a href="mailto:mariana.buendia@uaslp.mx">mariana.buendia@uaslp.mx</a>

   
</div>
</div>
@endsection

@section('Modales')
<div class="modal fade" id="Concurso17gemas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body py-0">
                <div class="col-12 mb-4 ml-3 p-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-10 col-lg-10 col-md-10 col-sm-10 ">
                            <img src="{{asset('storage/imagenes/17Gemas/Cartel17Gemas.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                   
                    <div
                        class="row justify-content-center justify-content-sm-between justify-content-md-center justify-content-lg-end justify-content-xl-end mx-xl-5 mx-2 mt-2">
                        <!--
                        <div class=" col-4 col-xl-4 col-lg-3 col-md-6 col-sm-6  px-0 px-xl-3">
                            <a href="{{route('login')}}" class="btn btn-secondary bg-light  text-muted  " id="botones"
                                role="button" id="botones">REGISTRO</a>
                        </div>
                        <div class=" col-4 col-xl-4 col-lg-3 col-md-6 col-sm-6  ">
                            <a href="{{asset('storage/imagenes/17Gemas/UASLP-AgendaAmbiental_GemasSostenibilidad.pdf')}}"
                                class="btn btn-secondary bg-light  text-muted  " role="button" id="botones"
                                download="UASLP-AgendaAmbiental_GemasSostenibilidad.pdf">BASES </a>
                        </div>
                        -->
                        <div class=" col-4 col-xl-3 col-lg-3 col-md-6 col-sm-6 mr-xl-3 ">
                            <a href="{{asset('storage/imagenes/17Gemas/Cartel17Gemas.png')}}"
                                class="btn btn-secondary bg-light  text-muted  mr-xl-3 mb-2" href="#" role="button"
                                id="botones" download="Cartel17Gemas.png">CARTEL </a>
                        </div>
                      
                        <!--
                        <div class="row justify-content-center">
                            <div class="col-10"
                                style="color:white; font-size:15px; padding-top: 3%; font-family: 'Myraid light';' ">
                                <br>
                                <p class="h4 font-weight-bold text-justify" style=" color: #5c94d7;">¡Ayúdanos a
                                    encontrar las 17 gemas
                                    de la sostenibilidad y lograr la mejor
                                    universidad de los 14 millones de futuros posibles! </p>
                                <br>
                                <p style="font-size: 15px;" class="text-justify">
                                    La Agenda Ambiental, Dirección de Fomento Editorial y Publicaciones, Dirección de
                                    Comunicación Social
                                    e Imagen, División de Desarrollo Humano y la División de Servicios Estudiantiles
                                    incitan a los
                                    administradores, docentes y alumnos de la UASLP a participar en el concurso “17
                                    gemas para la
                                    Unisostenibilidad” durante el periodo de septiembre 2021 a junio 2022.


                                </p>
                                <p style="font-size: 15px;" class="text-justify">
                                    Para participar primero tendrás que registrarte con tu correo institucional a la
                                    Comunidad de la
                                    Agenda Ambiental en el botón "Registrate", sigue los pasos que se te indican después
                                    complementa el
                                    registro del concurso “17 gemas para la Unisostenibilidad” para que puedas tener
                                    acceso a la
                                    plataforma.

                                </p>

                                <p style="font-size: 15px;" class="text-justify">Para mayor información consulta las <a
                                        href="{{asset('storage/imagenes/17Gemas/UASLP-AgendaAmbiental_GemasSostenibilidad.pdf')}}"
                                        download="UASLP-AgendaAmbiental_GemasSostenibilidad.pdf">bases.</a></p>

                            </div>
                        </div>
                    -->
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

@endsection

@push('stylesheets')

<link href="{{ asset('css/nav-tabs_contenido.css') }}" rel="stylesheet" type="text/css">
@endpush