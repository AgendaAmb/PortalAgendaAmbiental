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
        <div class="nav nav-tabs justify-content-center">
            <a class="nav-link w-100 p-1 m-0" data-toggle="modal" data-target="#exampleModalCenter" role="tab"
                aria-controls="nav-home" aria-selected="true"> Unirodada por los ríos 2022</a> 
          
               
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
            <li>Procedimiento para realizar Unirodadas <a href="/GreenMetric/PROCD_Unirodadas.pdf" download> Descargar </a></li>
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                        <div
                            class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                            <div class="col-6  col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                                <a href="{{asset('storage/imagenes/Unibici/Cartel_UnirodadaRios.png')}}"
                                    class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                    download="Cartel_UnirodadaRios.png">CARTEL GENERAL </a>
                            </div>

                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10"
                                style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                                <br><br>
                                <h4>Unirodada por los Ríos</h4><br><br>
                                <div class="elementor-text-editor elementor-clearfix">
                                    <div style="font-size: 14px; font-family: 'Myraid light';">
                                        <p align="center">Sábado 21 de mayo del 2022<br>8:00 - 11:00 horas<br>Costo: $50.00<br><br></p>
                                        <h3 style="color: #5c94d7;">Dirigido a:</h3>
                                        <p>Comunidad universitaria y público en general</p><br>
                                        <h3 style="color: #5c94d7;">Punto de salida y llegada:</h3>
                                        <p>Agenda Ambiental de la UASLP (12 km aproximadamente)</p><br>
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
                                        <br>
                                        <p align="center">Contaremos con medidas Covid, apoyo de Protección Civil Universitaria,
                                            policía vial municipal, ambulancia, camioneta de arrastre y bloquedores.</p>
                                        <br>
                                        <h3 style="color: #5c94d7;">Registro</h3>
                                        <p>Pasos para registro de participantes:</p><br><br>
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
    @endsection


    <!--@section('Modales')
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                                <img src="{{asset('storage/imagenes/Unibici/Unirodada.png')}}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div
                            class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                            <div class="col-6  col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                                <a href="{{asset('storage/imagenes/Unibici/Unirodada.png')}}"
                                    class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                    download="Cartel_UnirodadaN.jpg">CARTEL GENERAL </a>
                            </div>

                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10"
                                style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                                <br><br>
                                <h4>Unirodada del día del niño 2021
                                </h4><br><br>
                                <div class="elementor-text-editor elementor-clearfix">
                                    <div style="font-size: 14px; font-family: 'Myraid light';">
                                        <p align="center">El programa Unibici de la Agenda Ambiental en colaboración con
                                            la Facultad de
                                            Contaduría y Administración, Unisalud y Deportes de Servicios Estudiantiles
                                            de la UASLP invitan a
                                            la:</p>
                                        <h5 align="center">Unirodada del día del niño</h5><br>
                                        <p align="center">Viernes 30 de abril del 2021<br><br></p>
                                        <h3 style="color: #5c94d7;">Dirigido a:</h3>
                                        <p>Niñas y niños de todas las edades, comunidad universitaria y público en
                                            general</p><br>
                                        <h3 style="color: #5c94d7;">Punto de salida mayores de 15 años:</h3>
                                        <p>Canchas de la Facultad de Contaduría y Administración (17:00 horas) (8 km)
                                        </p><br>
                                        <h3 style="color: #5c94d7;">Punto de encuentro con niños:</h3>
                                        <p>Agenda Ambiental de la UASLP (17:40 horas) (2.5 km)</p><br>
                                        <h3 style="color: #5c94d7;">Objetivo:</h3>
                                        <p>Promover la movilidad urbana sostenible, la implementación de ciudades
                                            incluyentes, sanas y
                                            seguras, la divulgación de las ciclovías de nuestra ciudad y la promoción
                                            del correcto uso de la
                                            bicicleta como medio de transporte.</p>
                                        <br>
                                        <p align="center">EVENTO SIN COSTO<br><br>No olvides llevar agua, casco y
                                            bicicleta en buen estado.
                                        </p>
                                        <br>
                                        <p>Contaremos con medidas Covid, apoyo de Protección Civil Universitaria,
                                            policía vial municipal,
                                            ambulancia, camioneta de arrastre, bloquedores y protocolo de niños
                                            ciclistas.<br><br>Unisalud de
                                            Servicios Estudiantiles ofrecerá evaluaciones físicas (peso, talla, masa
                                            muscular, masa grasa, % de
                                            agua, presión arterial, prueba rápida de glucosa) con su Unidad Médica
                                            Móvil.<br><br>Primeros 20
                                            inscritos obtendrán un viaje de cortesía para la Unirodada de parte de
                                            empresa de bicis de renta
                                            YOY.</p><br>
                                        <h3 style="color: #5c94d7;">Fecha límite de registro:</h3>
                                        <p>Jueves 29 de abril a las 0:00 horas</p><br>
                                        <h3 style="color: #5c94d7;">Inscripción</h3>
                                        <p>
                                        </p>
                                        <ol>
                                            <li>Inscríbete llenando el formato de registro en línea que se encuentra
                                                como botón en esta página.
                                            </li>
                                            <li>En 24 horas te llegara un correo con detalles de la unirodada y respecto
                                                al uso de bicicletas
                                                las bicicletas YOY (para los primeros inscritos).</li>
                                        </ol>
                                        <p></p><br>
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
    @endsection-->

    @push('stylesheets')
<link href="{{ asset('css/nav-tabs_contenido.css') }}" rel="stylesheet" type="text/css">
@endpush