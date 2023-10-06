@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-4 justify-content-center my-1 pt-0">
    <img src="{{ asset('storage/imagenes/Logos/Logo_UASLPSostenible.png') }}"
        class="rounded mx-auto d-block w-75 py-xl-4 py-md-5" alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-8">
    <p class="text-justify pSize pt-5 pt-xl-4 pt-lg-3  pt-md-0">
        <br><br>La <b>Agenda Ambiental</b> está celebrando su <b>25 aniversario</b> y en el marco del <b>Centenario de la Autonomía Universitaria</b>, daremos inicio a un evento que será la pauta para que cada año hagamos una revisión de los avances que la UASLP tiene en materia de sostenibilidad.<br><br>
        Para tal fin, hemos organizado la Primera semana #UASLPSostenible que tiene por objetivo sensibilizar a la comunidad universitaria sobre la importancia de la sostenibilidad en las actividades sustantivas de la Universidad. A través de actividades diversas se busca promover acciones concretas que 
        redunden en un compromiso más sólido de la comunidad universitaria para el cuidado de nuestro planeta. Asimismo, se busca resaltar el trabajo colaborativo entre instituciones académicas, gubernamentales y sociales, para lograr los objetivos, con un impacto de mayor trascendencia y alcance.
</div>
@endsection

@section('BannerBotones')
<div class="row justify-content-md-center  mx-auto">
    <div class="col-auto  ">
        <img src="{{asset('storage/imagenes/Eventos/B_SemanaSostenible.png')}}" class="img-fluid " alt=""
            srcset="">
    </div>

</div>



<div class="mt-1 col-md-12 col-sm-12 p-0">
    <div class="nav nav-tabs justify-content-around my-1">
        <a class="nav-link w-25 p-1 pt-2 m-0 py-2" data-toggle="modal" data-target="#Lunes" role="tab"
            aria-controls="nav-home" aria-selected="true" style="font-size:14px; "> Lunes 9 de octubre</a>

        <a class="nav-link w-25 p-1 pt-2 m-0 py-2" data-toggle="modal"  style="font-size:14px; " data-target="#Martes" role="tab" aria-controls="nav-profile"
            aria-selected="false">  Martes 10 de octubre</a>

            <a class="nav-link w-25 p-1 pt-2 m-0 py-2" data-toggle="modal"  style="font-size:14px; " data-target="#Miercoles" role="tab" aria-controls="nav-profile"
            aria-selected="false">   Miércoles 11 de octubre</a>
           
            <a class="nav-link w-25 p-1 pt-2 m-0 py-2 " data-toggle="modal"  style="font-size:14px; " data-target="#Jueves" role="tab" aria-controls="nav-profile"
            aria-selected="false">   Jueves 12 de octubre </a>
           
            <a class="nav-link w-25 p-1 pt-2 m-0 py-2" data-toggle="modal"  style="font-size:14px; " data-target="#Viernes" role="tab" aria-controls="nav-profile"
            aria-selected="false">   Viernes 13 de octubre</a>
           
    </div>
</div>

@endsection

@section('ObjetivosTexto')
<div class="pSize text-justify mt-5">
    <h3 style="color: #5c94d7;">Registro</h3>
    <p style="text-align: justify;">Los interesados en participar en las actividades de la Primera semana #UASLPSostenible, favor de <a href="http://a.uaslp.mx/Sostenible"">registrarse</a><br>
    Para participar en el Foro "Presa de San José", deberá llenar el siguiente <a href="{{route('Bienvenida')}}">registro</a>.
    </p><br>
    <h3 style="color: #5c94d7;">Colaboraciones</h3>
    <p style="font-size: 14px !important;"><strong>Agenda Ambiental de la UASLP</strong><br><a
            href="mailto:agenda.ambiental@uaslp.mx">agenda.ambiental@uaslp.mx</a></p>
    <p><strong>División de Servicios Estudiantiles</strong><br><a
            href="mailto:servicios.estudiantiles@uaslp.mx">servicios.estudiantiles@uaslp.mx</a></p>
    <p><strong>Unisalud</strong><br><a href="mailto:unisalud@uaslp.mx">unisalud@uaslp.mx</a></p>
    <p><strong>División de Difusión Cultural<br></strong><a
            href="mailto:difusion.cultural@uaslp.mx">difusion.cultural@uaslp.mx</a></p>
</div>
@endsection

@section('Modales')
<div class="modal fade" id="Lunes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/Eventos/B_9Oct.png')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <!--<div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-between justify-content-xl-between mx-5 mt-2">
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="https://www.youtube.com/watch?v=Pva3mXR6NvM" target="blank">
                                <img src="{{ asset('storage/imagenes/Logos/Youtube.png') }}" alt="">
                            </a>
                        </div>
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes//Eventos/B_9Oct.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_Conferencias.jpg">CARTEL</a>
                        </div>
                    </div>-->
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; text-align: justify; font-family: 'Myraid light';'">
                            <p></p>
                            <h4><strong>Programa de actividades<br>LUNES 9 DE OCTUBRE DE 2023</strong>
                            </h4><br>
                            <p></p>
                            <ul>
                            <li><h5 style="color:white">Exposición de carteles PMPCA e IMaREC</h5>
                            <p>Horario: 9:00 - 12:00<br>
                            Lugar: Corredor Aula Magna | Facultad de Ingeniería</p>
                            <p></p><br></li>
                            <li><h5 style="color:white">Cambalache de libros<br>Demostración de actividades Museo Laberinto de las Ciencias y las Artes</h5>
                            <p>Horario: 9:00 - 12:00<br>
                            Lugar: Corredor Aula Magna | Facultad de Ingeniería</p>
                            <p></p><br></li>
                            <li><h5 style="color:white">Taller Biciescuelas</h5>
                            <p>Horario: 10:00 - 11:00<br>Instructor: Luis Enrique Mejía Estrada<br>
                            Lugar: Corredor Aula Magna | Facultad de Ingeniería</p>
                            <p></p><br></li>
                            <li><h5 style="color:white">Slow Race</h5>
                            <p>Horario: 11:00 - 12:30<br>
                            Lugar: Corredor Aula Magna | Facultad de Ingeniería</p>
                            <p></p><br></li>
                            <li><h5 style="color:white">Premiación carteles</h5>
                            <p>Horario: 12:30 - 13:00<br>
                            Lugar: Corredor Aula Magna | Facultad de Ingeniería</p>
                            <p></p><br></li>
                            <li><h5 style="color:white">Panel "Alianzas académicas y ODS"</h5>
                            <p>Horario: 13:10 - 14:30<br>
                            Lugar: Auditorio | Facultad de Ingeniería<br>
                            Moderador: Dra. Lizy Navarro Zamora, Profesora-Investigadora Facultad de Ciencias de la Comunicación<br><br>
                            Panelistas:
                            <ul>
                                <li>Dra. Anuschka van ´t Hooft<br>Coordinadora Académica del PMCPA</li><br>
                                <li>Dr. Carlos Renato Ramos Palacios<br>Coordinador Académico de IMaREC</li><br>
                                <li>Dra. María Cecilia Costero Garbarino<br>Coordinadora de la Licenciatura en Relaciones Internacionales y Profesora investigadora del Programa de Estudios Políticos e Internaciones | COLSAN</li><br>
                                <li>Dra. Elisabeth Huber Sannwald<br>Jefa de la División de Ciencias Ambientales | IPICYT</li><br>
                            </ul></p>
                            
                            <p></p><br></li>                                                                                                                

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="Martes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/Eventos/B_10Oct.png')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                    class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Eventos/Programa_Foro.png')}}" class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button" download="Programa_Foro.png">PROGRAMA</a>
                            </a>
                        </div>
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{route('Bienvenida')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button">REGISTRO</a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; text-align: justify; font-family: 'Myraid light';'">
                            <h4><strong>Programa de actividades<br>MARTES 10 DE OCTUBRE DE 2023</strong>
                            </h4><br>
                            <ul>
                                <li><h5 style="color:white">Date un respiro</h5>
                                    <p>Horario: 9:00 - 9:30<br>Instructora: Dra. Blanca Patricia Salazar Chávez, Docente Facultad de Contaduría y Administración UASLP<br>
                                    Lugar: Unitecho<br>
                                </p>
                                <p></p><br></li>
                                <li><h5 style="color:white">Taller pesticidas naturales</h5>
                                    <p>Horario: 9:45 - 11:00<br>Instructor: MPA. Emmanuel Martínez Castro, Docente Facultad de Agronomía y Veterianaria<br>
                                    Lugar: Unitecho</p>
                                    <p></p><br></li>
                                <li><h5 style="color:white">Foro "Presa San José"</h5>
                                    <p>Horario: 9:00 - 15:00<br>
                                    Lugar: Auditorio Centro de Emprendiento e Innovación Potosino<br><a href="{{route('Bienvenida')}}"><b>Registro previo</b></a></p>
                                    <p>
                                        Ponentes Perspectiva de la problemática<br>
                                        Moderador: Dr. Guillermo Javier Castro Larragoitia
                                        <ul>
                                            <li>Dr. Cristóbal Aldama Aguilera &nbsp; | &nbsp;  UASLP</li>
                                            <li>Dr. Ernesto Iván Badano &nbsp;  | &nbsp;  IPICyT</li>
                                            <li>Dr. Clemente Rodíguez Cuevas &nbsp;  | &nbsp;  UASLP</li><br>
                                        </ul>
                                        Ponentes Perspectivas de Manejo y Solución<br>
                                        Moderadora: Dra. Paola Elizabeth Díaz Flores
                                        <ul>
                                            <li>Dra. Anne M. Hansen Hasen &nbsp; | &nbsp; IMTA </li>
                                            <li>Dr. Raúl Ocampo Pérez &nbsp; | &nbsp; UASLP</li>
                                            <li>Dr. Nahúm Andrés Medellín Castillo &nbsp; | &nbsp; UASLP</li><br>
                                        </ul>
                                        Mesa de diálogo Presa San José<br>
                                        Moderador: Dra. Ma. Catalina Alfaro de la Torre
                                        <ul>
                                            <li>Arq. Javier Ernesto Flores Navarro &nbsp; | &nbsp; IMPLAN</li> 
                                            <li>Dr. Rodolfo Cisneros Almazán &nbsp; | &nbsp; UASLP</li>
                                            <li>Dr. Francisco Javier Peña de Paz &nbsp; | &nbsp; COLSAN</li>
                                            <li>Dr. Braulio Gutiérrez Medina &nbsp; | &nbsp; IPICyT</li> 
                                            <li>Ing. Joel Félix Díaz &nbsp; | &nbsp; CONAGUA</li>
                                    </p>
                                    <p></p><br></li>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="Miercoles" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/Eventos/B_11Oct.png')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <!--<div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/CicloConferencias/Cartel_Conferencias.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="TALLERES.jpg">CARTEL GENERAL </a>
                        </div>-->

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; text-align: justify; font-family: 'Myraid light';'">
                            <h4><strong>Programa de actividades<br>MIERCOLES 11 DE OCTUBRE DE 2023</strong>
                            </h4><br>
                            <p></p>
                            <ul>
                            <li><h5 style="color:white">Date un respiro</h5>
                            <p>Horario: 9:00 - 9:30<br>Instructora: Laura Daniela Hernández Rodríguez<br>
                            Unitecho</p>
                            <p></p><br></li>
                            <li><h5 style="color:white">Taller clasificación RSU y composta</h5>
                            <p>Horario: 10:00 - 12:00<br>Instructor: Mtro. Raúl Jiménez Guerrero<br>
                            Lugar: Unitecho</p>
                            <p></p><br></li>
                            <li><h5 style="color:white">Conferencia Información Estadística y Geográfica para un ambiente sostenible</h5>
                            <p>Horario: 10:00 - 11:00<br>
                            Lugar: Aula Magna | Facultad de Ingeniería<br><br>
                            Ponente: Ing. Geomático Rafael Gaytán Martínez &nbsp; | &nbsp; INEGI</p>
                            <p></p><br></li>
                            <li><h5 style="color:white">Panel "Cultura y desarrollo sostenible: un potencial aún sin explorar"</h5>
                            <p>Horario: 11:30 - 13:00<br>Lugar: Aula Magna | Facultad de Ingeniería<br><br>Moderador: Jonathan Ignacio Gamboa Herrera &nbsp; | &nbsp; UASLP<br><br>
                            Panelistas:<br>
                            <ul>
                                <li>Nadia B. Garza Ramírez &nbsp; | &nbsp; Museo de Arte Contemporáneo</li>
                                <li>Lic. Enrique Alfonso Obregón &nbsp; | &nbsp; Ecomuseo Parque Tangamanga</li>
                                <li>Ivonne Neusete Argaez Tenorio &nbsp; | &nbsp; Museo Federico Silva</li>
                                <li>L.C.C. Cynthia Valle Meade &nbsp; | &nbsp; UASLP</li>
                            </p>                                                                                                             

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="Jueves" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/Eventos/B_12Oct.png')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <!--<div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/CicloConferencias/Cartel_Conferencias.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_Conferencias.jpg">CARTEL GENERAL </a>
                        </div>

                    </div>-->
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                            <h4><strong>Programa de actividades<br>JUEVES 12 DE OCTUBRE DE 2023</strong>
                            </h4><br>
                            <p></p>
                            <ul>
                            <li><h5 style="color:white">Ceremonia 25 años Agenda Ambiental</h5>
                            <p>Horario: 9:30 - 10:20<br>
                            Auditorio | Facultad de Ingeniería</p>
                            <p></p><br></li>
                            <li><h5 style="color:white">Cátedra Pedro Medellín Milán</h5>
                            <p>Horario: 10:30 - 11:30<br>
                            Lugar: Auditorio | Facultad de Ingeniería</p>
                            <p>Conferencia magistral:<br>
                            Dr. Fernando Díaz-Barriga Martínez &nbsp; | &nbsp; Facultad de Medicina/CIACyT</p>
                            <p></p><br></li>
                            <li><h5 style="color:white">Cátedra Pedro Medellín Milán</h5>
                            <p>Horario: 12:00 - 13:00<br>
                            Lugar: Auditorio | Facultad de Ingeniería<br><br>
                            <p>Conferencia magistral:<br>
                            Dra. Elisabeth Huber Sannwald &nbsp; | &nbsp; IPICYT</p>
                            <p></p><br></li> 
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="Viernes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/Eventos/B_13Oct.jpg')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <!--<div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/CicloConferencias/Cartel_Conferencias.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_Conferencias.jpg">CARTEL GENERAL </a>
                        </div>

                    </div>-->
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                            <h4><strong>Programa de actividades<br>VIERNES 13 DE OCTUBRE DE 2023</strong>
                            </h4><br>
                            <p></p>
                            <ul>
                            <li><h5 style="color:white">Presentación del libro "Educación Ambiental en América Latina<br>
                            Presentación fichero "La sostenibilidad en la escuela mexicana. 50 estrategias didácticas para transformar nuestro mundo" colaboración UASLP-BECENE</h5>
                            <p>Horario: 10:00 - 11:00<br>
                            Auditorio | Facultad de Ingeniería</p>
                            <p></p><br></li>
                            <li><h5 style="color:white">Presentación Jandiekua Revista de Educación Ambiental. Edición especial Centenario de la Autonomía</h5>
                            <p>Horario: 11:00 - 12:00<br>
                            Lugar: Auditorio | Facultad de Ingeniería</p>
                            <p></p><br></li>
                            <li><h5 style="color:white">Entrega de distintivos #UASLPSostenible</h5>
                            <p>Horario: 12:30 - 14:00<br>
                            Lugar: Auditorio | Facultad de Ingeniería<br><br>
                            <p></p><br></li>
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