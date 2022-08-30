@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-4 justify-content-center my-3 pt-0">
    <img src="{{ asset('storage/imagenes/mmus2022/logo_mmus2022.png') }}" class="rounded mx-auto d-block w-75 pt-5"
        alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-8 mb-5 mt-3">
    <p class="text-justify pSize pt-2 pt-xl-4 pt-lg-3  pt-md-0">
        Cumplimos 10 años celebrando en septiembre la Movilidad Urbana Sostenible en la UASLP a través del programa de la Agenda Ambiental "Unibici" en sinergía con colaboradores de todos los sectores se realizan actividades académicas, culturales, de educación ambiental, recreativas y de aplicación, incidiendo en los Objetivos Desarrollo Sostenible ODS11: Comunidades y ciudades sostenibles, ODS 13: Acción por el clima y ODS17: Alianzas para lograr objetivos.
        <br><br>
        Este año recordaremos que las ciudades son para las personas y nos sintonizamos con la temática mundial de este año "mejores conexiones" de la semana europea de movilidad, la UASLP se suma buscando que San Luis Potosí consiga migrar su movilidad urbana hacía una sostenible.
</div>
@endsection

@section('BannerBotones')
<div class="row justify-content-md-start ">
    <div class="col-12">
        <img src="{{ asset('storage/imagenes/mmus2022/B_seccion.png') }}" class="img-fluid " alt="" srcset="">
    </div>


</div>



<div class="mt-1 col-md-12 col-sm-12 p-0">
    <div class="nav nav-tabs justify-content-around my-1">
        <a class="nav-link w-25 p-1 m-0" data-toggle="modal" data-target="#Urbanismotactico" role="tab"
            aria-controls="nav-home" aria-selected="true">Intervención de urbanismo táctico temporal</a>

        <a class="nav-link w-25 p-1  m-0" data-toggle="modal" data-target="#Bicicinema" role="tab"
            aria-controls="nav-profile" aria-selected="false">Bicicinema</a>

        <a class="nav-link w-25 p-1  m-0" data-toggle="modal" data-target="#Conferencia" role="tab"
            aria-controls="nav-profile" aria-selected="false">Conferencia: "Ciudades de cuidado, cuidado con los vulnerables"</a>

        <a class="nav-link w-25 p-1 m-0" data-toggle="modal" data-target="#PlaceMarking" role="tab"
            aria-controls="nav-profile" aria-selected="false">"PlaceMarking: el arte de hacer lugares" por el Día Mundial Sin Auto</a>

            <a class="nav-link w-25 p-1  m-0" data-toggle="modal" data-target="#UnirodadaCineMA" role="tab"
                aria-controls="nav-profile" aria-selected="false">Unirodada CineMA Fest (Unirodada + película + convivencia)
                MUS-ZUP</a>
            <a class="nav-link w-25 p-1  m-0" data-toggle="modal" data-target="#Minirodada" role="tab" aria-controls="nav-profile" aria-selected="false">Minirodada CineMa y taller Biciescuelas </a>


    </div>
</div>

@endsection

@section('ObjetivosTexto')
<div class="pSize text-justify mt-5 px-3">
    <p class="text-center">La UASLP a través de la Agenda Ambiental y su programa<br>Unibici invita al<br>MES DE LA MOVILIDAD URBANA SOSTENIBLE (MMUS 2022)<br>Por una ciudad diseñada para las personas</p>
    <p><b>Colaboradores:</b>
        <ul>
            <li>Facultad del Hábitat UASLP</li>
            <li>Programa Multidisciplinario de Posgrado en Ciencias Ambientales UASLP</li>
            <li>Centro Cultural Alemán de San Luis Potosí</li>
            <li>Colectivo Derechos Urbanos</li>
            <li>Secretaria de Cultura del Gobierno del Estado</li>
            <li>Cineteca Alameda</li>
            <li>Centro de las Artes de San Luis Potosí</li>
            <li>Parque Tangamanga 1</li>
            <li>CineMa Festival de cine México-Alemania</li>
            <li>Estrategia Misión Cero</li>
        </ul>
    </p>
    <h3>Dirigido a</h3>Comunidad UASLP y público general.<br><br>
    <h3 style="color: #5c94d7;">Objetivo</h3>
    <p style="font-size: 15px !important;">Hacer énfasis en que las ciudades son para quien vive en ellas y necesitamos conectar a las personas con los lugares a través de sinergias, receptividad de las necesidades de la comunidad, conocimiento de la problemática, involucramiento de productos académicos, expansión de la cultura con otros contextos y promoción de un cambio de comportamiento. </p>

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
            <p class="text-center"><strong>Las actividades del MMUS2022 están sujetas al sistema del semáforo COVID-19.
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
<div class="modal fade" id="Urbanismotactico" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/mmus2022/Urbanismotactico.jpg')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-5 mt-2">
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'mmus'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                        </div>
                        <div class="col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">

                            <a href="{{asset('storage/imagenes/mmus2022/Urbanismotactico.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Urbanismotactico.jpg">CARTEL </a>
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

                            <h2 style="font-weight: 900; ">Intervención de Urbanismo táctico temporal</h2>
                            <br>
                            <span><b>Ponente: &nbsp;</b>Estrategia Misión Cero</span>
                            <br>
                            <span><b>Fecha: &nbsp;</b> sábado 3 de septiembre 2022</span>
                            <br>
                            <span><b>Dirigido a: &nbsp;</b> Comunidad PMPCA, UASLP y público general</span>
                            <br>                            
                            <span><b>Hora:&nbsp;</b> 10:30 a 15:00 horas</span>
                            <br>
                            <span><b>Lugar: &nbsp;</b> Eje 104 - Av. Industrias (zona industrial)</span>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="Bicicinema" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/mmus2022/CartelBicicinema.png')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <!--<div
                        class="row justify-content-center justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-5 mt-2">
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">

                            <a href={{route('Bienvenida',['nombreModal'=> 'mmus'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                        </div>-->
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus2022/CartelBicicinema.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="CartelBicicinema.png">CARTEL </a>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">

                            <h2 style="font-weight: 900;">Bicicinema</h2>
                            <span><b>Dirigido: &nbsp;</b> Comunidad PMPCA, UASLP y público en general</span>
                            <br>
                            <span><b>Lugar: &nbsp;</b>Plaza del Estudiante (Av. Niño Artillero, Zona Universitaria Poniente) </span>
                            <br>
                            <span><b>Fecha: &nbsp; </b> jueves 8 de septiembre 2022</span>
                            <br>
                            <span><b>Horario:&nbsp;</b> 19:30 - 22:00 horas</span><br>
                            <br>
                            <span>
                                <h4>Descripción</h4>
                            </span>

                            <span>Evento gratuito de proyección al aire libre el documental Bikes vs Cars, Fredrik Gertten, Suecia (2015) buscando que el público llegue en bicicleta o transporte cero emisiones.</span>
                            <br>
                            <br>


                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="Conferencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/mmus2022/Cartel_conferencia.png')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-5 mt-2">
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">

                            <a href={{route('Bienvenida',['nombreModal'=> 'mmus'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                        </div>
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus2022/Cartel_conferencia.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_conferencia.png">CARTEL </a>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10"
                                style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">


                                <h2 style="font-weight: 900;">Conferencia: "Ciudades de cuidado, cuidado con los vulnerables"</h2>
                                <span><b>Ponente: &nbsp;</b> Paco de Anda<br>Licenciado en Diseño Industrial por la Universidad Anáhuac México Norte y Maestría en Mercadotecnia y Publicidad por la misma institución. <br><br>Fundador de la primera organización civil de seguridad vial del país, Movilidad y Desarrollo México (MDM). Ha recibido e impartido cursos de seguridad vial en diversos países de Latinoamérica y Europa. Participó como Asesor en Seguridad Vial para la Organización Panamericana de la Salud y el Consejo Nacional para la Prevención de Accidentes de la Secretaría de Salud. Fue Coordinador del Programa Global de Seguridad Vial en México para la Alianza Global de Seguridad Vial (GRSP). Es Auditor de Seguridad Vial certificado y es especialista en diseño y gestión de políticas públicas en seguridad vial con enfoque sistémico, comunicación estratégica y administración de proyectos. Ha realizado proyectos de infraestructura segura con perspectiva de usuarios vulnerables y manuales de gestión y gobernanza en seguridad vial. Recientemente fue asesor técnico de seguridad vehicular y asesor para la Ley de Movilidad y Seguridad Vial para la Incubadora Global de Promoción de la Salud y el Senado de la República. Es formador certificador de instructores de autoescuela por parte de la asociación de autoescuelas AUTOMEX. Actualmente es titular de MDM, miembro de la Alianza Global de ONGs por la Seguridad Vial, consultor en seguridad vial y miembro del Consejo de Movilidad de la ciudad de Playa del Carmen, donde reside. </span>
                                <br>
                                <span><b>Lugar: &nbsp;</b> Zoom</span>
                                <br>
                                <span><b>Fecha:&nbsp; </b> jueves 15 de septiembre 2022</span>
                                <br>
                                <span><b>Horario:&nbsp;</b> 12:00 - 13:00 horas</span>
                                <br>
                                <br>
                                <span>
                                    <h4>Descripción</h4>
                                </span>
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

<div class="modal fade" id="PlaceMarking" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/mmus2022/Cartel_Placemaking.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-5 mt-2">
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'mmus'])}}
                                class="btn btn-secondary bg-light  text-muted downloadBtn " role="button">REGISTRAR</a>
                        </div>
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="{{asset('storage/imagenes/mmus2022/Cartel_Placemaking.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_Placemaking.png">CARTEL </a>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10"
                                style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">


                                <h2 style="font-weight: 900;">"PlaceMaking: el arte de hacer lugares" por el Día mundial sin auto
                                </h2>
                                <br>
                                <span><b>Talleristas: &nbsp;</b> &nbsp;Colectivo Derechos Urbanos</span>
                                <br>
                                <span><b>Lugar: &nbsp;</b> &nbsp;Banqueta y calles de "las 9 esquinas", Damián Carmona 300, Zona Centro</span>
                                <br>
                                <span><b>Fecha: &nbsp;</b> &nbsp;jueves 22 de septiembre 2022</span>
                                <br>
                                <span><b>Horario:&nbsp;</b>&nbsp;8:00 - 14:00 horas</span>
                                <br>
                                <span><b>Descripción: &nbsp;</b> &nbsp;El "placemaking" es un concepto y herramienta práctica que busca la mejora de espacios, en este caso espacios públicos, con un enfoque participativo y de urbanismo táctico para la planificación, diseño y gestión observando el espacio y haciendo preguntas a las personas que habitan, transitan o trabajan en un espacio determinado para descubrir sus necesidades y aspiraciones. En este evento se realizarán diferentes intervenciones físicas emergentes, actividades culturales e invitaciones de participación para la comunidad.</span>
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
<div class="modal fade" id="UnirodadaCineMA" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                    <!--<div class="row justify-content-center">
                        <div class="col-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 ">
                            <img src="{{asset('storage/imagenes/mmus2021/Banners-Cebraton.png')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>-->
                    <div
                        class="row justify-content-center justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-5 mt-2">
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'mmus'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                        </div>
                        <!--<div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus2021/Banners-Cebraton.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Banners-Cebraton.png">CARTEL </a>
                        </div>-->
                        <div class="row justify-content-center">
                            <div class="col-10"
                                style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                                <h2 style="font-weight: 900;">UnirodadaCineMa Fest (Unirodada + Pelicula + Convivencia</h2>
                                <span><b>Fecha: </b> sábado 24 de septiembre 2022 </span>
                                <br>
                                <span>
                                    <h4>Descripción</h4>
                                </span>
                                <p class="text-justify">
                                    Evento multifacético que comienza con una Unirodada cicloturística que busca recorrer espacios que representan una problemática ambiental para reflexionar, en este caso, sobre el manejo, gestión y tratamiento del agua en SLP al mismo tiempo que se fomenta el uso de la bicicleta y el deporte; seguido del llegar a un espacio cultural para continuar con el análisis a través del cine y los efectos intrínsecos del uso de la bicicleta y finalizando con una convivencia entre la comunidad potosina en honor a la cultura alemana.
                                </p>
                                <br>
                                <h2 style="font-weight: 900;">Unirodada cicloturística a Tanque Tenorio
                                </h2>
                                <br>
                                <span><b>Horario: &nbsp;</b> &nbsp;16:30 - 19:30 horas</span>
                                <br>
                                <span><b>Distancia total: &nbsp;</b> &nbsp;30 km</span>
                                <br>
                                <span><b>Dificultad: &nbsp;</b> &nbsp;Intermedia</span>
                                <br>
                                <span><b>Salida:&nbsp;</b>&nbsp;Edificio Central UASLP</span>
                                <br>
                                <span><b>Llegada:&nbsp;</b>&nbsp;CEART</span>
                                <br>
                                <span><b>Cuota de recuperación:&nbsp;</b>&nbsp;$ 50 (cincuenta pesos mexicanos)</span>
                                <br>
                                <span><b>Fecha límite de registro&nbsp;</b>&nbsp;20 de septiembre 2022</span>
                                <br>
                                <span>Plática, hidratación y refrigerio en tanque Tenorio</span>
                                <br>
                                <br>
                                <br>
                                </ol>

                                <h2 style="font-weight: 900;">Documental: "Why we cycle", Arne Gielen, Gertjan Hulster, Países Bajos (2020)
                                </h2>
                                <br>
                                <span><b>Horario: &nbsp;</b> &nbsp;20:00 - 21:00 horas</span>
                                <br>
                                <span><b>Lugar: &nbsp;</b> &nbsp;Patio de los muros CEART</span>
                                <br>
                                <br>
                                <br>

                                <h2 style="font-weight: 900;">Fiesta alemana
                                </h2>
                                <br>
                                <span><b>Horario: &nbsp;</b> &nbsp;21:00 - 23:00 horas</span>
                                <br>
                                <span><b>Lugar: &nbsp;</b> &nbsp;CEART</span>
                                <br>
                                <span>Música en vivo, venta de salchichas alemanas y cerveza<br>Evento en colaboración con Centro Cultural Alemán</span>
                                <br>
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

<div class="modal fade" id="Minirodada" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                    <!--<div class="row justify-content-center">
                        <div class="col-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 ">
                            <img src="{{asset('storage/imagenes/mmus2021/Banners-Cebraton.png')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>-->
                    <div
                        class="row justify-content-center justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-5 mt-2">
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'mmus'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                        </div>
                        <!--<div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus2021/Banners-Cebraton.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Banners-Cebraton.png">CARTEL </a>
                        </div>-->
                        <div class="row justify-content-center">
                            <div class="col-10"
                                style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                                <h2 style="font-weight: 900;">MiniRodada CineMa y taller Biciescuelas</h2>
                                <span><b>Fecha: </b> domingo 25 de septiembre 2022 </span>
                                <br>
                                <span><b>Dirigido a: &nbsp;</b> &nbsp;Niños y público en general</span>
                                <br>
                                <span><b>Lugar: &nbsp;</b> &nbsp;Planetario de Parque Tangamanga 1</span>
                                <span>
                                    <h4>Descripción</h4>
                                </span>
                                <p class="text-justify">
                                    <b>Minirodada</b><br>
                                    Evento para niños de todas las edades y adultos, 2 km aproximadamente dentro de las instalaciones del Parque, siguiendo los protocolos de minirodadas.<br><br>
                                    <span><b>Horario:</b> 10:00 - 11:00 horas</span>
                                </p>
                                <br>
                                <br>
                                <p class="text-justify">
                                    <b>Taller Biciescuelas</b><br>
                                    Curso en donde se instruirá a los participantes de los conocimientos necesarios para poderse moverse en bicicleta de manera más segura dentro y fuera de la ciudad, así como explicar el uso correcto de equipamiento urbano para el ciclista, la forma de circular de manera más segura en zonas urbanos en donde el espacio para transitar se comparte con los demás medios de transporte, dando así las herramientas necesarias para tener mayor seguridad y difundir una cultura ciclista responsable.<br><br>
                                    <span><b>Horario:</b>11:00 - 12:00 horas</span>
                                    <br>
                                    <span><b>Tallerista:</b>Luis Enrique Mejía Estrada (Unibici)</span>
                                </p>
                                <p class="text-justify">
                                    <b>Película infantil</b><br>
                                    Der Konferenz der Tiere (Animales al ataque) Dir. Reinhard Klooss, Holger Tappe / 2020 / 1h 33 min.<br><br>La película narra la historia en que Billy la suricata y su amigo el león Sócrates, emprenden una búsqueda épica para descubrir por qué su río se ha secado inesperadamente. Además, la película envía un mensaje en defensa del medio ambiente y muestra algunas escenas de los desastres que el hombre ha provocado con la naturaleza.<br><br>
                                    <span><b>Horario:</b>12:00 horas</span>
                                    <br>
                                    <span>*Con Centro Cultural Alemán</span>
                                </p>

                                <p>** Se limitará el número de personas dependiendo de la actividad y se mantienen las medidas sanitarias necesarias.<br><br>** Fecha límite de registro por evento 3 días al evento.</p>
                                <br><br>
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
