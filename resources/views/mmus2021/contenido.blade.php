@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-4 justify-content-center my-3 pt-0">
    <img src="{{ asset('storage/imagenes/mmus2021/logo_mmus2021.png') }}" class="rounded mx-auto d-block w-75 pt-5"
        alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-8 mb-5 mt-3">
    <p class="text-justify pSize pt-2 pt-xl-4 pt-lg-3  pt-md-0">
        A medida en que nos adentramos en el siglo XXI, los retos de sostenibilidad se agudizan en todas sus
        dimensiones, especialmente en contextos urbanos en dónde resulta impostergable la aplicación de estrategias que
        permitan presentar soluciones sistémicas y de largo aliento pero con la urgencia de un decenio de acción hacia
        el logro de las metas de los Objetivos del Desarrollo Sostenible a fin de cumplir con la Agenda 2030, una década
        que inicia con una contingencia que ha generado fuertes impactos sanitarios y económicos a nivel
        global.
        <br><br>
        Durante los primeros meses, circularon imágenes alrededor del mundo sobre cielos limpios en
        ciudades que usualmente tenían cielos grises debido a la contaminación atmosférica, esto como resultado de las
        medidas de confinamiento físico para hacer frente a la pandemia. De acuerdo a las recomendaciones de la
        Organización Mundial de la Salud, una de las formas más seguras de traslado es la movilidad en bicicleta, debido
        a que no sólo evita la exposición al virus del SARS-CoV-2, sino que además ayuda a disminuir algunos factores de
        riesgo. Alrededor del mundo, ciudades implementaron ciclo vías emergentes para dar una respuesta la
        movilidad.
        <br><br>
        Éste es el octavo año consecutivo en que la UASLP y la Agenda Ambiental, celebran la Movilidad
        Urbana Sostenible dedicando todo el mes a realizar actividades puntuales pero largo alcance como la pinta de
        cebras peatonales artísticas, talleres, conferencias y foros. Aquí podrás encontrar la memoria de las
        actividades realizadas como la premiación del concurso “Cineminuto y la Sostenibilidad” y la “Unirodada
        Universitaria”. Recuerda que en la Universidad trabajamos por la sostenibilidad todos los días del año, así que
        siéntete libre de contactarnos y compartir tus ideas, opiniones y propuestas.
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

    </div>
</div>
@endsection

@section('ObjetivosTexto')
<div class="pSize text-justify mt-5">
    <h3>Dirigido a</h3>Comunidad UASLP y público general<br>
    <h3 style="color: #5c94d7;">Objetivos</h3>
    <p style="font-size: 15px !important;">Continuar promoviendo e implementando una movilidad urbana sostenible
        considerando a todos los medios de transporte y la cultura de nuestra comunidad a través de eventos de
        aprendizaje, diversión, análisis, debate y la puesta en marcha de propuestas que modifiquen los espacios y
        vialidades así como nuestra percepción de éstos. </p>
   
    <h3 style="color: #5c94d7;">Objetivos</h3>
    <p style="font-size: 15px !important;">
        <ul>
            <li>Inscríbete llenando el formato de registro y especificando cada actividad en línea que se encuentra como
                botón en esta página.</li>
            <li>En 48 horas (días hábiles) te llegara un correo con detalles de la actividad que elegiste. </li>
            <br>
            <span>*Se limitará el número de personas dependiendo de actividad y se mantendrán las medidas
                sanitarias</span>
            <br>
            <span>**Las actividades del MMUS2021 están sujetas al sistema del semáforo COVID-19.</span>

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
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus2021/Banners-Conferencias.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Banners-Conferencias.png">CARTEL GENERAL </a>
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

                            <h2 style="font-weight: 900; " >Ciclo de conferencias de Movilidad Urbana
                                Sostenible</h2>
                        <br>
                                    <span><b>Conferencia 1: </b></span> “Sostenibilidad energética en la pandemia”
                                    <br>
                                    <span><b>Ponente: </b>Dr. Marcos Algara Siller y Daniela Rodríguez
                                        Aguilar</span>
                                    <br>
                                    <span><b>Lugar: </b> Zoom</span>
                                    <br>
                                    <span><b>Fechas: </b> Jueves 2 de septiembre 2021</span>
                                    <br>
                                    <span><b>Horario:</b> 18:00 a 19:00 horas</span>
                              
                                <br>
                                <br>
                                <br>
                               

                                    <span><b>Conferencia 2: </b></span> : “Movilidad y Urbanismo con enfoque de
                                    género”
                                    <br>
                                    <span><b>Ponente: </b>Benilda Ivonne Aguayo Huerta, Roberto Josué Rodríguez
                                        Santiago, Lourdes Marcela López Mares, Claudio Iván Aldrete López</span>
                                    <br>
                                    <span><b>Lugar: </b> Zoom</span>
                                    <br>
                                    <span><b>Fechas: </b> Jueves 9 de septiembre 2021</span>
                                    <br>
                                    <span><b>Horario:</b> 18:00 a 19:00 horas</span>

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
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus2021/Banners-Talleres.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Banners-Talleres.png">CARTEL GENERAL </a>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">

                            <h2 style="font-weight: 900;">Curso-taller: Conduce Con💯te</h2>
                           
                                    <span><b>Lugar: </b> Estacionamiento de Centro Cultural Universitario
                                        Bicentenario</span>
                                    <br>
                                    <span><b>Fechas: </b> sábado 18 de septiembre 2021</span>
                                    <br>
                                    <span><b>Horario:</b> 10:00-11:30 horas</span>
                                    <span><b>Ponente: </b>Arq. Mirell Betanzo del Angel y Mtra en Arq. Alejandrina Pérez
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
<!--Igual al de conduce  todo sin viñetas-->
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
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus2021/Banners-MesaT.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Banners-MesaT.png">CARTEL GENERAL </a>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10"
                                style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                              
                               
                                <h2 style="font-weight: 900;">2nda Mesa de Trabajo MUS-UASLP</h2>
                          

                                        <span><b>Lugar: </b> : Aula de la Agenda Ambiental de la UASLP</span>
                                        <br>
                                        <span><b>Fechas: </b> Viernes 24 septiembre 2021</span>
                                        <br>
                                        <span><b>Horario:</b> 10:00-12:30 horas</span>
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
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus2021/RODADA.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="FORO.jpg">CARTEL GENERAL </a>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10"
                                style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">


                                <h2 style="font-weight: 900;" >Unirodada cicloturistica a la Cañada del Lobo
                                </h2>
<br>
                                <span><b>Fecha: </b> Sábado 25 de septiembre 2021</span>
                                <br>
                                <span><b>Horario:</b>7:30 a 11:00 horas</span>
                                <br>
                                <span><b>Punto de encuentro: </b> Caja del Agua (Calzada de Guadalupe 200,
                                    SLP)</span>
                                <br>
                                <br>
                                <span>
                                    <h4 style="font-weight: 900;">Descripción</h4>
                                </span>
                                <ul>
                                    <li><span>Recorrido ciclo turístico a la cañada del Lobo con parada para
                                            hidratación/refrigerio y tiempo para recorrido con explicación ecológica del
                                            lugar con cuota de recuperación que incluye ambulancia y refrigerio.</span>
                                    </li>
                                    <li> <span>Habrá bicibus con diferentes salidas al punto del encuentro (sin apoyo de
                                            policía y ambulancia).</span></li>
                                    <li> <span><b>Distancia total:</b>20 km aprox.</span></li>
                                    <li> <span><b>Cuota de recuperación:</b>$100 (en efectivo previo al evento)</span>
                                    </li>
                                    <li> <span>*Llena el formulario en el boton de inscripción 
                                            antes del 18 de septiembre del 2021.</span></li>
                                    <li>
                                        <span>La Unirodada tiene cupo limitado y el registro se cierra  al tener el
                                            número de personas estimadas.</span>
                                    </li>
                                    <p class="text-center" style="font-size: 18px;"> <span>¡No olvides llevar agua y casco.!</span></p>
                                </ul>





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
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus2021/Banners-Cebraton.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Banners-Cebraton.png">CARTEL GENERAL </a>
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
                                        <span><b>Horario:</b> 4:30-6:30 horas</span>
                                        <span><b>Ponente: </b>Arq. Mirell Betanzo del Angel y Mtra en Arq. Alejandrina
                                            Pérez
                                            Ayala</span>
                                   <br>
                                   <br>
                                    <span>
                                        <h4>Descripción</h4>
                                    </span>
                                    
                                    <span>En el marco del día de la Universidad se busca implementar una etapa del
                                        proyecto de reordenamiento de la ZUP de parte del Departamento de Vinculación de
                                        la Facultad del Hábitat en colaboración con el Departamento de  Diseño y Construcción.
                                        El proyecto considera la intervención de las paradas del transporte público,
                                        lugares de estacionamiento, la accesibilidad peatonal y de todos los medios de
                                        transporte.
                                    </span>
                                    <span> El Cebratón, es una iniciativa de pintas artísticas en
                                        cruces peatonales que tiene como objetivo reivindicar-reclamar el espacio de
                                        transeúntes y sensibilizar usuarios y actores de la vía pública.</span>
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
@endsection
@push('stylesheets')
<link href="{{ asset('css/nav-tabs_contenido.css') }}" rel="stylesheet" type="text/css">
@endpush