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
                    <img src="{{asset('storage/imagenes/Unihuerto/B_Unihuerto23.png')}}" class="d-block img-fluid"
                        alt="...">
                </div>
                <div class="carousel-item">
                        <img src="{{asset('storage/imagenes/Unihuerto/UNIHUERTO.png')}}" alt=""
                            class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item">
                    <a target="_blank"
                        href="http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/_layouts/15/FormServer.aspx?XsnLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegPartUnihuerto/Forms/template.xsn&OpenIn=browser&SaveLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegPartUnihuerto&Source=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegPartUnihuerto">
                        <img src="{{asset('storage/imagenes/Unihuerto/Banner_Base-Voluntarios.jpg')}}" alt=""
                            class="d-block w-100" alt="...">
                    </a>
                </div>
                <!--<div class="carousel-item">
                    <img src="{{asset('storage/imagenes/Unihuerto/BINT_Unihuerto.png')}}" class="d-block img-fluid"
                        alt="...">
                </div>
                <div class="carousel-item">
                        <img src="{{asset('storage/imagenes/Unitrueque/BINT_Unitrueque.png')}}" alt=""
                            class="d-block w-100" alt="...">
                    </a>
                </div>
            </div>-->
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
        <a class="nav-link w-25 p-1 m-0" data-toggle="modal" data-target="#modalTallerUnihuerto23" role="tab"
            aria-controls="nav-home" aria-selected="true">Curso Taller <br> &nbsp;</a>
        <a class="nav-link w-25 p-1 m-0" data-toggle="modal" data-target="#modalUnitrueque2022" role="tab"
            aria-controls="nav-profile" aria-selected="false"> UniTrueque <br> UASLP</a>
        <a class="nav-link w-25 p-1 m-0" data-toggle="modal" data-target="#modalTallerHuertoalaMesa" role="tab"
            aria-controls="nav-profile" aria-selected="false"> &nbsp;</a>
            <a class="nav-link w-25 p-1 m-0" data-toggle="modal" data-target="#modalTallerAgricultura" role="tab"
            aria-controls="nav-profile" aria-selected="false"> &nbsp;<br> &nbsp;</a>

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
        <div class="col-12 d-flex justify-content-center">
            <img src="{{asset('storage/imagenes/Unihuerto/Mapa_Unihuertos.png')}}" alt="" class="w-50 h-auto" >
        </div>

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
                            <img src="{{asset('storage/imagenes/Unihuerto/CartelUnihuerto_2022.png')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>

                    <div
                        class="row justify-content-around justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-3 mx-lg-5 mx-xl-5  mx-md-5 mx-sm-5 mt-2">

                        <!--<div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'Unihuerto'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                        </div>-->
                        <div class=" col-6 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Unihuerto/CartelUnihuerto_2022.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="CartelUnihuerto_2022.png">CARTEL</a>

                        </div>

                    <!--<div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                    <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'Unihuerto'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>

                        </div>

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Unihuerto/CartelUnihuerto_2022.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="CartelUnihuerto_2022.png">CARTEL</a>
                        </div>-->

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
                            <p align="center">Este curso-taller puede acreditarse como actividad de aprendizaje en
                                    varias Facultades de la UASLP y ofrece constancia de Secretaría Académica.<br><a
                                    href="mailto:mariana.buendia@uaslp.mx">mariana.buendia@uaslp.mx</a></p>
                            <br>
                            <h4>Lugar, fecha y horario</h4>
                            <ul>
                                <li><span><b>Horas totales:</b></span> 32 horas.</li>
                                <li><span><b>Horas teóricas:</b></span> 12 horas.</li>
                                <li>Sesiones en Plataforma Teams los sábados de 9:00 a 12:00 horas:<br>26 de febrero, 26 de marzo, 30 de abril, 28 de mayo
                                    del 2022.</li>
                                <li><span><b>Tarea individual:</b></span> 8 horas.</li>    
                                <li><span><b>Horas de práctica:</b></span> 12 horas.</li>    
                            </ul>
                            <p>Sesiones de práctica presenciales en casa, colonia o en Unihuerto de la UASLP (obligatorio para quien inscriba el curso como actividad de aprendizaje). Sábados de 9:00 a 12:00 horas. 5 de marzo, 2 de abril, 7 de mayo, 4 de junio del 2022.</p>
                            <br>
                            <h4>Módulos</h4>
                            <ul>
                                <li><b>Módulo I.</b> Desarrollo de huertos, 26 de febrero y 5 de marzo del 2022.</li>
                                <li><b>Módulo II.</b> Composta en traspatio, 26 de marzo y 2 de abril del 2022.</li>
                                <li><b>Módulo III.</b> Control biológico, 30 de abril y 7 de mayo del 2022.</li>
                                <li><b>Módulo IV.</b> Post cosecha, 28 de mayo y 4 de junio del 2022.</li>
                            </ul>
                            <br>
                            <h4>Prerrequisitos</h4>
                            <ul>
                                <li>Contar con disponibilidad de horarios para asistir a las sesiones programadas y
                                    realizar actividades previstas en el programa del curso.</li>
                                <li>Personas con cualquier tipo de perfil, que tengan o no experiencia con producción
                                    agrícola pero que tenga el interés de conocer y adoptar modelos agroecológicos.</li>
                                <li>Tener excelente disposición hacia la comunicación, aprendizaje y colaboración en el
                                    desarrollo del curso, así como de los objetivos planteados.</li>
                                <li>Disposición para asistir y realizar las sesiones prácticas tanto en Unihuerto como
                                    en su hogar o colonia según sea el caso.</li>
                            </ul>
                            <br>
                            <h4>Fecha límite de registro</h4>
                            <p>11 de febrero del 2022.</p>
                            <p align="center">CUPO LÍMITE: 30 personas.</p>
                            <br>
                            <h4>Inversión</h4>
                            <p>Pago de curso completo (los 4 módulos, 32 horas CON constancia de Secretaría Académica o
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
                                <li>Recibirá correo de confirmación de inscripción con más detalles del curso.</li>
                            </ol>
                            <p></p>
                            <p>Nota importante: Comunidad Universitaria que serán apoyados por sus Dependencias con el
                                pago de inscripción, tienen que hacer el trámite a través de su Administrador con una
                                Orden de Servicio interna. No se emite factura para reembolso.</p>
                            <br>
                            <h4>Formas de pago</h4>
                            <p>Las fichas de pago se pueden pagar directamente en el banco o se pueden hacer transferencias desde el portal de multipagos de la UASLP: <a href="https://www.finanzas.uaslp.mx/Multipagos">https://www.finanzas.uaslp.mx/Multipagos</a><br><br>
                            * En caso de requerir factura favor de indicarlo y mandar datos fiscales.</p>
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

<div class="modal fade" id="modalTallerUnihuerto23" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/UnihuertoCasa/Cartel_Unihuerto23.png')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>

                    <div
                        class="row justify-content-around justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-3 mx-lg-5 mx-xl-5  mx-md-5 mx-sm-5 mt-2">

                        <!--<div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'Unihuerto'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                        </div>-->
                        <div class=" col-6 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Unihuerto/Cartel_Unihuerto23.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_Unihuerto23.png">CARTEL</a>

                        </div>

                    <!--<div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                    <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'Unihuerto'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>

                        </div>

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Unihuerto/CartelUnihuerto_2022.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="CartelUnihuerto_2022.png">CARTEL</a>
                        </div>-->

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
                            <p align="center">Este curso-taller puede acreditarse como actividad de aprendizaje en
                                    varias Facultades de la UASLP y ofrece constancia de Secretaría Académica.</p>
                            <br>
                            <h4>Lugar, fecha y horario</h4>
                            <ul>
                                <li><span>Horas totales:</span> 32 horas.</li>
                                <li><span>Horas teóricas:</span> 12 horas.</li>
                                <li>Sesiones en Plataforma Teams, presenciales en casa, colonia o Unihuerto UASLP.</li>
                                <li><span>Tarea individual:</span> 8 horas.</li>
                                <li><span>Horas de práctica:</span> 12 horas.</li>
                            </ul>
                            <br>
                            <h4>Módulos</h4>
                            <ul>
                                <li>Módulo I. Desarrollo de huertos, 25 de febrero y 4 de marzo del 2022.</li>
                                <li>Módulo II. Composta en traspatio, 25 de marzo y 1 de abril del 2022.</li>
                                <li>Módulo III. Control biológico, 29 de abril y 6 de mayo del 2022.</li>
                                <li>Módulo IV. Post cosecha, 27 de mayo y 3 de junio del 2022.</li>
                            </ul>
                            <br>
                            <!--<h4>Prerrequisitos</h4>
                            <ul>
                                <li>Contar con disponibilidad de horarios para asistir a las sesiones programadas y
                                    realizar actividades previstas en el programa del curso.</li>
                                <li>Personas con cualquier tipo de perfil, que tengan o no experiencia con producción
                                    agrícola pero que tenga el interés de conocer y adoptar modelos agroecológicos.</li>
                                <li>Tener excelente disposición hacia la comunicación, aprendizaje y colaboración en el
                                    desarrollo del curso, así como de los objetivos planteados.</li>
                                <li>Disposición para asistir y realizar las sesiones prácticas tanto en Unihuerto como
                                    en su hogar o colonia según sea el caso.</li>
                            </ul>
                            <br>-->
                            <h4>Fecha límite de registro</h4>
                            <p>10 de febrero del 2022.</p>
                            <p>Cupo limitado</p>
                            <br>
                            <h4>Inversión</h4>
                            <p>Pago de curso completo (los 4 módulos, 32 horas CON constancia de Secretaría Académica o
                                actividad de aprendizaje):<br>
                            </p>
                            <ul>
                                <li>Participantes que pertenecen a la comunidad universitaria: Estudiantes y
                                    trabajadores de la UASLP, tiene un costo de $500.00 MXN (Quinientos pesos).</li>
                                <li>Participantes externos: Instituciones públicas o privadas, dependencias de gobiernos
                                    y público en general, tiene un costo de $800.00 MXN (Ochocientos pesos).</li>
                            </ul>
                            <!--Pago de un solo módulo (SIN constancia de Secretaría Académica o actividad de aprendizaje):
                            $200 MXN (Doscientos pesos).
                            <p></p>-->
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
                                <li>Recibirá correo de confirmación de inscripción con más detalles del curso.</li>
                            </ol>
                            <p></p>
                            <p><i>Nota importante:</i> Comunidad Universitaria que serán apoyados por sus Dependencias con el
                                pago de inscripción, tienen que hacer el trámite a través de su Administrador con una
                                Orden de Servicio interna. No se emite factura para reembolso.</p>
                            <br>
                            <h4>Formas de pago</h4>
                            <p>Las fichas de pago se pueden pagar directamente en el banco o se pueden hacer transferencias desde el portal de multipagos de la UASLP: <a href="https://www.finanzas.uaslp.mx/Multipagos"> https://www.finanzas.uaslp.mx/Multipagos</a><br><br>
                            * En caso de requerir factura favor de indicarlo y mandar datos fiscales.</p>
                            <br>
                            <h4>Más información</h4>
                            <p><b>Programa Unihuerto</b><br>Agenda Ambiental de la UASLP<br>Universidad Autónoma de San
                                Luis Potosí<br>Manuel Nava No. 201, segundo piso<br>Zona Universitaria, C.P.
                                78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300 Ext. 7210<br><a
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

<div class="modal fade" id="modalUnitrueque" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/Unihuerto/Cartel_Unitrueque2023.png')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'Unihuerto'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                            <!--<a href="http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/_layouts/15/FormServer.aspx?XsnLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegCursoJardineria/forms/template.xsn&OpenIn=browser&SaveLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegCursoJardineria&Source=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegCursoJardineria"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " target="_blank"
                                role="button">REGISTRATE </a>-->

                        </div>
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Unihuerto/Cartel_Unitrueque.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_Unitrueque2023.png">CARTEL</a>

                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'"><br>
                            <h4 align="center">Unitrueque UASLP</h4><br><br>
                            <h4>Introducción</h4>
                            <p>Los mercados de intercambio o trueque datan antes que el dinero, históricamente han representado la base de la economía individual, familiar y de sistemas por muchas generaciones.<br><br>El modelo económico generalizado y principal que llevamos a cabo actualmente se basa en  el dinero y deja muchos recursos subutilizados ya que se centra en un solo objeto, según Jacque Fresco “el dinero es solo una abreviatura del trabajo y los productos” por lo que es importante poder aprovechar de manera más eficiente todos los recursos disponibles, para ello Fresco propone la implementación de una economía basada en recursos, este tipo de modelo económico encuentra similitudes en pensamientos como la permacultura que considera dentro de su dinámica la creación de bancos de tiempo y tiendas de intercambio.<br><br>El modelo conocido como “Economía circular” propone un sistema económico que está estructurado con objetivos de reducción de consumo de recursos formando un ciclo de bucle cerrado enfocado en reciclaje y reuso de recursos tendiendo a minimización de flujos y emisiones (Prieto-Sandoval et al., 2018) es un modelo apropiado para el desarrollo sostenible  en donde se aprovecha con la mayor eficiencia de los recursos pensando en el uso de “residuos” y otros materiales como recursos o “fuentes de riqueza”.<br><br>El trueque contribuye a los Objetivos del Desarrollo Sostenible 1: Fin de la pobreza, 2. Hambre cero, 8: Trabajo decente y crecimiento económico y 12: Producción y consumo responsable; a través de mitigar la contaminación producida por la obsolescencia programada al dar una nueva vida a productos que se consideraría residuos, restaurar el tejido social, ofrecer opciones que garanticen alimentación, calidad de vida y cubrir necesidades.<br><br>En el mundo se están creando cada vez más nuevas formas de economía alternativa, como antecedente la UASLP maneja los “Vales de despensa”. La economía alternativa ayuda a diversificar, dar opciones y crear autonomía.</p><br>
                            <h4>Dirigido a:</h4>
                            <p>Público en general.</p><br>
                            <h4>Objetivo general</h4>
                            <p>Este proyecto busca coadyuvar a satisfacer las necesidades básicas humanas haciendo accesibles materiales o servicios como alternativa al sistema de mercado convencional, así como establecer relaciones de confianza, abrir espacios de reflexión y sensibilizar respecto a la economía y a las formas de consumo.</p><br>
                            <h4>Objetivos específicos</h4>
                            <ul>
                                <li>Generar un espacio regular para el intercambio de recursos.</li>
                                <li>Extender el alcance de programas como: “cambalache de libros”.</li>
                                <li>Ofrecer un espacio de convivencia que ayude a establecer lazos entre la comunidad.</li>
                            </ul><br>
                            <h4>Lugar, fecha y horario</h4>
                                <p>Lugar: Unihuerto en Jardín T, Facultad de Ingeniería<br>Evento presencial con medidas sanitarias.<br>
                                    <div class="col-12">
                                           <img src="{{asset('storage/imagenes/Unihuerto/Mapa_Unihuerto.png')}}" alt="" class="w-100 h-auto" >
                                    </div><br>
                                    Fechas (sábados):
                                    <ul>
                                        <li>12 de febrero del 2022</li>
                                        <li>12 de marzo del 2022</li>
                                        <li>14 de mayo del 2022</li>
                                        <li>11 de junio del 2022</li>
                                    </ul><br>
                                    Horario: 9:00 a 14:00 horas
                                </p><br>
                                <h4>Registro</h4>
                                <p>Pasos para registro de participantes:
                                    <ul>
                                        <li>Llenar correctamente el formulario en línea de registro de esta página web.</li>
                                        <li>Al finalizar y dar clic en el botón enviar, con esta primera etapa del proceso queda INSCRITO.</li>
                                    </ul></p><br>                                
                                <h4>Lineamientos Unitrueque</h4>
                                <p>
                                <ol>
                                    <li>Haber llenado correctamente el registro en la página web.</li>
                                    <li>Llevar y recoger sus elementos o mobiliario propios.</li>
                                    <li>Utilizar recibos de trueque para garantizar intercambios exitosos ( <a href="https://ambiental.uaslp.mx/SGA/PUB/Recibo_UniTrueque.docx">Descargar</a> ).</li>
                                    <li>Intercambiar de manera no monetaria (no dinero) bajo acuerdo entre las partes interesadas productos, materiales y servicios.</li>
                                    <li>No intervenir ni influenciar en otros intercambios, los Unitrueques se acuerdan entre las partes bajo lo que cada persona considere adecuado.</li>
                                    <li>Valorizar tus productos, materiales y servicios previamente al Unitrueque.</li>
                                    <li>Asegurar que los productos o materiales estén en buenas condiciones.</li>
                                    <li>Considerar los principios de consumo responsable como “Repensar que es lo que realmente necesito”.</li>
                                    <li>Realizar los Unitrueques de forma pacífica.</li>
                                    <li>Quien inculpa en los lineamientos ya no puede participar.</li>
                                </ol>
                                </p><br>
                                <h4>Bibliografía</h4>  
                                <p>
                                    <ul>
                                        <li>Fresco, J. (2002). Lo mejor que el dinero no puede comparar, más allá de la política, la pobreza y la guerra. Estados Unidos de América. Venus Fla.</li>
                                        <li>Prieto-Sandoval, V. Jaca C., Ormazabal, M. (2018). Towards a consensus on the circular economy. Journal of Cleaner Production.</li>
                                    </ul>
                                </p><br>  
                                <h4>Más información</h4>
                                <p>Unihuerto de la UASLP<br>Sistema de Gestión Ambiental<br>Agenda Ambiental de la
                                    UASLP<br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava No. 201, segundo
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

<div class="modal fade" id="modalUnitrueque2022" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/Unitrueque/Cartel_Unitrueque2023.png')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'Unihuerto'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                            <!--<a href="http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/_layouts/15/FormServer.aspx?XsnLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegCursoJardineria/forms/template.xsn&OpenIn=browser&SaveLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegCursoJardineria&Source=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegCursoJardineria"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " target="_blank"
                                role="button">REGISTRATE </a>-->

                        </div>
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Unitrueque/Cartel_Unitrueque2023.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_Unitrueque2023.png">CARTEL</a>

                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'"><br>
                            <h4 align="center">Unitrueque UASLP</h4><br><br>
                            <h4>Introducción</h4>
                            <p>Los mercados de intercambio o trueque datan antes que el dinero, históricamente han representado la base de la economía individual, familiar y de sistemas por muchas generaciones.<br><br>El modelo económico generalizado y principal que llevamos a cabo actualmente se basa en  el dinero y deja muchos recursos subutilizados ya que se centra en un solo objeto, según Jacque Fresco “el dinero es solo una abreviatura del trabajo y los productos” por lo que es importante poder aprovechar de manera más eficiente todos los recursos disponibles, para ello Fresco propone la implementación de una economía basada en recursos, este tipo de modelo económico encuentra similitudes en pensamientos como la permacultura que considera dentro de su dinámica la creación de bancos de tiempo y tiendas de intercambio.<br><br>El modelo conocido como “Economía circular” propone un sistema económico que está estructurado con objetivos de reducción de consumo de recursos formando un ciclo de bucle cerrado enfocado en reciclaje y reuso de recursos tendiendo a minimización de flujos y emisiones (Prieto-Sandoval et al., 2018) es un modelo apropiado para el desarrollo sostenible  en donde se aprovecha con la mayor eficiencia de los recursos pensando en el uso de “residuos” y otros materiales como recursos o “fuentes de riqueza”.<br><br>El trueque contribuye a los Objetivos del Desarrollo Sostenible 1: Fin de la pobreza, 2. Hambre cero, 8: Trabajo decente y crecimiento económico y 12: Producción y consumo responsable; a través de mitigar la contaminación producida por la obsolescencia programada al dar una nueva vida a productos que se consideraría residuos, restaurar el tejido social, ofrecer opciones que garanticen alimentación, calidad de vida y cubrir necesidades.<br><br>En el mundo se están creando cada vez más nuevas formas de economía alternativa, como antecedente la UASLP maneja los “Vales de despensa”. La economía alternativa ayuda a diversificar, dar opciones y crear autonomía.</p><br>
                            <h4>Dirigido a:</h4>
                            <p>Público en general.</p><br>
                            <h4>Objetivo general</h4>
                            <p>Este proyecto busca coadyuvar a satisfacer las necesidades básicas humanas haciendo accesibles materiales o servicios como alternativa al sistema de mercado convencional, así como establecer relaciones de confianza, abrir espacios de reflexión y sensibilizar respecto a la economía y a las formas de consumo.</p><br>
                            <h4>Objetivos específicos</h4>
                            <ul>
                                <li>Generar un espacio regular para el intercambio de recursos.</li>
                                <li>Extender el alcance de programas como: “cambalache de libros”.</li>
                                <li>Ofrecer un espacio de convivencia que ayude a establecer lazos entre la comunidad.</li>
                            </ul><br>
                            <h4>Lugar, fecha y horario</h4>
                                <p>Lugar: Unihuerto en Jardín T, Facultad de Ingeniería<br>Evento presencial con medidas sanitarias.<br>
                                    <div class="col-12">
                                           <img src="{{asset('storage/imagenes/Unihuerto/Mapa_Unihuerto.png')}}" alt="" class="w-100 h-auto" >
                                    </div><br>
                                    Fechas (sábados):
                                    <ul>
                                        <li>03 de septiembre del 2022</li>
                                        <li>15 de octubre del 2022</li>
                                        <li>12 de noviembre del 2022</li>
                                        <li>03 de diciembre del 2022</li>
                                    </ul><br>
                                    Horario: 9:00 a 14:00 horas
                                </p><br>
                                <h4>Registro</h4>
                                <p>Pasos para registro de participantes:
                                    <ul>
                                        <li>Llenar correctamente el formulario en línea de registro de esta página web.</li>
                                        <li>Al finalizar y dar clic en el botón enviar, con esta primera etapa del proceso queda INSCRITO.</li>
                                    </ul></p><br>
                                <h4>Lineamientos Unitrueque</h4>
                                <p>
                                <ol>
                                    <li>Haber llenado correctamente el registro en la página web.</li>
                                    <li>Llevar y recoger sus elementos o mobiliario propios.</li>
                                    <li>Utilizar recibos de trueque para garantizar intercambios exitosos ( <a href="https://ambiental.uaslp.mx/SGA/PUB/Recibo_UniTrueque.docx">Descargar</a> ).</li>
                                    <li>Intercambiar de manera no monetaria (no dinero) bajo acuerdo entre las partes interesadas productos, materiales y servicios.</li>
                                    <li>No intervenir ni influenciar en otros intercambios, los Unitrueques se acuerdan entre las partes bajo lo que cada persona considere adecuado.</li>
                                    <li>Valorizar tus productos, materiales y servicios previamente al Unitrueque.</li>
                                    <li>Asegurar que los productos o materiales estén en buenas condiciones.</li>
                                    <li>Considerar los principios de consumo responsable como “Repensar que es lo que realmente necesito”.</li>
                                    <li>Realizar los Unitrueques de forma pacífica.</li>
                                    <li>Quien inculpa en los lineamientos ya no puede participar.</li>
                                </ol>
                                </p><br>
                                <h4>Bibliografía</h4>
                                <p>
                                    <ul>
                                        <li>Fresco, J. (2002). Lo mejor que el dinero no puede comparar, más allá de la política, la pobreza y la guerra. Estados Unidos de América. Venus Fla.</li>
                                        <li>Prieto-Sandoval, V. Jaca C., Ormazabal, M. (2018). Towards a consensus on the circular economy. Journal of Cleaner Production.</li>
                                    </ul>
                                </p><br>
                                <h4>Más información</h4>
                                <p>Unihuerto de la UASLP<br>Sistema de Gestión Ambiental<br>Agenda Ambiental de la
                                    UASLP<br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava No. 201, segundo
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

<div class="modal fade" id="modalTallerHuertoalaMesa" tabindex="-1" role="dialog"
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
                            <img src="{{asset('storage/imagenes/Unihuerto/Cartel_UnihuertoHuasteca.png')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-around justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-3 mx-lg-5 mx-xl-5  mx-md-5 mx-sm-5 mt-2">

                        <!--<div class=" col-6 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'HuertoMesaHuasteca'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                        </div>-->
                        <div class=" col-6 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Unihuerto/Cartel_UnihuertoHuasteca.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_UnihuertoHuasteca.png">CARTEL</a>

                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:15px; padding-top: 3%; font-family: 'Myraid light';'"><br>
                            <h4>Mini Taller: Del Huerto a la mesa<br>Zona Huasteca</h4><br><br>
                            <h4>Justificación</h4>
                            <p>La agricultura orgánica es una herramienta indispensable para lograr diferentes aspectos que promueven el cuidado del medio y un mejor estilo de vida.</p><br>
                            <h4>Objetivo general</h4>
                            <p>Promover la sana alimentación y su fácil acceso a través de la agricultura orgánica de pequeña escala.</p><br>
                            <h4>Objetivos específicos</h4>
                            <p><ul>
                                <li>Sensibilizar respecto a la problemática ambiental y la importancia de la agricultura sostenible.</li>
                                <li>Informar respecto a las características básicas para la implementación y el desarrollo de un huerto urbano.</li>
                                <li>Relacionar la agricultura con la alimentación y su importancia para la salud humana y la salud pública.</li>
                                <li>Orientar respecto a la nutrición y su acceso.</li>
                                </ul>
                            </p><br>
                            <h4>Dirigido a</h4>
                            <p>Todos la comunidad UASLP, alumnos, trabajadores, docentes, investigadores, administrativos y público en general.</p><br>
                            <h4>Descripción</h4>
                            <p>Curso-taller teórico práctico donde se revisará:<br>
                                <ul>
                                    <li>La problemática ambiental en la producción de alimentos y agricultura urbana como alternativa de producción de alimentos para autoconsumo.</li>
                                    <li>La introducción a la planificación del huerto, fenología básica de las plantas y las labores generales de cultivo.</li>
                                    <li>Importancia y conceptos de la nutrición, beneficios de los alimentos e impacto en la salud.</li>
                                    <li>La universidad como ambiente obesogénico y recomendaciones de platillos saludables y fáciles.</li>
                                </ul>
                            </p><br>
                            <h4>Horario</h4>
                            <p>10:00 a 14:00 horas</p><br>
                            <h4>Lugar</h4>
                            <p><ul>
                                    <li>Teoría: Sala de usos múltiples</li>
                                    <li>Práctica: Unihuerto de Unidad Académica Multidisciplinaria Zona Huasteca (atrás de edificio de gimnasio)</li>
                                </ul>
                            </p><br>                                   
                            <p align="center">SIN COSTO</p><br>
                            
                            <h4>Registro</h4>
                                <p>Pasos para registro de participantes: 
                                </p>
                                <ol>
                                    <li>Llenar correctamente el formulario en línea de registro de esta página web.</li>
                                    <li>Al finalizar y dar clic en el botón enviar, queda PRE-INSCRITO.</li>
                                    <li>Se envía un correo en un lapso de 48 horas confirmando su asistencia.</li>  
                                </ol>
                                <br>
                                <p>CUPO LIMITADO</p><br>
                                <h4>Informes</h4>
                                <p><b>Agenda Ambiental de la UASLP</b><br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava No. 201, segundo
                                    piso<br>Zona Universitaria, C.P. 78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300
                                    Ext. 7210<br>
                                    <a href="mailto:unihuerto@uaslp.mx">unihuerto@uaslp.mx</a>
                                </p>
                                <p><b>Unisalud</b><br>Servicios Estudiantiles<br>Universidad Autónoma de San Luis Potosí<br>Tel. 826-2300 Ext. 5556<br><a href="mailto:unisalud@uaslp.mx">unisalud@uaslp.mx</a></p>
                                <p><b>Unidad Ambiental Zona Huasteca</b><br><a href="mailto:oscar.malibran@uaslp.mx">oscar.malibran@uaslp.mx</a></p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="modalPermacultura" tabindex="-1" role="dialog"
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
                            <img src="{{asset('storage/imagenes/Unihuerto/Cartel_Int_permacultura.jpg')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-around justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-3 mx-lg-5 mx-xl-5  mx-md-5 mx-sm-5 mt-2">

                        <!--<div class=" col-6 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'HuertoMesaHuasteca'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                        </div>-->
                        <div class=" col-6 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Unihuerto/Cartel_Int_permacultura.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_Int_permacultura.jpg">CARTEL</a>

                        </div>
                    </div>
                    {{--<div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:15px; padding-top: 3%; font-family: 'Myraid light';'"><br>
                            <h4>Mini Taller: Del Huerto a la mesa<br>Zona Huasteca</h4><br><br>
                            <h4>Justificación</h4>
                            <p>La agricultura orgánica es una herramienta indispensable para lograr diferentes aspectos que promueven el cuidado del medio y un mejor estilo de vida.</p><br>
                            <h4>Objetivo general</h4>
                            <p>Promover la sana alimentación y su fácil acceso a través de la agricultura orgánica de pequeña escala.</p><br>
                            <h4>Objetivos específicos</h4>
                            <p><ul>
                                <li>Sensibilizar respecto a la problemática ambiental y la importancia de la agricultura sostenible.</li>
                                <li>Informar respecto a las características básicas para la implementación y el desarrollo de un huerto urbano.</li>
                                <li>Relacionar la agricultura con la alimentación y su importancia para la salud humana y la salud pública.</li>
                                <li>Orientar respecto a la nutrición y su acceso.</li>
                                </ul>
                            </p><br>
                            <h4>Dirigido a</h4>
                            <p>Todos la comunidad UASLP, alumnos, trabajadores, docentes, investigadores, administrativos y público en general.</p><br>
                            <h4>Descripción</h4>
                            <p>Curso-taller teórico práctico donde se revisará:<br>
                                <ul>
                                    <li>La problemática ambiental en la producción de alimentos y agricultura urbana como alternativa de producción de alimentos para autoconsumo.</li>
                                    <li>La introducción a la planificación del huerto, fenología básica de las plantas y las labores generales de cultivo.</li>
                                    <li>Importancia y conceptos de la nutrición, beneficios de los alimentos e impacto en la salud.</li>
                                    <li>La universidad como ambiente obesogénico y recomendaciones de platillos saludables y fáciles.</li>
                                </ul>
                            </p><br>
                            <h4>Horario</h4>
                            <p>10:00 a 14:00 horas</p><br>
                            <h4>Lugar</h4>
                            <p><ul>
                                    <li>Teoría: Sala de usos múltiples</li>
                                    <li>Práctica: Unihuerto de Unidad Académica Multidisciplinaria Zona Huasteca (atrás de edificio de gimnasio)</li>
                                </ul>
                            </p><br>
                            <p align="center">SIN COSTO</p><br>

                            <h4>Registro</h4>
                                <p>Pasos para registro de participantes:
                                </p>
                                <ol>
                                    <li>Llenar correctamente el formulario en línea de registro de esta página web.</li>
                                    <li>Al finalizar y dar clic en el botón enviar, queda PRE-INSCRITO.</li>
                                    <li>Se envía un correo en un lapso de 48 horas confirmando su asistencia.</li>
                                </ol>
                                <br>
                                <p>CUPO LIMITADO</p><br>
                                <h4>Informes</h4>
                                <p><b>Agenda Ambiental de la UASLP</b><br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava No. 201, segundo
                                    piso<br>Zona Universitaria, C.P. 78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300
                                    Ext. 7210<br>
                                    <a href="mailto:unihuerto@uaslp.mx">unihuerto@uaslp.mx</a>
                                </p>
                                <p><b>Unisalud</b><br>Servicios Estudiantiles<br>Universidad Autónoma de San Luis Potosí<br>Tel. 826-2300 Ext. 5556<br><a href="mailto:unisalud@uaslp.mx">unisalud@uaslp.mx</a></p>
                                <p><b>Unidad Ambiental Zona Huasteca</b><br><a href="mailto:oscar.malibran@uaslp.mx">oscar.malibran@uaslp.mx</a></p>
                        </div>
                    </div>
                </div>

            </div>--}}

        </div>
    </div>
</div>
<!--<div class="modal fade" id="modalTallerAgricultura" tabindex="-1" role="dialog"
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
                            <img src="{{asset('storage/imagenes/Unihuerto/Cartero-Unihuerto.png')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-around justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-3 mx-lg-5 mx-xl-5  mx-md-5 mx-sm-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'Agricultura'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                        </div>
                        <div class=" col-6 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Unihuerto/Cartero-Unihuerto.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="CARTEL-FUNGICULTURA.jpg">CARTEL GENERAL </a>

                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:15px; padding-top: 3%; font-family: 'Myraid light';'"><br>
                            <h4>Taller: Agricultura urbana ¿Qué? ¿Cuándo? ¿Cómo? ¿Por qué?</h4><br>
                            <!--
                            <h4>Dirigido a</h4>
                            <p>Estudiantes UASLP y público general.</p><br>
                            -->
                            <!--<h4>Dirigido a:</h4>
                            Público en general<br><br>
                            <h4>Objetivo:</h4>
                            Informar y sensibilizar sobre agricultura orgánica básica<br><br>
                            <h4>Lugar, fecha y horario</h4>
                                <b>Fecha:&nbsp;</b> sábado 30 de octubre del 2021 o sábado 27 de noviembre del 2021 <br>
                                <b>Hora: &nbsp;</b> 9:00 a 14:00 horas <br>
                                  
                                 
                                  


                                   <b>Lugar: &nbsp;</b>Unihuerto en Unitecho, Facultad de Ingeniería<br>
                                   <div class="row my-3">
                                       <div class="col-12">
                                           <img src="{{asset('storage/imagenes/Unihuerto/Mapa_Unitecho.png')}}" alt="" class="w-100 h-auto" >
                                       </div>
                                   </div>
                                   <h4>Ponente:</h4>
                                   Equipo Unihuerto
                                   <br><br>
                                   
                                 

                                    
                                   <h4>Programa</h4>
                                   <ol>
                                    <li>Alimentación sostenible.</li>
                                    <li>Soberanía y seguridad alimentaria.</li>
                                    <li>Método biointesivo. </li>
                                    <li>Fitotecnia básica. </li>
                                    <li>Diseño e implementación de huertos. </li>
                                   
                                    </ol>
                                   <br>
                                    <h4 class="font-weight-bold text-center mt-2 text-light"> <b>Cupo limitado de acuerdo a medidas Covid</b> </h4>
                                    <h4 class="font-weight-bold text-center mt-2 text-light"> <b>Costo: $150</b> </h4><br>
                                    <b>Fecha límite para pre-registro: &nbsp;</b>
                                    <ul>
                                        <li> 29 octubre del 2021 a las 12:00 horas</li>
                                        <li>26 de noviembre del 2021 a las 12:00 horas</li>
                                    </ul>
                                    <br>
                                   
                                </b>
                            
                          
                                <h4>Registro</h4>
                                <p > <b>Pasos para registro de participantes:</b> 
                                </p>
                               <p>
                               
                                Si aún no perteneces a la comunidad de Agenda Ambiental  da clic en el botón “registro” llena el formulario para pertenecer a la comunidad , te llegará un correo de verificación,
                                el cual deberás validar y una vez en Mi portal da clic en el banner del taller y complementa el registro. <br>
                                Si ya perteneces a la comunidad de Agenda Ambiental, ingresa  <a href="https://ambiental.uaslp.mx/login?Nuevo=0" id="link">Mi portal</a> y llena el registro del taller.<br>
                                Después de llenar este formulario quedarás preinscrito al curso, recibirás un correo de confirmación y despues de 48 horas se te enviará tu ficha de pago vía correo electrónico.
                                Para entrar nuevamente a la plataforma solo tendrás que dar clic en “Mi Portal” desde 
                                <a href="https://ambiental.uaslp.mx" id="link">https://ambiental.uaslp.mx</a>
                                
                                
                               </p>
                                <br>
                                <h4>Formas de pago</h4>
                               <p>
                                Las fichas de pago se pueden pagar directamente en el banco o se pueden hacer transferencias desde el portal de multipagos de la UASLP: 
                                <a href=" https://www.finanzas.uaslp.mx/Multipagos"id="link" target="_blank" rel="noopener noreferrer"> https://www.finanzas.uaslp.mx/Multipagos</a>
                               
                               </p>
                               <p>* &nbsp;En caso de requerir factura favor de indicarlo y mandar datos fiscales.</p>
                                <h4>Informes</h4>
                                <p><b>Programa Unihuerto<br>Agenda Ambiental de la
                                    UASLP</b> <br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava No. 201, segundo
                                    piso<br>Zona Universitaria, C.P. 78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300
                                    Ext. 7210<br>
                                    <a href="mailto:unihuerto@uaslp.mx"id="link">unihuerto@uaslp.mx</a>
                                </p>
                            </b>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>-->
<script>
    console.log({{$NombreM}});
    $('#{{$NombreM}}').modal('show')
</script>
@endsection
@push('stylesheets')
<link href="{{ asset('css/nav-tabs_contenido.css') }}" rel="stylesheet" type="text/css">
@endpush