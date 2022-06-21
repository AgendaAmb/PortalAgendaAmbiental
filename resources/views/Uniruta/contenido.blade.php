@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-12 justify-content-center text-justify my-2 ">
    <img src="{{ asset('storage/imagenes/Logos/Logo_Uniruta.png') }}" class="img-fluid my-3" alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-12 mb-5">
    <p class="text-justify pSize">
        <br>El senderismo es un deporte que ha adquirido gran popularidad en los últimos años debido a los bajos costos que implica para llevar a cabo esta actividad, la capacidad de inclusión, además de ser la única actividad deportiva considerada como no competitiva; ya que lo que principal es el trabajo en equipo, el compañerismo y el estar en contacto con la naturaleza.<br><br>El ecoturismo sirve de canal para la conexión entre personas que comparten la sensibilidad, el amor y respeto por la naturaleza y esa curiosidad permanente de conocer nuevos lugares.<br><br>En busca de impactar en las metas de los Objetivos del Desarrollo Sostenibles ODS 3: Salud y bienestar y 15 vida de ecosistemas terrestres y de forma puntual en la meta 15.1 que propone que para 2020, velar por la conservación, el restablecimiento y el uso sostenible de los ecosistemas terrestres y los ecosistemas interiores de agua dulce y los servicios que proporcionan, en particular los bosques, los humedales, las montañas y las zonas áridas, en consonancia con las obligaciones contraídas en virtud de acuerdos internacionales.
    </p>
</div>
@endsection

@section('BannerBotones')
<div
    class="row justify-content-center justify-content-xl-between justify-content-lg-between justify-content-md-between justify-content-sm-between">
    <div class="col-12 ">
        <img src="{{asset('storage/imagenes/Uniruta/BI_Uniruta.png')}}" class="img-fluid" alt="" srcset="">
    </div>

</div>


    <div class="mt-1 col-md-12 col-sm-12 p-0">
        <div class="nav nav-tabs justify-content-around">
            <a class="nav-link w-100 p-1 m-0" data-toggle="modal" data-target="#UnirutaSierraAlvarez" role="tab"
                aria-controls="nav-home" aria-selected="true"> Uniruta en Sierra de Álvarez</a>    
        </div>
    </div>

    
    @endsection

    @section('ObjetivosTexto')
    <div class="pSize text-justify m-3">
        <h3 class="h3Title">Introducción</h3>
        <p>Programa institucional de índole deportivo, pero con tonalidades culturales, históricas, ecológicas, de dispersión, de fomento al compañerismo y ligado a actividades tanto de senderismo como de ecoturismo.<br>Creado con la idea de conectar a la comunidad universitaria (alumnos, docentes, y administrativos) y al público en general con los distintos ecosistemas de la región, mediante recorridos de senderismo que involucren la sana convivencia, la tolerancia, el respeto a la naturaleza entre otros factores, complementando dichos recorridos con datos académicos de tipo históricos, geográficos y geológicos.</p>
        <br>
        <h3 class="h3Title">Objetivo general</h3>
        <p class="pSize">Realizar senderismo eco turístico con perspectiva ambiental, deportiva, cultural, histórica y de convivencia.</p><br>
        <h3 class="h3Title">Objetivos específicos</h3>
        <ul>
            <li>Disfrutar de una actividad deportiva de bajo impacto e incluyente.</li>
            <li>Conocer a otras personas que compartan el gusto por la naturaleza.</li>
            <li>Aprender a respetar el medio ambiente como algo fundamental para el futuro del territorio.</li>
            <li>Disfrutar del contacto directo con paisajes y entornos.</li>
            <li>Fomentar el turismo y el ecoturismo en la región.</li>
        </ul><br>
        <br>
        <h3 class="h3Title">Más Información</h3>
        <p style="font-size: 14px !important;"><b>Agenda Ambiental de la UASLP</b><br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava No. 201, segundo piso<br>Zona Universitaria,
            C.P.
            78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300 Ext. 7957 y 7210<br><a href="mailto:juan.aportela@uaslp.mx">juan.aportela@uaslp.mx</a><br><a href="mailto:gestion.ambiental@uaslp.mx">gestion.ambiental@uaslp.mx</a></p>
    </div>
    @endsection

    @section('Modales')
    <div class="modal fade" id="UnirutaSierraAlvarez" tabindex="-1" role="dialog"
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
                                <img src="{{asset('storage/imagenes/Uniruta/Cartel_Uniruta.png')}}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="row justify-content-around justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-3 mx-lg-5 mx-xl-5  mx-md-5 mx-sm-5 mt-2">

                            <!--<div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                                <a href={{route('Bienvenida',['nombreModal'=> 'UnirutaSierraAlvarez'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                            </div>-->
                            <div class="col-5  col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                                <a href="{{asset('storage/imagenes/Uniruta/Cartel_Uniruta.png')}}"
                                    class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                    download="Cartel_UnirodadaRios.png">CARTEL</a>
                            </div>

                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10"
                                style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                                <br><br>
                                <div class="elementor-text-editor elementor-clearfix">
                                    <div style="font-size: 14px; font-family: 'Myraid light';">
                                        <p align="center">En el marco del Día Mundial del Medio Ambiente <br>la Agenda Ambiental, la División de Desarrollo Humano y Unisalud de Servicios Estudiantiles a través del Programa Uniruta invita a su evento de senderismo:</p><br>
                                        <h3 align="center">Uniruta en Sierra de Álvarez</h3><br><br>
                                        <br>
                                        <h4 style="color: #5c94d7;">Dirigido a:</h4>
                                        <p>Comunidad universitaria y público en general</p><br>
                                        <h4 style="color: #5c94d7;">Punto de salida y llegada:</h4>
                                        <p>Unidad Deportiva Uiversitaria (Av. Colorines s/n, Prados Glorieta, C.P. 78390, San Luis Potosí, S.L.P.<br><br>* Habrá espacio seguro para dejar tu bicicleta o automóvil.</p>
                                        <br>
                                        <h4 style="color: #5c94d7;">Distancia:</h4>
                                        <p>8 km de caminata en la Sierra de Álvarez</p>
                                        <br>
                                        <h4 style="color: #5c94d7;">Dificultad:</h4>
                                        <p>Moderada</p>
                                        <br>
                                        <h4 style="color: #5c94d7;">Fecha:</h4>
                                        <p>Domingo 5 de junio de 2022</p>
                                        <br>
                                        <h4 style="color: #5c94d7;">Horario:</h4>
                                        <p>7:00 a 13:30 horas</p>
                                        <br>
                                        <h4 style="color: #5c94d7;">Objetivo:</h4>
                                        <p>Realizar una ruta de senderismo de iniciación que permita conocer, valorar y respetar los ecosistemas que se encuentran en la Sierra de Álvarez; así como fomentar la salud y el bienestar a través del deporte y la sana convivencia.</p>
                                        <br>
                                        <h4 style="color: #5c94d7;">Cuota de recuperación:</h4>
                                        <p>$60.00 (Sesenta pesos mexicanos) destinados a transporte y gestión</p>
                                        <p align="center">CUPO LIMITADO</p>
                                        <br>
                                        <h4 style="color: #5c94d7;">Requisitos y consideraciones:</h4>
                                        <p><ol>
                                            <li>Llenar el formato de registro en línea</li>
                                            <li>Llevar refrigerio por persona</li>
                                            <li>Contar con excelente actitud</li>
                                            <li>Contar con buen estado de salud, alergias, asma, etc. para llevar a cabo la actividad</li>
                                            <li>Considerar el tiempo prolongado de exposición al sol</li>
                                            <li>Considerar alguna lesión que impida el libre desplazamiento</li>
                                        </ol></p>
                                        <br>
                                        <h4 style="color: #5c94d7;">Equipamiento sugerido:</h4>
                                        <p><ul>
                                            <li>Mochila de ataque (pequeña, 20-30 litro de capacidad)</li>
                                            <li>Sudadera y/o rompevientos y/o impermeable</li>
                                            <li>Calzado deportivo cómodo o botas de campismo</li>
                                            <li>Gorra o sombrero</li>
                                            <li>Bloqueador y lentes de sol</li>
                                            <li>Bastón de senderismo</li>
                                            <li>Medicamentos básico<br>* Uniruta lleva kit básico de primeros auxilios</li>
                                        </ul></p>
                                        <br>
                                        <br>
                                        <h4 style="color: #5c94d7;">Registro:</h4>
                                        <p>Pasos para registro de participantes:
                                            <ol>
                                                <li>Realiza el registro en la plataforma de Agenda Ambiental</li>
                                                <li>Llena correctamente el formulario de registro en línea que se encuentra como botón en esta página emergente</li>
                                                <li>Al finalizar y dar clic en el botón enviar, con esta primera etapa del proceso queda PRE-INSCRITO</li>
                                                <li>Se te enviará un correo en un lapso de 48 horas con la ficha de pago</li>
                                            </ol>
                                        </p>
                                        <br><br>
                                        <h4 style="color: #5c94d7;">Informes</h4>
                                        <p>Agenda Ambiental de la UASLP<br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava No. 201, segundo piso<br>Zona Universitaria, C.P. 78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300 ext. 7957 y 7210<br><a href="mailto:juan.aportela@uaslp.mx">juan.aportela@uaslp.mx</a><br><a href="mailto:gestion.ambiental@uaslp.mx">gestion.ambiental@uaslp.mx</a></p>
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

<!--<div class="modal fade" id="Foro" tabindex="-1" role="dialog"
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

                            <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                                <a href={{route('Bienvenida',['nombreModal'=> 'Foro'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                            </div>   
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
                                <h4>Foro Sistema de Movilidad Urbana</h4><br><br>
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
    </div>-->    
    <script>
    console.log({{ $NombreM }});
    $('#{{$NombreM}}').modal('show')
    // $('#UnirodadaRios').modal('show')
    </script>
    @endsection-->
    @push('stylesheets')
    <link href="{{ asset('css/nav-tabs_contenido.css') }}" rel="stylesheet" type="text/css">
    @endpush