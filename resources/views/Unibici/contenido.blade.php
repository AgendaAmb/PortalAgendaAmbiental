@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-12 justify-content-center text-justify my-2 ">
    <img src="{{ asset('storage/imagenes/Logos/Unibici_logo.png') }}" class="img-fluid my-3" alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-12 mb-5">
    <p class="text-justify pSize">
        <br>Las ciudades del mundo ocupan solo el 3% de la tierra, pero representan entre el 60%, el 80% del consumo de
        energía y el 75% de las emisiones de carbono (ONU, 2015).
        Como se menciona en el Objetivo del Desarrollo Sostenible 13: Acción por el clima, se deben adoptar cambios de
        comportamiento y medios de transporte que emitan menos
        o cero emisiones de gases de efecto invernadero para limitar el aumento de la temperatura media mundial.
        <br>
        <br>La manera en la que nos transportamos tiene un impacto directo en el consumo de energía, las emisiones de
        carbono
        y la salud respiratoria, musculo-esquelética y mental de los humanos por lo que es necesario migrar hacía una
        movilidad urbana sostenible.
        <br>
        <br>UNIBICI es un programa de la Agenda Ambiental de la UASLP, que por medio de la bicicleta como insignia
        promueve los derechos del peatón, el derecho a la ciudad y por supuesto la movilidad urbana sostenible.
    </p>
</div>
@endsection

@section('BannerBotones')
<div
    class="row justify-content-center justify-content-xl-between justify-content-lg-between justify-content-md-between justify-content-sm-between">
    <div class="col-12 ">
        <img src="{{asset('storage/imagenes/Unibici/BI_Unibici.png')}}" class="img-fluid" alt="" srcset="">
    </div>

</div>


    <div class="mt-1 col-md-12 col-sm-12 p-0">
        <div class="nav nav-tabs justify-content-around">
            <a class="nav-link w-50 p-1 m-0" data-toggle="modal" data-target="#UnirodadaRios" role="tab"
                aria-controls="nav-home" aria-selected="true"> Unirodada por los ríos 2022</a> 
            <a class="nav-link w-50 p-1 m-0" data-toggle="modal" data-target="#Foro" role="tab"
                aria-controls="nav-home" aria-selected="true"> Foro SMU</a>    
        </div>
    </div>

    
    @endsection

    @section('ObjetivosTexto')
    <div class="pSize text-justify m-3">
        <h3 class="h3Title">Objetivo general</h3>
        <p class="pSize">Fomentar, incentivar y difundir el uso de la bicicleta como insignia para obtener una Movilidad
            Urbana Sostenible
            a través de la mejora de las condiciones físicas, de seguridad y culturales; a través de actividades como
            paseos,
            estrategias y cursos.</p><br>
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
        <h3 class="h3Title">Descripción</h3>
        <p style="text-align: justify;">Unibici es un programa institucional que existe desde el 2012 a partir de la
            primera
            celebración de la semana de movilidad urbana sustentable, a partir de esa fecha ha evolucionado a hacer de
            la
            bicicleta una insignia para la movilidad urbana sostenible y todos los medios que se necesitan para
            esto.<br><br>Desde entonces ha incluido cada vez más actividades y eventos, desde talleres de urbanismo
            táctico,
            cursos, talleres, conferencias, foros, exhibiciones, estrategias y concursos; un ejemplo de esto son las
            Unirodadas de las que ha habido más de 15 y que se dividen en urbanas y ciclo turísticas.<br><br>Unibici
            incluye
            los ODS 11 Ciudades y comunidades sostenibles, ODS13: Acción por el clima, ODS3: Salud y bienestar y ODS17:
            Alianzas para lograr objetivos. Además, se tiene como marco teórico y normativo la Ley de asentamientos
            humanos,
            los Derechos a la movilidad y a la vivienda, la Carta de derechos a la ciudad, la Ley de tránsito del estado
            de
            SLP, Ley de participación de obra pública entre otros.<br><br>Es muy importante la vinculación y crear
            conexiones
            para sumar y contribuir localmente e internacionalmente por lo que tiene una colaboración interna con el
            programa
            Unisalud de Servicios Estudiantiles de la UASLP, se forma parte de Bicired un colectivo ciclista nacional,
            Liga
            Peatonal un colectivo peatonal nacional, la Estrategia Misión Cero y colabora con los colectivos locales
            para
            incidir en la movilidad urbana sostenible de San Luis Potosí.</p><br>
        <h3 class="h3Title">Actividades</h3>
        <p>Queremos disfrutar de nuestras ciudades y hacerlas más humanas a través de:</p>
        <ul>
            <li>El programa Viernes de bici</li>
            <li>Concursos: SlowRace</li>
            <li>Paseos recreativos: Unirodadas</li>
            <li>Pláticas, cursos y talleres: Arregla tu bici, Biciescuelas, Taller de caminabilidad, Biciupcycling</li>
            <li>Urbanismo táctico: Parking day, Cebratón</li>
            <li>Estrategias: Decálogo de la Movilidad Urbana Sostenible, Yo por mi Ciudad</li>
        </ul><br>
        <h4 class="h3Title">Descargas</h4>
        <ul>
            <li>Procedimiento para realizar Unirodadas <a href="https://ambiental.uaslp.mx/SGA/PUE/PROCD_Unirodadas.pdf" download> Descargar </a></li>
        </ul>
        <br>
        <h4 class="h3Title">Más Información</h4>
        <p style="font-size: 14px !important;"><b>Sistema de Gestión Ambiental</b><br>Agenda Ambiental de la
            UASLP<br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava No. 201, segundo piso<br>Zona Universitaria,
            C.P.
            78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300 Ext. 7210 y 7215<br>Facebook: UniBici UASLP<br>Instagram:
            UniBici_UASLP<br><a href="mailto:unibici@uaslp.mx">unibici@uaslp.mx</a></p>
    </div>
    @endsection

    @section('Modales')
    <div class="modal fade" id="UnirodadaRios" tabindex="-1" role="dialog"
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
                                <img src="{{asset('storage/imagenes/Unibici/Cartel_UnirodadaRios.png')}}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="row justify-content-around justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-3 mx-lg-5 mx-xl-5  mx-md-5 mx-sm-5 mt-2">

                            <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                                <a href={{route('Bienvenida',['nombreModal'=> 'UnirodadaRios'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                            </div>    
                            <div class="col-5  col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                                <a href="{{asset('storage/imagenes/Unibici/Cartel_UnirodadaRios.png')}}"
                                    class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                    download="Cartel_UnirodadaRios.png">CARTEL</a>
                            </div>

                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10"
                                style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                                <br><br>
                                <h4>Unirodada por los Ríos</h4><br><br>
                                <div class="elementor-text-editor elementor-clearfix">
                                    <div style="font-size: 14px; font-family: 'Myraid light';">
                                        <p align="center">Organiza Unibici de Agenda Ambiental en colaboración con la Facultad de Contaduría y Administración, Unisalud de Servicios Estudiantiles, La pulga, Centro Cultura Alemán y Derechos Urbanos<br>Sábado 21 de mayo del 2022<br>8:00 - 11:00 horas<br>Costo: $50.00<br><br></p>
                                        <h3 style="color: #5c94d7;">Dirigido a:</h3>
                                        <p>Comunidad universitaria y público en general</p><br>
                                        <h3 style="color: #5c94d7;">Punto de salida y llegada:</h3>
                                        <p>Agenda Ambiental de la UASLP (12 km aproximadamente)</p>
                                        <br>
                                        <h3 style="color: #5c94d7;">Objetivo:</h3>
                                        <p>Reflexionar acerca de la importancia de los ríos y el desarrollo urbano en las ciudades, promover la movilidad urbana sostenible, las ciudades seguras y conectadas y el uso de medios de transporte de cero emisiones como la bicicleta.</p>
                                        <br>
                                        <br>
                                        <h5 align="center">¡Habrá plática respecto a los ríos y el urbanismo y regalos sorpresa!</h5>
                                        <br>
                                        <br>
                                        <p align="center">No olvides llevar agua, casco y bicicleta en buen estado.</p>
                                        <br>
                                        <p align="center">Contaremos con medidas Covid, apoyo de Protección Civil Universitaria,
                                            policía vial municipal, ambulancia, camioneta de arrastre y bloquedores.</p>
                                        <br>
                                        <h3 style="color: #5c94d7;">Registro:</h3>
                                        <p>Pasos para registro de participantes:</p>
                                        <ol>
                                            <li>Llena correctamente el formulario de registro en línea que se encuentra
                                                como botón en esta página.</li>
                                            <li>Al finalizar y dar clic en el botón enviar, con esta primera etapa del proceso queda PRE-INSCRITO.</li>
                                            <li>Se te enviará un correo en un lapso de 48 horas con la ficha de pago.</li>
                                        </ol>
                                        <br><br>
                                        <h3 style="color: #5c94d7;">Informes</h3>
                                        <p>Agenda Ambiental de la UASLP<br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava No. 201, segundo piso<br>Zona Universitaria, C.P. 78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300 ext. 7210<br><a href="mailto:unibici@uaslp.mx">unibici@uaslp.mx</a></p>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

<div class="modal fade" id="Foro" tabindex="-1" role="dialog"
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
                                <img src="{{asset('storage/imagenes/Unibici/Cartel_Foro Movilidad.png')}}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="row justify-content-around justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-3 mx-lg-5 mx-xl-5  mx-md-5 mx-sm-5 mt-2">

                            <!--<div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                                <a href={{route('Bienvenida',['nombreModal'=> 'Foro'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                            </div>-->    
                            <div class="col-5  col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                                <a href="{{asset('storage/imagenes/Unibici/Cartel_Foro Movilidad.png')}}"
                                    class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                    download="Cartel_Foro Movilidad.png">CARTEL</a>
                            </div>

                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10"
                                style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                                <br><br>
                                <h4>Foro</h4><br><br>
                                <div class="elementor-text-editor elementor-clearfix">
                                    <div style="font-size: 14px; font-family: 'Myraid light';">
                                        <p align="center">Con actores clave y expertos para integrar los ejes estratégicos del sistema de movilidad urbana<br><br></p>
                                        <p>Iniciativa de Ley:<br> Hacia una movilidad inteligente, segura y conectada.<br>Estrategia interdisciplinaria, tansversal y holística</p>
                                        <p>Trabajo de Investigación a cargo de Miguel Ángel Hernández Torres, alumno de la primera generación de IMaREC.</p>
                                        <h3 style="color: #5c94d7;">Dirigido a:</h3>
                                        <p>Actores clave y expertos en movilidad urbana.<br>* Interesados sin invitación favor de enviar correo con justificación de participación.</p><br>
                                        <h3 style="color: #5c94d7;">Objetivo:</h3>
                                        <p>Integrar el Título IV: Ejes Estratégicos de la iniciativa de Ley.<br>"Sistema de Movilidad urbana Sostenible para el Estado de San Luis Potosí"<br>Trabajo de Investigación a cargo de Miguel Ángel Hernández Torres alumno de la primera generación de IMaREC.</p>
                                        <p>Ejes Estratégicos:
                                            <ul>
                                                <li>Educación Ambiental e Intervención Social</li>
                                                <li>Seguridad e Infraestructura Vial</li>
                                                <li>Protección de Personas con Discapacidad, Adultos Mayores, Mujeres y Niños</li>
                                                <li>Protección y cuidado de los animales</li>
                                                <li>Conectividad y Calidad del Transporte Público</li>
                                                <li>Ordenamiento Territorial y Movilidad Sostenible</li>
                                                <li>Calidad del Aire y Eficiencia Energética</li>
                                                <li>Movilidad Inteligente y aplicaciones Tecnológicas</li>
                                            </ul>
                                        </p>
                                        <br>
                                        <h3 style="color: #5c94d7;">Objetivos específicos</h3>
                                        <p>
                                            <ul>
                                                <li>Fomentar la movilidad urbana sostenible a través de una iniciativa de Ley que promueva la integración del Sistema de Movilidad Urbana Sostenible en el Estado de SLP.</li>
                                                <li>Aportar el conocimiento y experiencia de actores clave y expertos en movilidad urbana en los ejes estratégicos de su competencia.</li>
                                                <li>Actualizar la normatividad en materia de movilidad urbana a través de la iniciativa de Ley del Sistema de Movilidad Urbana Sostenible para el  Estado de SLP.</li>
                                                <li>Contribuir a la gestión ambiental en materia de movilidad urbana sostenible.</li>
                                                <li>Mantener un espacio de intercambio académico con diferentes actores que aporten percepciones y puntos de vista informados que nutran y generen conocimiento.</li>
                                            </ul>
                                        </p>
                                        <br>
                                        <h3 style="color: #5c94d7;">Lugar</h3>
                                        <p>Instalaciones de la Agenda Ambiental y plataforma Teams.</p>
                                        <br>
                                        <h3 style="color: #5c94d7;">Fechas</h3>
                                        <p>31 de mayo, 1, 2 y 3 de junio de 2022.</p>
                                        <br>
                                        <br>
                                        <h3 style="color: #5c94d7;">Informes</h3>
                                        <p>Agenda Ambiental de la UASLP<br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava No. 201, segundo piso<br>Zona Universitaria, C.P. 78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300 ext. 7210<br><a href="mailto:unibici@uaslp.mx">unibici@uaslp.mx</a></p>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>    
    <script>
    // console.log({{ $NombreM }});
    $('#{{$NombreM}}').modal('show')
    // $('#UnirodadaRios').modal('show')
    </script>
    @endsection
    @push('stylesheets')
    <link href="{{ asset('css/nav-tabs_contenido.css') }}" rel="stylesheet" type="text/css">
    @endpush