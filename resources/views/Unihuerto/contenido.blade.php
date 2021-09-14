@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-4 justify-content-center my-5">
    <img src="{{ asset('storage/imagenes/Logos/unihuerto.png') }}" class="rounded mx-auto d-block w-50 py-xl-5 py-md-5"
        alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-8 my-5">
    <p class="text-justify pSize pt-5 pt-xl-4 pt-lg-3  pt-md-0">
        Unihuerto tiene como objetivo la creación de huertos en los distintos espacios universitarios para obtener una
        mejor salud entre los estudiantes y el personal universitario, promover servicios ambientales para limpiar el
        aire y recuperar áreas degradadas convirtiéndolas en áreas vivas productivas.
        <br><br>

        En el 2013 se concibe el proyecto “Unihuerto Urbano” como medida de recuperación del medio a través de la
        regeneración de áreas verdes y la producción de alimento para autoconsumo. Es decir, se reconoce la necesidad
        constante de alimentación en las zonas urbanas y se propone incidir en aspectos socioeconómicos de manera
        positiva para mejorar la calidad de vida de la comunidad universitaria y de manera posterior trascender los
        límites de los campus. (Algara, 2014).
        <br><br>

        Ha logrado extenderse dentro y fuera de la U.A.S.L.P., consiguiendo ser un espacio de convivencia que promueve
        el respeto a la naturaleza, el autoconsumo y la soberanía alimentaria.
</div>
@endsection

@section('BannerBotones')
<div
    class="mx-auto row justify-content-center justify-content-xl-between justify-content-lg-between justify-content-md-between justify-content-sm-between p-0">
    <div class="col-12 p-0">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('storage/imagenes/Unihuerto/UNIHUERTO.png')}}" class="d-block img-fluid"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <a target="_blank"
                        href="http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/_layouts/15/FormServer.aspx?XsnLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegPartUnihuerto/Forms/template.xsn&OpenIn=browser&SaveLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegPartUnihuerto&Source=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegPartUnihuerto">
                        <img src="{{asset('storage/imagenes/Unihuerto/Banner_Base-Voluntarios.jpg')}}" alt=""
                            class="d-block w-100" alt="...">
                    </a>
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

<!--
<div class="row mt-1 col-md-12 col-sm-12 pl-md-4 justify-content-xl-start  justify-content-lg-start  justify-content-md-start justify-content-around">
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">

        <a class="btn btnCur m-2 " href="#" role="button group" data-toggle="modal" data-target="#modalTallerUnihuerto">
            CURSO TALLER <br> UNIHUERTO EN CASA
        </a>

        <a class="btn btnCur m-2 " href="#" role="button group" data-toggle="modal" data-target="#modalCursoUnihuerto">
            CURSO DE <br> JARDINERIA SOSTENIBLE
        </a>

    </div>
</div>
-->
<div class="mt-1 col-md-12 col-sm-12 p-0">
    <div class="nav nav-tabs justify-content-between">
        <a class="nav-link w-25 p-1 m-0" data-toggle="modal" data-target="#modalTallerUnihuerto" role="tab"
            aria-controls="nav-home" aria-selected="true">Curso Taller <br> Unihuerto En Casa</a>
        <a class="nav-link w-25 p-1 m-0" data-toggle="modal" data-target="#modalCursoUnihuerto" role="tab"
            aria-controls="nav-profile" aria-selected="false"> Curso De <br> Jardineria Sostenible</a>
        <a class="nav-link w-25 p-1 m-0" data-toggle="modal" data-target="#modalTallerFunicultura" role="tab"
            aria-controls="nav-profile" aria-selected="false"> Taller: Fungicultura <br> en Unihuerto</a>

    </div>
</div>

@endsection

@section('ObjetivosTexto')
<div class="pSize text-justify mt-5 p-3">
    <h3 class="h3Title">Objetivo general</h3>
    <ul>
        <li>Crear comunidad a través del trabajo en equipo y la formación continua de estudiantes capaces de
            desarrollar proyectos y afianzar sus conocimientos al capacitar a otros.</li>
        <li>Aprender de agricultura urbana en particular métodos orgánicos combinando la aplicación de técnicas de
            cultivo tradicional con las nuevas tecnologías.</li>
        <li>Limpiar el aire de zona urbanas a través de la absorción de dióxido de carbono a través de la cobertura
            vegetal en edificaciones.</li>
        <li>Sensibilizar y capacitar al público en cuanto a la problemática ambiental y las respuestas que existen a
            ésta.</li>
        <li>Promover hábitos saludables de alimentación, ejercicio y convivencia con la naturaleza.</li>
        <li>Generar seguridad alimentaria dentro de la población universitaria y potosina asegurando alimento sano.
        </li>
    </ul>
    <h3 class="h3Title">Objetivos específicos</h3>
    <ul>
        <li>Mejorar las condiciones físicas, de seguridad y culturales del uso de la bici.</li>
        <li>Aumentar el uso de medios de transporte no motorizados, colectivos y sostenibles en la ciudad y en las
            comunidades.</li>
        <li>Formar y sensibilizar a la población en temas de seguridad, solidaridad y respeto, normativa vial y uso
            correcto de las vialidades para prevenir accidentes y mejorar la convivencia de la ciudad.</li>
        <li>Fomentar el ciclismo deportivo y el cicloturismo como medios para obtener salud y bienestar así como
            para
            impulsar el ecoturismo y la cultura.</li>
        <li>Promover la Movilidad Urbana Sostenible desde todos los enfoques de sus actores empezando por los
            derechos del
            Peatón.</li>
        <li>Colaborar, vincular e incidir en la creación y mejoramiento de la ciudad con respecto a todos los
            aspectos del
            espacio público con un enfoque participativo.</li>
    </ul><br>
    <h3 class="h3Title">Puedes acércate a un Unihuerto en:</h3>
    <ul>
        <li>Unitecho de Facultad de Ingeniería</li>
        <li>Unidad Académica Multidisciplinaria Zona Huasteca</li>
        <li>Coordinación Académica Región Altiplano</li>
        <li>Facultad de Psicología, Zona Universitaria Oriente</li>
    </ul>
    <p style="text-align: justify;">Existe el compromiso constante de difundir lo que se hace en el Unihuerto y
        divulgar la ciencia que conlleva por lo que el programa forma parte de uno de los grupos de divulgación del
        Departamento de Difusión y Divulgación de la Facultad de Ingeniería: “Ingeniosos divulgando”. Este grupo
        tiene como objeto diseñar y desarrollar actividades de divulgación para la formación de vocaciones
        ingenieriles para la construcción de una cultura científica y tecnológica en la sociedad y tiene
        participaciones en eventos locales y nacionales de divulgación de ciencia y tecnología. Dentro de la
        colaboración Institucional el programa se apoya y trabaja estrechamente con el programa Unisalud de
        Servicios Estudiantiles.

        <h4 class="h3Title">Más Información</h4>
        <p style="font-size: 14px !important;"><b>Sistema de Gestión Ambiental</b><br>Agenda Ambiental de la
            UASLP<br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava No. 201, segundo piso<br>Zona
            Universitaria,
            C.P.
            78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300 Ext. 7210 y 7215<br>
            Facebook
            <a href="https://www.facebook.com/UnihuertoUASLP" target="_blank" rel="noopener noreferrer">Unihuerto UASLP</a>
            <br>
            <a href="mailto:unihuerto@uaslp.mx">unihuerto@uaslp.mx</a></p>
</div>
@endsection

@section('Modales')
<div class="modal fade" id="modalTallerUnihuerto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/Unihuerto/Cartel_UnihuertoenCasa.jpg')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Unihuerto/Cartel_UnihuertoenCasa.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_UnirodadaN.jpg">CARTEL GENERAL </a>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                            <h4>Curso-taller: Unihuerto en casa</h4>
                            <br><br>
                            <h4>Dirigido a</h4>
                            <p>Comunidad universitaria y público interesado.</p><br>
                            <h4>Objetivo general</h4>
                            <p>Ofrecer las herramientas teórico-prácticas necesarias para que puedas construir tu propio
                                huerto.</p>
                            <p align="center"><b>Este curso-taller puede acreditarse como actividad de aprendizaje en
                                    varias Facultades de la UASLP y ofrece constancia de Secretaría Académica.</b> <a
                                    href="mailto:mariana.buendia@uaslp.mx">mariana.buendia@uaslp.mx</a></p>
                            <br>
                            <h4>Lugar, fecha y horario</h4>
                            <ul>
                                <li><span><b>Horas totales:</b></span> 32 horas.</li>
                                <li><span><b>Horas teóricas:</b></span> 12 horas, sesiones en Plataforma Teams los:
                                    sábados de 9:00 a 12:00 horas: 27 de febrero, 27 de marzo, 24 de abril, 29 de mayo
                                    del 2021.</li>
                                <li><span><b>Tarea individual:</b></span> 8 horas.</li>
                                <li><span><b>Horas de práctica:</b></span> 12 horas.</li>
                            </ul>
                            <p>Sesiones de practica presenciales en casa, colonia o en Unihuertos de la UASLP
                                (obligatorio para quien inscriba el curso como actividad de aprendizaje).</p>
                            <br>
                            <h4>Módulos</h4>
                            <ul>
                                <li>Módulo I. <b>Desarrollo de huertos</b>, 27 de febrero del 2021.</li>
                                <li>Módulo II. <b>Compostaje</b>, 27 de marzo del 2021.</li>
                                <li>Módulo III. <b>Control de plagas</b>, 24 de abril del 2021.</li>
                                <li>Módulo IV. <b>Del Huerto a la Mesa</b>, 29 de mayo del 202.</li>
                            </ul>
                            <p><i>El curso se puede llevar completo o por módulo, para registrarse en un solo módulo
                                    revisar página de curso-taller que interesa.</i></p>
                            <br>
                            <h4>Prerrequisitos</h4>
                            <ul>
                                <li>Contar con disponibilidad de horarios para asistir a las sesiones programadas y
                                    realizar actividades previstas en el programa del curso.</li>
                                <li>Personas con cualquier tipo de perfil, que tengan o no experiencia con producción
                                    agrícola pero que tenga el interés de conocer y adoptar modelos agroecológicos.</li>
                                <li>Tener excelente disposición hacia la comunicación, aprendizaje y colaboración en el
                                    desarrollo del curso así como de los objetivos planteados.</li>
                                <li>Disposición para asistir y realizar las sesiones prácticas tanto en Unihuerto como
                                    en su hogar o colonia según sea el caso.</li>
                            </ul>
                            <br>
                            <h4>Fecha límite de registro</h4>
                            <p>Curso-taller de valor curricular: 12 de febrero 2021.<br>Un módulo: miércoles previo a
                                curso-taller<br><br><b>Cupo límite:</b> 30 personas.</p>
                            <br>
                            <h4>Inversión</h4>
                            <p>Pago de curso completo (los 5 módulos, 32 horas CON constancia de Secretaría Académica o
                                actividad de aprendizaje):<br>
                            </p>
                            <ul>
                                <li>Participantes que pertenecen a la comunidad universitaria: Estudiantes y
                                    trabajadores de la UASLP, tiene un costo de $500.00 MXN (Quinientos pesos).</li>
                                <li>Participantes externos: Instituciones públicas o privadas, dependencias de gobiernos
                                    y público en general, tiene un costo de $800.00 MXN (Ochocientos pesos).</li>
                            </ul>
                            Pago de un solo módulo (SIN constancia de Secretaría Académica o actividad de aprendizaje):
                            $200 MXN (Doscientos pesos).
                            <p></p>
                            <br>
                            <h4>Registro</h4>
                            <p>Pasos para registro de participantes:
                            </p>
                            <ol>
                                <li>Llenar correctamente el formulario en línea de registro de esta página web.</li>
                                <li>Al finalizar y dar clic en el botón enviar, con esta primera etapa del proceso queda
                                    PRE-INSCRITO.</li>
                                <li>A más tardar en 2 días recibirá un correo electrónico informándole su pre-registro y
                                    adjuntado la ficha de pago, así como las indicaciones del proceso de pago o el
                                    descuento por nómina.</li>
                                <li>Como último paso obligatorio para su REGISTRO oficial es enviar su comprobante de
                                    pago por correo electrónico a <a
                                        href="mailto:unihuerto@uaslp.mx">unihuerto@uaslp.mx</a></li>
                            </ol>
                            <p></p>
                            <p>Nota importante: Comunidad Universitaria que serán apoyados por sus Dependencias con el
                                pago de inscripción, tienen que hacer el trámite a través de su Administrador con una
                                Orden de Servicio interna. No se emite factura para reembolso.</p>
                            <br>
                            <h4>Más información</h4>
                            <p><b>Programa Unihuerto</b><br>Agenda Ambiental de la UASLP<br>Universidad Autónoma de San
                                Luis Potosí<br>Manuel Nava No. 201, segundo piso<br>Zona Universitaria, C.P.
                                78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300 Ext. 7210<br><a
                                    href="mailto:mariana.buendia@uaslp.mx">mariana.buendia@uaslp.mx<br></a><a
                                    href="mailto:unihuerto@uaslp.mx">unihuerto@uaslp.mx</a></p><a
                                href="mailto:unihuerto@uaslp.mx">
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="modalCursoUnihuerto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/Unihuerto/Cartel_jardineria.jpg')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/_layouts/15/FormServer.aspx?XsnLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegCursoJardineria/forms/template.xsn&OpenIn=browser&SaveLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegCursoJardineria&Source=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegCursoJardineria"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " target="_blank"
                                role="button">REGISTRATE </a>

                        </div>
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Unihuerto/Cartel_jardineria.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_UnirodadaN.jpg">CARTEL GENERAL </a>

                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'"><br>
                            <h4>Curso de Jardinería Sostenible</h4><br><br>
                            <h4>Dirigido a</h4>
                            <p>Jardineros, jefes de mantenimiento, administradores de la UASLP y comunidad
                                universitaria.</p><br>
                            <h4>Objetivo</h4>
                            <p>Capacitar a encargados y procuradores de las áreas verdes de la UASLP para el manejo
                                apropiado y sostenible de éstas, a través de la compartición de conocimiento de expertos
                                en cada tema junto con el dialogo con los participantes tomando en cuenta su pericia y
                                experiencia.</p><br>
                            <h4>Lugar, fecha y horario</h4>
                            <p></p>
                            <ul>
                                <li><b>25 y 26 de marzo de 8:00 a 12:00 horas</b></li><b>
                                    <li><b>Modalidad: presencial y Microsoft Teams </b></li>
                                    <li><b>Tiempo total:</b> 8 horas</li>
                                </b>
                            </ul>
                            <p></p><b><br>
                                <h4>Temas</h4>
                                <p>Asociación y tipos de especies, control biológico de plagas, arquitectura del
                                    paisaje, forestaría y riesgos en las áreas verdes.</p><br>
                                <h4>Prerrequisitos</h4>
                                <p></p>
                                <ul>
                                    <li>Contar con disponibilidad de horario para asistir a las sesiones programadas y
                                        realizar actividades previstas en el programa del curso.</li>
                                    <li>Personas que trabajen en el mantenimiento y planeación de las áreas verdes que
                                        tengan experiencia e interés de conocer y adoptar modelos sostenibles.</li>
                                    <li>Tener excelente disposición hacia la comunicación, aprendizaje y colaboración en
                                        el desarrollo del curso así como de los objetivos planteados.</li>
                                </ul>
                                <p></p><br>
                                <h4 align="center">Curso sin costo</h4><br><br>
                                <h4>Más información</h4>
                                <p>Programa Universitario de Biodiversidad<br>Agenda Ambiental de la
                                    UASLP<br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava No. 201, segundo
                                    piso<br>Zona Universitaria, C.P. 78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300
                                    Ext. 7210<br><a
                                        href="mailto:gestion.ambiental@uaslp.mx">gestion.ambiental@uaslp.mx</a><br><a
                                        href="mailto:unihuerto@uaslp.mx">unihuerto@uaslp.mx</a>
                                </p>
                            </b>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="modalTallerFunicultura" tabindex="-1" role="dialog"
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
                            <img src="{{asset('storage/imagenes/Unihuerto/CARTEL-FUNGICULTURA.jpg')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-around justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-3 mx-lg-5 mx-xl-5  mx-md-5 mx-sm-5 mt-2">

                        <div class=" col-6 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                           <!--
                            <a href="http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/_layouts/15/FormServer.aspx?XsnLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/Ref_Fungicultura/forms/template.xsn&OpenIn=browser&SaveLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/Ref_Fungicultura&Source=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/Ref_Fungicultura"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " target="_blank"
                                role="button">REGISTRATE </a>
                           -->
                        </div>
                        <div class=" col-6 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Unihuerto/CARTEL-FUNGICULTURA.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="CARTEL-FUNGICULTURA.jpg">CARTEL GENERAL </a>

                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:15px; padding-top: 3%; font-family: 'Myraid light';'"><br>
                            <h4>Taller: Fungicultura en Unihuerto</h4><br><br>
                            <h4>Dirigido a</h4>
                            <p>Estudiantes UASLP y público general.</p><br>

                            <h4>Lugar, fecha y horario</h4>
                            <p></p>
                            
                                <b>Fecha:</b> viernes 16 de junio del 2021 <br>
                                    <b>Hora: </b> 10:00 a 12:00 horas <br>
                                    <b>Bimodal:</b> Presencial (cupo limitado), a distancia (Zoom) <br>
                                    <b>Lugar: </b>Zoom y Casa de fungicultura de Unihuerto <br>
                                   
                                    <h2 class="font-weight-bold text-center mt-2 text-light"> <b>SIN COSTO</b> </h2>
                                </b>
                            
                            <p></p><br>
                                <h4>Registro</h4>
                                <p > <b>Pasos para registro de participantes:</b> 
                                </p>
                                <ol>
                                    <li>Llenar correctamente el formulario en línea de registro de esta página web.</li>
                                    <li>Al finalizar y dar clic en el botón enviar, con esta primera etapa del proceso queda PRE-INSCRITO.</li>
                                    <li>Se te enviara un correo en un lapso de 48 horas que confirme tu participación ya sea presencial (CUPO LIMITADO) o en caso de ser en línea se te envía un link para asistir. </li>
                                   
                                </ol>
                                <br>
                                
                               
                                <h4>Informes</h4>
                                <p><b>Programa Unihuerto<br>Agenda Ambiental de la
                                    UASLP</b> <br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava No. 201, segundo
                                    piso<br>Zona Universitaria, C.P. 78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300
                                    Ext. 7210<br>
                                    <a href="mailto:unihuerto@uaslp.mx">unihuerto@uaslp.mx</a>
                                </p>
                            </b>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<script>
    console.log({{$NombreM}});
    $('#{{$NombreM}}').modal('show')
</script>
@endsection
@push('stylesheets')
<link href="{{ asset('css/nav-tabs_contenido.css') }}" rel="stylesheet" type="text/css">
@endpush