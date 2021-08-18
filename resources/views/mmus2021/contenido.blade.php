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
            aria-controls="nav-profile" aria-selected="false"> Curso-taller: Conduce Con💯te</a>

        <a class="nav-link w-25 p-1  m-0" data-toggle="modal" data-target="#modalMesaTrabajo" role="tab"
            aria-controls="nav-profile" aria-selected="false"> 2nda Mesa de Trabajo MUS-UASLP</a>

        <a class="nav-link w-25 p-1 m-0" data-toggle="modal" data-target="#modalUnirodada" role="tab"
            aria-controls="nav-profile" aria-selected="false"> Unirodada cicloturistica a la Cañada del Lobo

            <a class="nav-link w-25 p-1  m-0" data-toggle="modal" data-target="#modalIntervensiones" role="tab"
                aria-controls="nav-profile" aria-selected="false">Intervenciones y reordenamiento: Cebratón y Proyecto MUS-ZUP</a>

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
    <h3 style="color: #5c94d7;">Actividades: </h3>
    <ol style="font-size: 15px;">
        <li>
            <p class="h2 font-weight-bolder" style="font-family: 'Myraid Pro Bold';"> Ciclo de conferencias de Movilidad
                Urbana Sostenible</p>
            <ul>
                <li>
                    <p class="m-0 d-inline" style="font-family: 'Myraid Pro Bold';">
                        <strong>Conferencia 1: </strong>
                    </p>
                    <p class="m-0 d-inline ml-1">“Sostenibilidad energética en la pandemia”</p>
                </li>
                <p class="m-0"><strong>Ponente: </strong> Dr. Marcos Algara Siller y Daniela Rodríguez Aguilar <br>
                    <strong>Lugar:</strong> Zoom <br>
                    <strong>Fechas:</strong>Jueves 2 de septiembre 2021 <br>
                    <strong>Horario:</strong>18:00 a 19:00 horas
                </p>
                <br>
                <li>
                    <p class="m-0 d-inline" style="font-family: 'Myraid Pro Bold';">
                        <strong>Conferencia 2: </strong>
                    </p>
                    <p class="d-inline ml-1">
                        “Movilidad y Urbanismo con enfoque de género”
                    </p>
                    <p class="m-0"><strong>Ponente: </strong> Benilda Ivonne Aguayo Huerta, Roberto Josué Rodríguez
                        Santiago, Lourdes Marcela López Mares, Claudio Iván Aldrete López <br>
                        <strong>Lugar:</strong> Zoom <br>
                        <strong>Fechas:</strong>Jueves 9 de septiembre 2021 <br>
                        <strong>Horario:</strong>18:00 a 19:00 horas
                </li>
                <br>
            </ul>
        </li>
        <li>
            <p class="h2 font-weight-bolder" style="font-family: 'Myraid Pro Bold';">Curso-taller: Conduce Con💯te</p>
            <ul>
                <p class="m-0">
                    <strong>Lugar: </strong> Estacionamiento de Centro Cultural Universitario Bicentenario<br>
                    <strong>Fechas:</strong>sábado 18 de septiembre 2021 <br>
                    <strong>Horario:</strong> 10:00-11:30 horas
                </p>
                <p class="h4 font-weight-bolder mt-3">Descripción</p>
                <p>Este curso taller teórico y sensorial busca acercar a las personas que utilizan cualquier medio de
                    transporte a la problemática que el resto de los medios de transporte experimentan en sus recorridos
                    diarios, haciendo énfasis en los reglamentos de tránsito y la información respecto a la seguridad y
                    educación vial.</p>
                <strong>Ponente: </strong> Arq. Mirell Betanzo del Angel y Mtra en Arq. Alejandrina Pérez Ayala<br>
            </ul>

        </li>
        <li>
            <p class="h2 font-weight-bolder mt-3" style="font-family: 'Myraid Pro Bold';">2nda Mesa de Trabajo MUS-UASLP
            </p>
            <ul>
                <p class="m-0">
                    <strong>Lugar: </strong> Aula de la Agenda Ambiental de la UASLP<br>
                    <strong>Fechas:</strong>Viernes 24 septiembre 2021 <br>
                    <strong>Horario:</strong> 10:00-12:30 horas
                </p>
                <p class="h4 font-weight-bolder mt-3">Descripción</p>
                <p>Reunión de representantes de diferentes entidades de la UASLP especialistas en diferentes temas que
                    conciernen a la Movilidad Urbana Sostenible de la UASLP para lograr decisiones, acciones y
                    compromisos a través de la información y debate multidisciplinario.</p>
            </ul>
        </li>
        <li>
            <p class="h2 font-weight-bolder" style="font-family: 'Myraid Pro Bold';">Unirodada cicloturistica a la
                Cañada del Lobo</p>
            <ul>
                <p class="m-0">
                    <strong>Fecha:</strong>Sábado 25 de septiembre 2021 <br>
                    <strong>Horario:</strong> 7:30 a 11:00 horas
                    <strong>Punto de encuentro: </strong> Caja del Agua (Calzada de Guadalupe 200, SLP)<br>
                    <strong>Descripción: </strong>Recorrido ciclo turístico a la cañada del Lobo con parada para
                    hidratación/refrigerio y tiempo para recorrido con explicación ecológica del lugar con cuota de
                    recuperación que incluye ambulancia y refrigerio.

                </p>
                <p class="font-weight-bold mt-2 ">
                    Habrá bicibus con diferentes salidas al punto del encuentro (sin apoyo de policía y ambulancia)
                </p>
                <p>
                    <strong>Distancia total:</strong> 20 km aprox.
                    <strong>Cuota de recuperación:</strong> $100 (en efectivo previo al evento).
                    <p class="font-italic">*Llena el formulario de inscripción respectivo en el área de descargas antes
                        del 18 de septiembre del 2021.</p>
                    <p class="font-italic">La Unirodada tiene cupo limitado y se cierra el formulario al tener el número
                        de personas estimadas.</p>
                    <p class="font-italic">No olvides llevar agua y casco</p>
                </p>
            </ul>
        </li>
        <li>
            <p class="h2 font-weight-bolder mt-3" style="font-family: 'Myraid Pro Bold';">Intervenciones y
                reordenamiento: Cebratón y Proyecto MUS-ZUP</p>
            <ul>
                <p class="m-0">
                    <strong>Lugar: </strong> Av. Industrias y Manuel Nava<br>
                    <strong>Fechas:</strong>Jueves 30 de septiembre 2021 <br>
                    <strong>Horario:</strong>4:30-6:30 horas
                </p>
                <p class="h4 font-weight-bolder mt-3">Descripción</p>
                <p>En el marco del día de la Universidad se busca implementar una etapa del proyecto de reordenamiento
                    de la ZUP de parte del departamento de Vinculación de la Facultad del Hábitat en colaboración con
                    Depto. Diseño y construcción.
                    El proyecto considera la intervención de las paradas del transporte público, lugares de
                    estacionamiento, la accesibilidad peatonal y de todos los medios de transporte. Incluye el Cebratón,
                    que es una iniciativa de pintas artísticas en cruces peatonales que tiene como objetivo
                    reivindicar-reclamar el espacio de transeúntes y sensibilizar usuarios y actores de la vía pública.
                </p>
                <p class="h3 font-weight-bolder mt-3">Inscripciones</p>

                <li>Inscríbete llenando el formato de registro y especificando cada actividad en línea que se encuentra
                    como botón en esta página.</li>
                <li>En 48 horas (días hábiles) te llegara un correo con detalles de la actividad que elegiste. </li>
                <p class="mt-2">*Se limitará el número de personas dependiendo de actividad y se mantendrán las medidas
                    sanitarias</p>
                <p>**Las actividades del MMUS2021 están sujetas al sistema del semáforo COVID-19.</p>
            </ul>
        </li>
    </ol>
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
                            <img src="{{asset('storage/imagenes/mmus2021/Banners-Conferencias.png')}}" class="img-fluid" alt="">
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
                            <img src="{{asset('storage/imagenes/mmus2021/Banners-Talleres.png')}}" class="img-fluid" alt="">
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
                            <img src="{{asset('storage/imagenes/mmus2021/Banners-MesaT.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus2021/Banners-MesaT.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Banners-MesaT.png">CARTEL GENERAL </a>
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
                            <img src="{{asset('storage/imagenes/mmus2021/unirodada.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus/FORO.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="FORO.jpg">CARTEL GENERAL </a>
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
                            <img src="{{asset('storage/imagenes/mmus2021/Banners-Cebraton.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus2021/Banners-Cebraton.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Banners-Cebraton.png">CARTEL GENERAL </a>
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