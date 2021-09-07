@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-4 justify-content-center my-3 pt-0">
    <img src="{{ asset('storage/imagenes/mmus2021/logo_mmus2021.png') }}" class="rounded mx-auto d-block w-75 pt-5"
        alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-8 mb-5 mt-3">
    <p class="text-justify pSize pt-2 pt-xl-4 pt-lg-3  pt-md-0">
        Considerando que las ciudades del mundo ocupan solo el 3% de la tierra, pero representan entre el 60% y el 80%
        del consumo de energía y el 75% de las emisiones de carbono (ONU, 2020) la UASLP a través de la Agenda Ambiental
        y su programa Unibici continúa buscando tener ciudades sostenibles.
        <br><br>
        Haciendo frente a la pandemia mundial se tienen reflexiones ambientales, económicas y sociales de nuestro
        desarrollo como especie en este tiempo, la movilidad urbana sostenible continúa siendo una parte importante de
        esta reflexión que considera todos los medios de transporte, todas las necesidades de movilidad, los diferentes
        usuarios y la cultura generada alrededor de éstos en el contexto de San Luis Potosí.
        <br><br>
        En esta novena edición de las celebraciones del Mes de la Movilidad Urbana Sostenible la UASLP a través de la
        Agenda Ambiental y sus colaboradores dedican todo el mes de septiembre 2021 a realizar actividades académicas,
        de educación ambiental y de transformación física, incidiendo en los Objetivo Desarrollo Sostenible ODS11:
        Comunidades y ciudades sostenibles, ODS 13: Acción por el clima y ODS17: Alianzas para lograr objetivos.
        <br><br>
        En sintonía con la búsqueda de una movilidad segura y saludable de la semana europea de la movilidad se
        revaloran las oportunidades de cambio, las respuestas creativas, hábitos responsables y la resiliencia de las
        comunidades que se han presentado en esta nueva forma de vida que ha generado la crisis sanitaria.
</div>
@endsection

@section('BannerBotones')
<div class="row justify-content-md-start ">
    <div class="col-12">
        <img src="{{ asset('storage/imagenes/mmus2021/BannerCompleto.png') }}" class="img-fluid " alt="" srcset="">
    </div>


</div>



<div class="mt-1 col-md-12 col-sm-12 p-0">
    <div class="nav nav-tabs justify-content-around my-1">
        <a class="nav-link w-25 p-1 m-0" data-toggle="modal" data-target="#Cicloconferencias" role="tab"
            aria-controls="nav-home" aria-selected="true">Ciclo de conferencias de Movilidad Urbana Sostenible</a>

        <a class="nav-link w-25 p-1  m-0" data-toggle="modal" data-target="#modalCurso-taller" role="tab"
            aria-controls="nav-profile" aria-selected="false"> Curso-taller: conduce con💯te</a>

        <a class="nav-link w-25 p-1  m-0" data-toggle="modal" data-target="#modalMesaTrabajo" role="tab"
            aria-controls="nav-profile" aria-selected="false"> 2nda mesa de trabajo MUS-UASLP</a>

        <a class="nav-link w-25 p-1 m-0" data-toggle="modal" data-target="#modalUnirodada" role="tab"
            aria-controls="nav-profile" aria-selected="false"> Unirodada cicloturistica a la Cañada del Lobo

            <a class="nav-link w-25 p-1  m-0" data-toggle="modal" data-target="#modalIntervensiones" role="tab"
                aria-controls="nav-profile" aria-selected="false">Intervenciones y reordenamiento: cebratón y proyecto
                MUS-ZUP</a>
            <a href="{{asset('storage/imagenes/mmus2021/Cartel_mmus2021.png')}}" aria-controls="nav-profile"
                class="nav-link w-25 p-1  m-0" href="#" role="button" download="Cartel_mmus2021.png">Cartel general </a>


    </div>
</div>

@endsection

@section('ObjetivosTexto')
<div class="pSize text-justify mt-5 px-3">
    <h3>Dirigido a</h3>Comunidad UASLP y público general.<br><br>
    <h3 style="color: #5c94d7;">Objetivo</h3>
    <p style="font-size: 15px !important;">Continuar promoviendo e implementando una movilidad urbana sostenible
        considerando a todos los medios de transporte y la cultura de nuestra comunidad a través de eventos de
        aprendizaje, diversión, análisis, debate y la puesta en marcha de propuestas que modifiquen los espacios y
        vialidades, así como nuestra percepción de éstos. </p>

    <h3 style="color: #5c94d7;">Objetivos específicos</h3>
    <p style="font-size: 15px !important;">
        <ul>
            <li>Mantener un espacio de intercambio académico con diferentes actores que aporten percepciones y puntos de
                vista informados que nutran y generen conocimiento. </li>
            <li>Fomentar la movilidad cero emisiones tanto de forma recreativa como reflexiva que incluya la conexión de
                cómo nos movemos y el diseño de nuestra ciudad. </li>
            <li>Implementar mejoras en la infraestructura que envíen un mensaje que invoque la creatividad, la
                abstracción y el cambio. </li>
            <li>Sembrar y conservar alianzas y gestiones firmes y coordinadas para lograr objetivos a mediano y largo
                plazo.</li>
            <br>
            <p class="text-center"><strong>Las actividades del MMUS2021 están sujetas al sistema del semáforo COVID-19.
                </strong></p>

        </ul>

    </p>
    <h4>Informes</h4>
    <p style="font-size: 15px !important;">
        <br>Agenda Ambiental de la UASLP<br>
        Universidad Autónoma de San Luis Potosí<br>
        Manuel Nava No. 201, segundo piso<br>
        Zona Universitaria, C.P. 78210<br>
        San Luis Potosí, S.L.P.<br>
        Tel. (444) 826-2300 ext. 7210<br>
        <a href="mailto:unibici@uaslp.mx">unibici@uaslp.mx</a>

    </p>
</div>
</div>
@endsection

@section('Modales')
<div class="modal fade" id="Cicloconferencias" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/mmus2021/Banners-Conferencias.png')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-5 mt-2">
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">
                            <a href={{route('login')}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                        </div>
                        <div class="col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">

                            <a href="{{asset('storage/imagenes/mmus2021/Banners-Conferencias.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Banners-Conferencias.png">CARTEL </a>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                            <!--Dirigido a y objetivo general van a fuera

                            <h4>Dirigido a</h4>
                            <p>Comunidad UASLP y público general</p><br>
                            <h4>Objetivo general:</h4>
                            <p>Continuar promoviendo e implementando una movilidad urbana sostenible considerando a
                                todos los medios de transporte y la cultura de nuestra comunidad a través de eventos de
                                aprendizaje, diversión, análisis, debate y la puesta en marcha de propuestas que
                                modifiquen los espacios y vialidades así como nuestra percepción de éstos. </p>
                            <br>
 -->

                            <h2 style="font-weight: 900; ">Ciclo de conferencias de Movilidad Urbana
                                Sostenible</h2>
                            <br>
                            <span><b>Conferencia 1: &nbsp;</b></span> “Sostenibilidad energética en la pandemia”
                            <br>
                            <span><b>Ponentes: &nbsp;</b>Dr. Marcos Algara Siller y Daniela Rodríguez
                                Aguilar</span>
                            <br>
                            <span><b>Lugar: &nbsp;</b> Zoom</span>
                            <br>
                            <span><b>Fecha: &nbsp;</b> Jueves 2 de septiembre 2021</span>
                            <br>
                            <span><b>Horario:&nbsp;</b> 18:00 a 19:00 horas</span>

                            <br>
                            <br>
                            <br>


                            <span><b>Conferencia 2: </b></span> &nbsp; “Movilidad y Urbanismo con enfoque de
                            género”
                            <br>
                            <span><b>Ponentes: </b> &nbsp;Benilda Ivonne Aguayo Huerta, Roberto Josué Rodríguez
                                Santiago, Lourdes Marcela López Mares, Claudio Iván Aldrete López</span>
                            <br>
                            <span><b>Lugar: &nbsp;</b> Zoom</span>
                            <br>
                            <span><b>Fecha: &nbsp;</b> Jueves 9 de septiembre 2021</span>
                            <br>
                            <span><b>Horario:&nbsp;</b> 18:00 a 19:00 horas</span>

                            <br>
                            <br>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="modalCurso-taller" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/mmus2021/Banners-Talleres.png')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-5 mt-2">
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">
                            <a href={{route('login')}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                        </div>
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus2021/Banners-Talleres.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Banners-Talleres.png">CARTEL </a>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">

                            <h2 style="font-weight: 900;">Curso-taller: Conduce Con💯te</h2>

                            <span><b>Lugar: &nbsp;</b> Estacionamiento de Centro Cultural Universitario
                                Bicentenario</span>
                            <br>
                            <span><b>Fecha: &nbsp; </b> Sábado 18 de septiembre 2021</span>
                            <br>
                            <span><b>Horario:&nbsp;</b> 10:00-11:30 horas</span><br>
                            <span><b>Ponentes: &nbsp;</b> <br> Arq. Mirell Betanzo del Angel y Mtra en Arq. Alejandrina
                                Pérez
                                Ayala</span>
                            <br>
                            <br>
                            <span>
                                <h4>Descripción</h4>
                            </span>

                            <span>Este curso taller teórico y sensorial busca acercar a las personas que
                                utilizan cualquier medio de transporte a la problemática que el resto de los
                                medios de transporte experimentan en sus recorridos diarios, haciendo énfasis en
                                los reglamentos de tránsito y la información respecto a la seguridad y educación
                                vial.</span>
                            <br>
                            <br>


                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalMesaTrabajo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/mmus2021/Banners-MesaT.png')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-start justify-content-md-start justify-content-lg-start justify-content-xl-start mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus2021/Banners-MesaT.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Banners-MesaT.png">CARTEL </a>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10"
                                style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">


                                <h2 style="font-weight: 900;">2nda Mesa de Trabajo MUS-UASLP</h2>


                                <span><b>Lugar: &nbsp;</b> Aula de la Agenda Ambiental de la UASLP</span>
                                <br>
                                <span><b>Fecha:&nbsp; </b> Viernes 24 septiembre 2021</span>
                                <br>
                                <span><b>Horario:&nbsp;</b> 10:00-12:30 horas</span>
                                <br>
                                <br>
                                <span>
                                    <h4>Descripción</h4>
                                </span>

                                <span>Reunión de representantes de diferentes entidades de la UASLP
                                    especialistas en diferentes temas que conciernen a la Movilidad Urbana
                                    Sostenible de la UASLP para lograr decisiones, acciones y compromisos a
                                    través de la información y debate multidisciplinario.</span>
                                <br>
                                <br>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalUnirodada" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/mmus2021/RODADA.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-5 mt-2">
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">
                            <a href={{route('login',['nombreModal'=> 'Rodada'])}}
                                class="btn btn-secondary bg-light  text-muted downloadBtn " role="button">REGISTRAR</a>
                        </div>
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="{{asset('storage/imagenes/mmus2021/RODADA.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="FORO.jpg">CARTEL </a>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10"
                                style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">


                                <h2 style="font-weight: 900;">Unirodada cicloturistica a la Cañada del Lobo
                                </h2>
                                <br>
                                <span><b>Fecha: &nbsp;</b> &nbsp;Sábado 25 de septiembre 2021</span>
                                <br>
                                <span><b>Horario:&nbsp;</b>&nbsp;7:30 a 11:00 horas</span>
                                <br>
                                <span><b>Punto de encuentro: &nbsp;</b> &nbsp;Caja del Agua (Calzada de Guadalupe 200,
                                    SLP)</span>
                                <br>
                                <br>
                                <span>
                                    <h4 style="font-weight: 900;">Descripción</h4>
                                </span>
                                <br>
                                <span>Recorrido ciclo turístico a la cañada del Lobo con parada para
                                    hidratación/refrigerio y tiempo para recorrido con explicación ecológica del
                                    lugar con cuota de recuperación que incluye ambulancia y refrigerio.</span>
                                <br><br>

                                <span><b>Distancia total:</b>&nbsp; 20 km aprox.</span><br><br>
                                <p class="font-weight-bolder h5"> PAGO DE UNIRODADA:</p>

                                <ol>
                                    <li>A más tardar en 24 horas recibirá un correo electrónico con la ficha de pago.
                                    </li>
                                    <li>La ficha o vale que le enviemos, tendrá una vigencia de cuatro días para ser
                                        pagada, de lo contrario se cancelará. </li>
                                    <li>Es obligatorio para su INSCRIPCIÓN oficial enviar su comprobante de pago por
                                        correo electrónico a
                                        <a href="mailto: unibici@uaslp.mx"> unibici@uaslp.mx.</a>
                                        <br>
                                        Las fichas se pueden pagar directamente en el banco o desde el portal de
                                        multipagos de la UASLP:
                                        <a href="https://www.finanzas.uaslp.mx/Multipagos" target="_blank"
                                            rel="noopener noreferrer">https://www.finanzas.uaslp.mx/Multipagos .</a>
                                    </li>
                                  
                                </ol>

                                <span>
                                    *&nbsp;Indicar por correo si requiere factura.</span>
                                <br>
                                <br>
                                <span>Llena el formulario en el botón de registrar
                                    antes del 18 de septiembre del 2021.</span><br><br>

                                <span>La Unirodada tiene cupo limitado y el registro se cierra al tener el
                                    número de personas estimadas.</span><br><br>

                                <p class="text-center" style="font-size: 18px;"> <span>¡No olvides llevar agua y
                                        casco.!</span></p>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="modalIntervensiones" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/mmus2021/Banners-Cebraton.png')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-5 mt-2">
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">
                            <a href={{route('login')}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                        </div>
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus2021/Banners-Cebraton.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Banners-Cebraton.png">CARTEL </a>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10"
                                style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                                <h2 style="font-weight: 900;">Intervenciones y reordenamiento: Cebratón y Proyecto
                                    MUS-ZUP</h2>


                                <span><b>Lugar: </b> Av. Industrias y Manuel Nava</span>
                                <br>
                                <span><b>Fecha: </b> Jueves 30 de septiembre 2021 </span>
                                <br>
                                <span><b>Horario:</b> 4:30-6:30 horas</span> <br>

                                <br>
                                <br>
                                <span>
                                    <h4>Descripción</h4>
                                </span>
                                <p class="text-justify">
                                    En el marco del día de la Universidad se busca implementar una etapa del
                                    proyecto de reordenamiento de la ZUP de parte del Departamento de Vinculación de
                                    la Facultad del Hábitat en colaboración con el Departamento de Diseño y
                                    Construcción.
                                    El proyecto considera la intervención de las paradas del transporte público,
                                    lugares de estacionamiento, la accesibilidad peatonal y de todos los medios de
                                    transporte.
                                </p>
                                <p class="text-justify"> El Cebratón, es una iniciativa de pintas artísticas en
                                    cruces peatonales que tiene como objetivo reivindicar-reclamar el espacio de
                                    transeúntes y sensibilizar usuarios y actores de la vía pública. </p>



                                <br>
                                <br>
                                </ol>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
<script>
    if ('{{$NombreM}}'!='') {
    $('#{{$NombreM}}').modal('show')
  } 
  
</script>
@endsection

@push('stylesheets')

<link href="{{ asset('css/nav-tabs_contenido.css') }}" rel="stylesheet" type="text/css">
@endpush