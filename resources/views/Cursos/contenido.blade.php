@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-4 justify-content-center my-2">
    <img src="{{ asset('storage/imagenes/Logos/CursosActualizacion.png') }}"
        class="rounded mx-auto d-block w-50 py-xl-5 py-md-5 align-middle" alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-8">
    <p class="text-justify pSize pt-3 pt-xl-3 pt-lg-3  pt-md-0 my-5">
        Son programas de actualización profesional, formación general o especializada en temas ambientales. Se dirige hacia la capacitación para el manejo de los instrumentos de gestión ambiental (evaluación de impacto ambiental, planeación y ordenamientos ecológicos, manejo de áreas naturales protegidas), normativas vigentes o conceptos, metodologías y técnicas de educación ambiental.
        <br><br>

        Esta modalidad ofrece oportunidades flexibles, diversificadas y de gran calidad a personas adultas que desean o requieren profundizar o extender su conocimiento hacia áreas complementarias para su desarrollo profesional, o que quieren conocer las últimas tendencias relacionadas con la sostenibilidad.
        <br><br>

</div>
@endsection

@section('BannerBotones')
<div class="row justify-content-center justify-content-xl-between justify-content-lg-between justify-content-md-between justify-content-sm-between">
    <div class="col-4 ">
        <img src="{{asset('storage/imagenes/Cursos/B_RE.png')}}" class="img-fluid" alt="" srcset="">
    </div>
    <div class="col-4 ">    
        <img src="{{asset('storage/imagenes/Cursos/B_REI.png')}}" class="img-fluid" alt="" srcset="">
    </div>
    <div class="col-4 ">        
        <img src="{{asset('storage/imagenes/Cursos/B_SC.png')}}" class="img-fluid" alt="" srcset="">
    </div>

</div>

@endsection


<!--@section('Modales')
<div class="modal fade" id="modalCursoProserem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/Proserem/Cartel_Laboratorios.jpg')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Proserem/Cartel_Laboratorios.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_laboratorios.jpg">CARTEL GENERAL </a>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'"><br><br>
                            <h4>Responsabilidad integral en laboratorios y talleres
                            </h4><br><br>
                            <div class="elementor-text-editor elementor-clearfix">
                                <div style="font-size: 14px; font-family: 'Myraid light';">
                                    <h3 style="color: #5c94d7;">Dirigido a</h3>
                                    <p>Responsables y técnicos de laboratorios y talleres UASLP, miembros de comisiones
                                        de seguridad e higiene y público interesado.</p><br>
                                    <h3 style="color: #5c94d7;">Modalidad</h3>
                                    <p>Curso-taller modalidad blended-learning.</p><br>
                                    <h3 style="color: #5c94d7;">Objetivo</h3>
                                    <p>Capacitar y desarrollar las habilidades y competencias necesarias en los
                                        responsables e involucrados en los laboratorios y talleres principalmente de la
                                        UASLP para lograr un mejor manejo de las sustancias y materiales regulados de
                                        acuerdo al Programa Universitario de Residuos.</p><br>
                                    <h3 style="color: #5c94d7;">Objetivos específicos</h3>
                                    <ul>
                                        <li>Actualizar y adquirir conocimientos y conceptos en temas de residuos
                                            peligrosos.</li>
                                        <li>Sensibilizar sobre la importancia y ciclo de vida de las sustancias y
                                            materiales que utilizan en sus espacios de trabajo.</li>
                                        <li>Capacitar en el manejo de los materiales y sustancias peligrosas conforme a
                                            la legislación vigente.</li>
                                        <li>Enseñar y poner en práctica las técnicas de prevención y tratamiento
                                            necesarias para disminuir los residuos generados y promover una cultura de
                                            seguridad e higiene como la práctica a microescala.</li>
                                        <li>Proporcionar las herramientas para detectar los riesgos, contingencias e
                                            irregularidades en los diferentes espacios y saber actuar y recomendar lo
                                            indicado en cada caso; tomando en cuenta los requerimientos de señalización
                                            y señalética.</li>
                                        <li>Crear y mejorar la comunicación interna entre laboratorios y talleres
                                            universitarios con Agenda Ambiental y Comisiones Mixtas de Seguridad e
                                            Higiene y Protección Civil para mejorar el manejo de las Sustancias y
                                            Materiales Regulados.</li>
                                    </ul><br>
                                    <h3 style="color: #5c94d7;">Lugar, fechas y horarios</h3>
                                    <p>Sesiones en plataforma Teams, los jueves en horario de 15:00 a 19:00 horas, los
                                        días:<br>
                                    </p>
                                    <ul>
                                        <li>13, 20 y 27 de mayo del 2021</li>
                                        <li>3, 17 y 24 de junio del 2021</li>
                                        <li>1 de julio del 2021</li>
                                        <li>12 de agosro del 2021</li>
                                    </ul>
                                    <p></p>
                                    <p>Sesiones presenciales para prácticas en el laboratorio programadas en grupos de 6
                                        personas, según medidas sanitarias vigentes.</p><br>
                                    <h3 style="color: #5c94d7;">Requisitos</h3>
                                    <p>
                                    </p>
                                    <ul>
                                        <li>Contar con disponibilidad de horarios para atender las sesiones programadas
                                            y realizar las actividades del curso.</li>
                                        <li>Ver video tutorial sobre el uso de la plataforma Teams.</li>
                                        <li>Tener conocimientos en química general.</li>
                                        <li>Trabajar actualmente en laboratorios y talleres universitarios.</li>
                                        <li>Experiencia o actividad previa en tema de sustancias y materiales reguladas.
                                        </li>
                                        <li>Tener excelente disposición hacia la comunicación, aprendizaje y
                                            colaboración en el desarrollo del curso, así como de los objetivos
                                            planteados.</li>
                                        <li>Interés en implementar el manejo apropiado de las sustancias y materiales
                                            regulados en sus laboratorios o talleres.</li>
                                    </ul>
                                    <p></p><br>
                                    <h3 style="color: #5c94d7;">Instructores</h3>
                                    <p></p>
                                    <ul>
                                        <li>M.C. María del Carmen Barrón Cruz</li>
                                        <li>M.C. Aide del Carmen Cruces Ríos</li>
                                        <li>Dr. Rodolfo González Chávez</li>
                                        <li>Dra. Leticia Yánez Estrada</li>
                                        <li>Dra. Sonia Judith Ramírez Guevara</li>
                                        <li>Ing. Laura Daniela Hernández Rodríguez</li>
                                    </ul>
                                    <p></p><br>
                                    <h3 style="color: #5c94d7;">Programa</h3>
                                    <p></p>
                                    <ul>
                                        <li><b>Sesión 1.</b> Introducción conceptual y contextual</li>
                                        <li><b>Sesión 2.</b> Marco Legal de Residuos</li>
                                        <li><b>Sesión 3.</b> Seguridad y riesgos</li>
                                        <li><b>Sesión 4 y 5.</b> Plan de manejo, prevención y señalización</li>
                                        <li><b>Sesión 6.</b> Sistemas de control</li>
                                        <li><b>Sesión 7.</b> Daños a la salud</li>
                                        <li><b>Sesión 8 y 9.</b> Prácticas y tratamientos y autoevaluación</li>
                                    </ul>
                                    <p></p><br>
                                    <h3 style="color: #5c94d7;">Registro</h3>
                                    <p>Pasos para registro de participantes:<br>
                                    </p>
                                    <ol>
                                        <li>Llenar correctamente el formulario en línea de registro de esta página web.
                                        </li>
                                        <li>Al finalizar y dar clic en el botón enviar, con esta primera etapa del
                                            proceso queda PRE-INSCRITO.</li>
                                        <li>A más tardar en 24 horas recibirá un correo electrónico con la ficha de pago
                                            (a partir del 13 de abril), así como las indicaciones del proceso de pago o
                                            el descuento por nómina. La ficha o vale que le enviemos, tendrá una
                                            vigencia de únicamente dos días para ser pagada, de lo contrario se
                                            cancelará.</li>
                                        <li>Como último paso obligatorio para su INSCRIPCIÓN oficial debe enviar su
                                            comprobante de pago por correo electrónico a <a
                                                href="mailto:proserem@uaslp.mx"
                                                style="color: #5c94d7">proserem@uaslp.mx</a></li>
                                    </ol>
                                    Cupo límite: 30 personas
                                    <p></p><br>
                                    <h3 style="color: #5c94d7;">Formas de pago</h3>
                                    <p></p>
                                    <ul>
                                        <li>Las fichas de pago se pueden pagar directamente en el banco o se pueden
                                            hacer transferencias desde el portal de multipagos de la UASLP: <a
                                                href="https://www.finanzas.uaslp.mx/Multipagos"
                                                style="color: #5c94d7">https://www.finanzas.uaslp.mx/Multipagos</a></li>
                                        <li>Los pagos por nómina se realizan al firmar el vale que le haremos llegar por
                                            correo y se debe llevar firmado a las instalaciones de la Agenda Ambiental
                                            en el horario asignado o enviarlo firmado en pdf al correo <a
                                                href="proserem@uaslp.mx" style="color: #5c94d7">proserem@uaslp.mx</a>
                                        </li>
                                    </ul>
                                    <p></p><br>
                                    <p><b>Fecha límite para pre-registro:</b> 29 abril del 2021 a las 12:00
                                        horas<br><b>Fecha límite para pago:</b> 6 de mayo del 2021 a las 16:00 horas.
                                    </p><br>
                                    <h4 style="color: #5c94d7;">Más Información</h4>
                                    <p style="font-size: 14px !important;"><b>Programa Universitario de
                                            Residuos</b><br>Sistema de Gestión Ambiental<br>Agenda Ambiental de la
                                        UASLP<br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava No. 201, segundo
                                        piso<br>Zona Universitaria, C.P. 78210<br>San Luis Potosí, S.L.P.<br>Tel.
                                        826-2300 Ext. 7215<br><a href="mailto:proserem@uaslp.mx"
                                            style="color: #5c94d7">proserem@uaslp.mx</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection-->


@push('stylesheets')
<link href="{{ asset('css/nav-tabs_contenido.css') }}" rel="stylesheet" type="text/css">
@endpush