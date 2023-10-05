@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-4 justify-content-center my-1 pt-0">
    <img src="{{ asset('storage/imagenes/Logos/Logo_UASLPSostenible.png') }}"
        class="rounded mx-auto d-block w-75 py-xl-4 py-md-5" alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-8">
    <p class="text-justify pSize pt-5 pt-xl-4 pt-lg-3  pt-md-0">
        La <b>Agenda Ambiental</b> está celebrando su <b>25 aniversario</b> y en el marco del <b>Centenario de la Autonomía Universitaria,</b> daremos inicio a un evento que será la pauta para que cada año hagamos una revisión de los avances que la Universidad Autónoma de San Luis Potosí tiene en materia de sostenibilidad.<br><br>Para tal fin hemos organizado la primera semana #UASLPSostenible que tiene por objetivo.
</div>
@endsection

@section('BannerBotones')
<div class="row justify-content-md-center  mx-auto">
    <div class="col-auto  ">
        <img src="{{asset('storage/imagenes/CicloConferencias/B_Conferencias.png')}}" class="img-fluid " alt=""
            srcset="">
    </div>

</div>



<div class="mt-1 col-md-12 col-sm-12 p-0">
    <div class="nav nav-tabs justify-content-around my-1">
        <a class="nav-link w-25 p-1 m-0 py-2" data-toggle="modal" data-target="#SaludMental" role="tab"
            aria-controls="nav-home" aria-selected="true" style="font-size:14px; ">La Salud Mental  Desde La Perspectiva De Los Derechos Humanos Y Los Objetivos Del 
            Desarrollo Sustentable</a>

        <a class="nav-link w-25 p-1 pt-3 m-0 py-2" data-toggle="modal"  style="font-size:14px; " data-target="#Lasostenibilidad" role="tab" aria-controls="nav-profile"
            aria-selected="false">  "La Sostenibilidad" El Aprendizaje De La  Contingencia Global</a>

            <a class="nav-link w-25 p-1 pt-2 m-0 py-2" data-toggle="modal"  style="font-size:14px; " data-target="#Justicia" role="tab" aria-controls="nav-profile"
            aria-selected="false">   Justicia Y Género: Uno De Los ODS Desde El  Enfoque De Derechos Humanos Universitarios</a>
           
            <a class="nav-link w-25 p-1 pt-4 m-0 py-2 " data-toggle="modal"  style="font-size:14px; " data-target="#Cultura" role="tab" aria-controls="nav-profile"
            aria-selected="false">   La Cultura, Elemento Central De Los ODS
           
            <a class="nav-link w-25 p-1 pt-2 m-0 py-2" data-toggle="modal"  style="font-size:14px; " data-target="#Arte" role="tab" aria-controls="nav-profile"
            aria-selected="false">   El Arte Como Medio Para Integrar La Sostenibilidad  En El Desarrollo Universitario</a>
           
    </div>
</div>

@endsection

@section('ObjetivosTexto')
<div class="pSize text-justify mt-5">
    <h3 style="color: #5c94d7;">Objetivo general</h3>
    <p>En ésta sección podrás encontrar las conferencias realizadas. Tenemos el compromiso de buscar espacios de
        reflexión, la discusión de ideas sobre sostenibilidad, por lo que les invitamos a externar sus preguntas
        respecto de las conferencias que aquí presentamos, así como aquellas ideas, propuestas e inquietudes para
        abordar nuevas temáticas y ángulos de la sostenibilidad.</p>
    <h3 style="color: #5c94d7;">Registro</h3>
    <p style="text-align: justify;">Los interesados en participar en las conferencias llenaron un formato de registro y
        con ello se les envió una invitación a todas las conferencias del ciclo. Todas las conferencias se llevaron a
        cabo de forma virtual a través de la plataforma Zoom. Al finalizar el ciclo de conferencias se entregó un
        reconocimiento a quienes así lo solicitaron.</p>
    <h4 style="color: #5c94d7;">Colaboraciones</h4>
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
<div class="modal fade" id="SaludMental" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/CicloConferencias/Cartel_Conferencias.jpg')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-between justify-content-xl-between mx-5 mt-2">
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="https://www.youtube.com/watch?v=Pva3mXR6NvM" target="blank">
                                <img src="{{ asset('storage/imagenes/Logos/Youtube.png') }}" alt="">
                            </a>
                        </div>
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/CicloConferencias/Cartel_Conferencias.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_Conferencias.jpg">CARTEL GENERAL </a>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; text-align: justify; font-family: 'Myraid light';'">
                            <h4>La salud mental desde la perspectiva de los Derechos Humanos y los Objetivos del
                                Desarrollo Sostenible
                            </h4><br>
                            <p></p>
                            <h6><b>Descripción</b></h6>
                            <p></p>
                            <p>La salud no es la ausencia de enfermedad, sino la presencia de bienestar. Con ésta
                                premisa, es importante redimensionar la salud de forma integral, prestando especial
                                atención a la salud mental, que representa un aspecto sensible ante las condiciones de
                                aislamiento físico experimentado durante el primer trimestre de confinamiento ante la
                                emergencia sanitaria por el COVID-19.</p><br>
                            <p></p>
                            <h6><b>Conferencias</b></h6>
                            <p></p>
                            <ul>
                                <li>
                                    <p>El derecho a la salud mental ante la pandemia: el COVID-19 en el espectro
                                        socioamiental<br>
                                        Guillermo Saldaña</p>
                                </li>
                                <li>
                                    <p>Herramientas para afrontar el estrés y evitar conductas de riesgo durante el
                                        distanciamiento social<br>
                                        Alfredo Meza Covarrubias</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="Lasostenibilidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/CicloConferencias/Cartel_Conferencias.jpg')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/CicloConferencias/Cartel_Conferencias.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_Conferencias.jpg">CARTEL GENERAL </a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; text-align: justify; font-family: 'Myraid light';'">
                            <h4>"La Sostenibilidad". El aprendizaje de la contingencia global</h4><br>
                            <p></p>
                            <h6><b>Descripción</b></h6>
                            <p></p>
                            <p>La contingencia global evidenció las profundas desigualdades entre países, regiones y
                                grupos sociales al interior de los países y las diversas estratégicas, recursos y
                                herramientas para hacer frente a los retos que las circunstancias actuales nos
                                plantean.<br>Resulta pues importante reflexionar sobre problemáticas clave, que permitan
                                entrelazar las respuestas bajo la perspectiva de la sostenibilidad, centrando la
                                atención en los aprendizajes obtenidos, los cambios necesarios y urgentes a la luz de la
                                adopción de la agenda 2030. En éste ciclo abordamos temáticas clave para crear un
                                espacio de dialogo que resultó muy nutrido por los participantes y ponentes.</p><br>
                            <p></p>
                            <h6><b>Conferencias</b></h6>
                            <p></p><br>
                            <p style="text-align: right;"><b>7 de mayo de 2020</b><br>
                                <a href="https://www.youtube.com/watch?v=6ZL21e9qCks" target="_blank"> <img
                                        src="{{ asset('storage/imagenes/Logos/Youtube.png') }}"> </a><br><a
                                    href="{{asset('storage/imagenes/CicloConferencias/Conferencia_7mayo.jpg')}}"
                                    style="color: #5c94d7; font-weight: bold;" class="ponentes"
                                    download="Conferencia_7mayo.jpg"> Cartel</a></p>
                            <h6>Movilidad en tiempos de pandemia</h6><br>
                            <ul>
                                <li>
                                    <p><b>La ciudad Post-COVID19</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Victor_Gutierrez.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank">
                                            Víctor Manuel Gutiérrez Sánchez</a><br> Prof. de la Facultad del Hábitat</p>
                                </li>
                                <li>
                                    <p><b>Movilidad urbana en SLP ¿Está preparada la ciudad para afrontar la
                                            crisis?</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Carlos_Mancilla.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank">
                                            Carlos Mancilla Jongitud</a><br> Estudiante del DEUA-COLMEX</p>
                                </li>
                            </ul>
                            <br>
                            <p style="text-align: right;"><b>14 de mayo de 2020</b><br> <a
                                    href="https://www.youtube.com/watch?v=lXV7PwWeytY" target="_blank"> <img
                                        src="{{ asset('storage/imagenes/Logos/Youtube.png') }}"> </a> <br><a
                                    href="{{asset('storage/imagenes/CicloConferencias/Conferencia_14mayo.jpg')}}"
                                    style="color: #5c94d7; font-weight: bold;" class="ponentes"
                                    download="Conferencia_14mayo.jpg"> Cartel</a></p>
                            <h6>La tecnología como herramienta para el pensamiento global y la innovación educativa</h6>
                            <br>
                            <ul>
                                <li>
                                    <p><b>La tecnología en tiempos de contingencia</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Edgar_Perez.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank">
                                            Edgar A. Pérez García</a><br> Coordinador de Tecnología Educativa</p>
                                </li>
                                <li>
                                    <p><b>Globalización en tiempos de COVID19</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Melissa_Jimenez.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank">
                                            Melissa Jiménez Gómez-Tagle</a><br> Estudiante de la Maestría en Manejo
                                        Sustentable, Universidad Técnica de Munich, Alemania</p>
                                </li>
                            </ul>
                            <br>
                            <p style="text-align: right;"><b>21 de mayo de 2020</b><br> <a
                                    href="https://www.youtube.com/watch?v=CjmObtd4Qk0" target="_blank"> <img
                                        src="{{ asset('storage/imagenes/Logos/Youtube.png') }}"> </a> <br><a
                                    href="{{asset('storage/imagenes/CicloConferencias/Conferencia_21mayo.jpg')}}"
                                    style="color: #5c94d7; font-weight: bold;" class="ponentes"
                                    download="Conferencia_21mayo.jpg"> Cartel</a></p>
                            <h6>Turismo sostenible: lecciones aprendidas post COVID-19 y la importancia de la
                                diversificación de la oferta turística</h6><br>
                            <ul>
                                <li>
                                    <p><b>Aprendizajes de la contingencia</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Mauricio_Miramontes.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes"
                                            target="_blank">Mauricio Martínez Miramontes</a><br>Experto en turismo
                                        sostenible y co-creación de nuevos productos turísticos. Director de la Mano del
                                        Mono A.C</p>
                                </li>
                                <li>
                                    <p><b>El Sector Turístico en el estado de San Luis Potosí&ZeroWidthSpace; después de
                                            COVID-19</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Juventina_Molina.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank">
                                            Juventina Molina Domínguez</a><br> Directora General de Operación Turística
                                        en San Luis Potosí</p>
                                </li>
                            </ul>
                            <br>
                            <p style="text-align: right;"><b>28 de mayo de 2020</b><br> <a
                                    href="https://www.youtube.com/watch?v=MYf4M-UH9ig" target="_blank"> <img
                                        src="{{ asset('storage/imagenes/Logos/Youtube.png') }}"> </a> <br><a
                                    href="{{asset('storage/imagenes/CicloConferencias/Conferencia_28mayo.jpg')}}"
                                    style="color: #5c94d7; font-weight: bold;" class="ponentes"
                                    download="Conferencia_28mayo.jpg"> Cartel</a></p>
                            <h6>Seguridad alimentaria en San Luis Potosí</h6><br>
                            <ul>
                                <li>
                                    <p><b>Producción orgánica, certificación participativa y mercados locales</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Ramon_Jarquin.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes"
                                            target="_blank">Ramón Jarquin Gálvez</a><br>Prof. de la Facultad de
                                        Agronomía y Veterinaría</p>
                                </li>
                                <li>
                                    <p><b>Seguridad alimentaria: análisis nacional y estatal</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Cuauhtemoc_Modesto.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank">
                                            Cuauhtémoc Modesto López</a><br> Secretario Técnico del Consejo Estatal de
                                        Población la COESPO y Prof. de la Facultad de Economía</p>
                                </li>
                            </ul>
                            <br>
                            <p style="text-align: right;"><b>4 de junio de 2020</b><br> <a
                                    href="https://www.youtube.com/watch?v=j-bzSpoRHPA" target="_blank"> <img
                                        src="{{ asset('storage/imagenes/Logos/Youtube.png') }}"> </a><br><a
                                    href="{{asset('storage/imagenes/CicloConferencias/Conferencia_4junio.jpg')}}"
                                    style="color: #5c94d7; font-weight: bold;" class="ponentes"
                                    download="Conferencia_4junio.jpg"> Cartel</a></p>
                            <h6>La educación como disruptor social: los ODS y las universidades para 2030</h6><br>
                            <ul>
                                <li>
                                    <p><b>Education as Social Disruption: the SDGS and Universities for 2030</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Daniela_Tilbury.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes"
                                            target="_blank">Daniella Tilbury</a><br>Comisionada de Desarrollo Sostenible
                                        y Generaciones futuras del gobierno de Gibraltar/UNESCO</p>
                                </li>
                                <li>
                                    <p><b>Sostenibilidad, adaptación o disrupción&ZeroWidthSpace;, en la contingencia
                                            global: claves para pensar algunos&ZeroWidthSpace; desafíos de las
                                            universidades en México</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Lucy_Nieto.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank">
                                            Luz María Nieto Caraveo</a><br> Presidenta de la Academia Nacional de
                                        Educación Ambiental A.C. / Profesora del PMPCA-UASLP</p>
                                </li>
                            </ul>
                            <br>
                            <p style="text-align: right;"><b>11 de junio de 2020</b><br> <a
                                    href="https://www.youtube.com/watch?v=Gqos7JdSjdQ" target="_blank"> <img
                                        src="{{ asset('storage/imagenes/Logos/Youtube.png') }}"> </a><br><a
                                    href="{{asset('storage/imagenes/CicloConferencias/Conferencia_11junio.jpg')}}"
                                    style="color: #5c94d7; font-weight: bold;" class="ponentes"
                                    download="Conferencia_11junio.jpg"> Cartel</a></p>
                            <h6>Reflexiones sobre los aprendizajes de la contigencia global Parte I</h6><br>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="Justicia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/CicloConferencias/Cartel_Conferencias.jpg')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/CicloConferencias/Cartel_Conferencias.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="TALLERES.jpg">CARTEL GENERAL </a>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; text-align: justify; font-family: 'Myraid light';'">
                            <h4>Justicia y género: uno de los ODS desde el enfoque de los derechos humanos y
                                universitarios</h4><br>
                            <p></p>
                            <h6><b>Descripción</b></h6>
                            <p></p>
                            <p>La reducción de las desigualdades es quizá uno de los objetivos del desarrollo sostenible
                                más apremiantes, pues lleva consigo una deuda histórica y de lucha por los derechos
                                humanos, los derechos de las mujeres, de los pueblos indígenas y del acceso a la
                                información y a la educación.<br>De la mano con la Defensoría de Derechos Universitarios
                                de nuestra máxima casa de estudios, preparamos un ciclo de conferencias que nos invita
                                reflexionar y poner en perspectiva el alcance de los derechos universitarios y la
                                importancia de continuar pugnando por entornos seguros y libres de violencia para las
                                mujeres. </p><br>
                            <p></p>
                            <h6><b>Conferencias</b></h6>
                            <p></p><br>
                            <p style="text-align: right;"><b>18 de junio de 2020</b><br> <a
                                    href="https://www.youtube.com/watch?v=apN_UarnaNU" target="_blank"> <img
                                        src="{{ asset('storage/imagenes/Logos/Youtube.png') }}"> </a></p>
                            <h6>Mujeres indígenas. Acceso a la justicia en instituciones de Educación Superior</h6><br>
                            <ul>
                                <li><a href="{{asset('storage/imagenes/CicloConferencias/CV_Guadalupe_Huacuz.pdf')}}"
                                        style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank"> Ma.
                                        Guadalupe Huacuz Elias</a><br> Profesora del Departamento de Política y Cultura
                                    de la División de Ciencias Sociales y Humanidades<p></p>
                                </li>
                                <li>
                                    <p><b>Mujeres indígenas, violencia y justicia dentro de las universidades</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Laura_Saavedra.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank">
                                            Laura Edith Saavedra Hernández</a><br> Profesora de la Maestría en Derechos
                                        Humanos de la UASLP</p>
                                </li>
                            </ul>
                            <br>
                            <p style="text-align: right;"><b>25 de junio de 2020</b><br> <a
                                    href="https://www.youtube.com/watch?v=X3QSRdZ8dRo&amp;feature=youtu.be"
                                    target="_blank"> <img src="{{ asset('storage/imagenes/Logos/Youtube.png') }}"> </a>
                            </p>
                            <h6>Acceso a la justicia para mujeres que son objeto de violencia política</h6><br>
                            <ul>
                                <li>
                                    <p><b>Acceso a la justicia para mujeres indígenas que viven violencia política por
                                            razón de género</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Rosa_Simon.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes"
                                            target="_blank">Rosa Bertha Simón Sánchez&ZeroWidthSpace;</a><br>Maestra en
                                        Estudios de la Mujer por la UAM Xochimilco</p>
                                </li>
                                <li>
                                    <p><b>Acceso a la justicia para mujeres que viven violencia política por razón de
                                            género</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Lourdes_Moreno.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank">
                                            María de Lourdes Moreno Estrada</a><br> Maestra en Educación y Presidenta de
                                        SAMALOU A.C.</p>
                                </li>
                            </ul>
                            <br>
                            <p style="text-align: right;"><b>2 de julio de 2020</b><br> <a
                                    href="https://www.youtube.com/watch?v=BnUTWK7ZEpU&amp;feature=youtu.be"
                                    target="_blank"> <img src="{{ asset('storage/imagenes/Logos/Youtube.png') }}"> </a>
                            </p>
                            <h6>Memoria y justicia transicional</h6><br>
                            <ul>
                                <li>
                                    <p><b>Escenarios de post-conflicto en la Costa Atlántica de Nicaragua: Reparación,
                                            memoria y contradicción</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Dolores_Figueroa.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes"
                                            target="_blank">Dolores Figueroa Romero</a><br>Catedrática del CONACyT
                                        adscrita al Centro de Investigaciones y Estudios Superiores en Antropología
                                        Social (CIESAS), sede Distrito Federal</p>
                                </li>
                                <li>
                                    <p><b>Derechos de género en contextos de autonomías indígenas y pluralidades
                                            legales: retos desde el pluralismo legal, la interseccionalidad y una visión
                                            de género culturalmente situada</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Ana_Arteaga.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank">
                                            Ana Cecilia Arteaga Böhrt&ZeroWidthSpace;</a><br> Responsable de la Unidad
                                        de Género de la Comisión Estatal para los Pueblos Indígenas, Chihuahua, México
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="Cultura" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/CicloConferencias/Cartel_Conferencias.jpg')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/CicloConferencias/Cartel_Conferencias.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_Conferencias.jpg">CARTEL GENERAL </a>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                            <h4>Tradiciones, arte y cultura para la conservación de los recursos naturales y el
                                fortalecimiento de la identidad local</h4><br>
                            <!--<p><h6><b>Descripción</b></h6></p> 
                            <p>La reducción de las desigualdades es quizá uno de los objetivos del desarrollo sostenible más apremiantes, pues lleva consigo una deuda histórica y de lucha por los derechos humanos, los derechos de las mujeres, de los pueblos indígenas y del acceso a la información y a la educación.<br>De la mano con la Defensoría de Derechos Universitarios de nuestra máxima casa de estudios, preparamos un ciclo de conferencias que nos invita reflexionar y poner en perspectiva el alcance de los derechos universitarios y la importancia de continuar pugnando por entornos seguros y libres de violencia para las mujeres.  </p><br>-->
                            <p></p>
                            <h6><b>Conferencias</b></h6>
                            <p></p><br>
                            <p style="text-align: right;"><b>16 de julio de 2020</b><br> <a
                                    href="https://youtu.be/ymH3PSgRvP4" target="_blank"> <img
                                        src="{{ asset('storage/imagenes/Logos/Youtube.png') }}"> </a></p>
                            <h6>Impactos por COVID-19 en la comunidad UASLP</h6><br>
                            <p style="text-align: right;"><b>23 de julio de 2020</b><br> <a
                                    href="https://www.youtube.com/watch?v=fd5BSfNOvus" target="_blank"> <img
                                        src="{{ asset('storage/imagenes/Logos/Youtube.png') }}"> </a></p>
                            <br>
                            <h6>Tradiciones, arte y cultura para la conservación de los recursos naturales y el
                                fortalecimiento de la identidad local</h6><br>
                            <ul>
                                <li><a href="{{asset('storage/imagenes/CicloConferencias/CV_Laura_Gonzalez.pdf')}}"
                                        style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank">
                                        Laura Elena González Sánchez</a><br> Consultora especializada en proyectos
                                    culturales nacionales e internacionales<p></p>
                                </li>
                                <li>
                                    <p><b>Entre diversidades. Conservar los recursos naturales, culturales y
                                            lingüísticos en México</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Anuschka_Vant.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank">
                                            Anuschka van´t Hooft</a><br> Profesora-Investigadora de la Universidad
                                        Autónoma de San Luis Potosí</p>
                                </li>
                            </ul>
                            <br>
                            <p style="text-align: right;"><b>30 de julio de 2020</b><br> <a
                                    href="https://www.youtube.com/watch?v=JqCi99-o5MA" target="_blank"> <img
                                        src="{{ asset('storage/imagenes/Logos/Youtube.png') }}"> </a></p>
                            <h6>Las representaciones artísticas y culturales y el arraigo al patrimonio natural</h6><br>
                            <ul>
                                <li>
                                    <p><b>Representaciones sociales del arte y la cultura</b><br><a
                                            href="{{asset('storage/imagenes/CicloConferencias/CV_Jonatan_Gamboa.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank">
                                            Jonatan Ignacio Gamboa Herrera</a><br> Director del proyecto de divulgación
                                        científica, humanística y artística Popmodernismo</p>
                                </li>
                                <li>
                                    <p><b>Arte-sano y medio ambiente</b><br>
                                        <a href="{{asset('storage/imagenes/CicloConferencias/CV_Leon_Garcia_Lam.pdf')}}"
                                            style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank">
                                            León García Lam</a><br> Profesor del Centro Universitario de las Artes
                                        (UASLP), Universidad Cuauhtémoc de SLP y Universidad de Zacatecas</p>
                                </li>
                            </ul>
                            <br>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="Arte" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/CicloConferencias/Cartel_Conferencias.jpg')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/CicloConferencias/Cartel_Conferencias.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_Conferencias.jpg">CARTEL GENERAL </a>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                            <h4>El arte como medio para integrar la sostenibilidad en el desarrollo universitario</h4><br>
                            <p style="text-align: right;"><b>6 de agosto de 2020</b><br> <a
                                href="https://www.youtube.com/watch?v=LpClRoqCFaU" target="_blank"> <img
                                    src="{{ asset('storage/imagenes/Logos/Youtube.png') }}"> </a></p>  
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