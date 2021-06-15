@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-4 justify-content-center my-5 pt-0">
    <img src="{{ asset('storage/imagenes/Logos/mmus-imagen.png') }}"
        class="rounded mx-auto d-block w-50 py-xl-4 py-md-5" alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-8 mb-5">
    <p class="text-justify pSize pt-5 pt-xl-4 pt-lg-3  pt-md-0">
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

        <img src="{{ asset('img/Comunicacion/2020/banner.png') }}" class="img-fluid " alt="" srcset="">
    </div>


</div>


<div
    class="row mt-1 col-md-12 col-sm-12 pl-md-5 p-0 mx-5 justify-content-xl-start  justify-content-lg-start  justify-content-md-center justify-content-center mx-auto ">
    <div class="btn-toolbar mx-xl-5" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group flex-wrap mx-xl-5  " role="group" aria-label="Basic example">
            <a class="btn btnCur m-2 " href="#" role="button group" data-toggle="modal" data-target="#modal3Celebraton"
                id="CICLO">
                TERCER CEBRATÓN
            </a>
            <a class="btn btnCur m-2 " href="#" role="button group" data-toggle="modal" data-target="#modalCicloConfe"
                id="CICLO">
                CICLO DE CONFERENCIAS
            </a>
            <a class="btn btnCur m-2 " href="#" role="button group" data-toggle="modal" data-target="#modalTallerLinea"
                id="CICLO">
                TALLER EN LÍNEA
            </a>
            <a class="btn btnCur m-2 " href="#" role="button group" data-toggle="modal" data-target="#modalForoInter"
                id="CICLO">
                FORO VIRTUAL INTERNACIONAL
            </a>
            <a class="btn btnCur m-2 " href="#" role="button group" data-toggle="modal"
                data-target="#modalCursoUnihuerto" id="CICLO">
                VIERNES DE BICI
            </a>

        </div>
    </div>
</div>

@endsection

@section('ObjetivosTexto')
<div class="pSize text-justify mt-5">
    <h3 style="color: #5c94d7;">Objetivos específicos</h3>
    <ul>
        <li>Ofrecer educación en torno a la movilidad urbana sostenible en la UASLP y San Luis Potosí.</li>
        <li>Implementar acciones de mejora de la movilidad urbana potosina a través del urbanismo táctico involucrando a
            la comunidad y respondiendo al contexto.</li>
        <li>Generar espacios de información, imaginación, análisis, discusión y propuestas sobre la movilidad urbana de
            San Luis Potosí y del mundo.</li>
        <li>Promover una cultura vial con mecanismos de transporte desde una mirada de cambio sistémico que sean sanos
            para la sociedad y su planeta.</li>
    </ul>
    <h4 style="color: #5c94d7;">Colaboraciones</h4>
    <p style="font-size: 14px !important;"><strong>Agenda Ambiental de la UASLP</strong><br><a
            href="mailto:agenda.ambiental@uaslp.mx">agenda.ambiental@uaslp.mx</a><strong><br><br>Programa
            Unibici</strong><br><a href="mailto:unibici@uaslp.mx">unibici@uaslp.mx</a><br><br><strong>División de
            Difusión Cultural</strong><a
            href="mailto:difusion.cultural@uaslp.mx">difusion.cultural@uaslp.mx</a><br><br><strong>Unidad Académica
            Multidisciplinaria Zona Media</strong><br><a
            href="mailto:cristian.lopez@uaslp.mx">cristian.lopez@uaslp.mx</a>, <a
            href="mailto:florencio.reyes@uaslp.mx">florencio.reyes@uaslp.mx</a></p>
    <p><strong>Coordinación Académica Región Altiplano</strong><br><a
            href="mailto:gabriela.alvarado@uaslp.mx">gabriela.alvarado@uaslp.mx</a></p>
    <p><strong>Unidad Ambiental de la Unidad Académica Multidisciplinaria Zona Huasteca<br></strong><a
            href="mailto:nestor.zapata@uaslp.mx">nestor.zapata@uaslp.mx</a><br><br><b>Museo Regional
            Potosino</b><br><br><b>Pinturas Sensacolor</b><br><br><b>Turbo BH</b></p>
</div>
</div>
@endsection

@section('Modales')
<div class="modal fade" id="modal3Celebraton" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/mmus/TERCER-CEBRATON.jpg')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus/TERCER-CEBRATON.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="TERCER-CEBRATON.jpg">CARTEL GENERAL </a>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                            <h4>3er. Cebratón
                            </h4><br>
                            <p>El pasado 13 de septiembre se llevó a cabo el 3er. Cebratón Universitario con la
                                finalidad de reivindicar-reclamar el espacio de los peatones y sensibilizar sobre la
                                vulnerabilidad del peatón y la importancia de establecer cruces seguros para que las
                                personas puedan trasladarse de forma libre y segura en la ciudad. Ésta iniciativa de
                                pintas artísticas sobre cruces peatonales, buscan colocar la movilidad urbana sostenible
                                en la agenda política pública haciendo énfasis en los derechos humanos y la
                                accesibilidad universal a la ciudad.</p><a
                                href="https://www.facebook.com/media/set/?vanity=AgendaAmbientalUASLP&amp;set=a.4051543831539682"
                                style="color: #5c94d7; font-weight: bold;" target="_blank">Galería</a><br><br>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="modalCicloConfe" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/mmus/CONFERENCIAS.jpg')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus/CONFERENCIAS.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="CONFERENCIAS.jpg">CARTEL GENERAL </a>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';">
                            <h4>Ciclo de conferencias de Movilidad Urbana Sostenible</h4><br><br>
                            <p><span></span></p>
                            <h6><b>Conferencia 1:</b><b> 15,547 – Un desafío a la mexicana</b></h6>
                            <b>Ponente:</b> <a href="{{asset('storage/imagenes/mmus/Bertha_Corte.pdf')}}"
                                style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank"> Bertha
                                Corte </a><br><br>
                            <p></p>
                            <p>Bertha Corte es promotora de la cultura mexicana, psicóloga y ciclista por convicción. En
                                la conferencia titulada “Desafío a la mexicana” comparte su experiencia ciclista
                                recorriendo el perímetro de Australia, los desafíos físicos, emocionales y logísticos
                                que la acompañaron en su travesía que la llevaron a escribir la serie de libros, los
                                cuales se encuentran disponibles en la biblioteca de la Agenda Ambiental.</p><br>
                            <p style="text-align: right;"><a href="https://www.youtube.com/watch?v=R4IIXdC0eS0"
                                    target="_blank"> <img src="{{asset('storage/imagenes/Logos/YouTube.png')}} "> </a>
                            </p>
                            <br>
                            <p><span></span></p>
                            <h6><b>Conferencia 2:</b><b> Memoria visual potosina a dos ruedas: historia, imagen y
                                    bicicletas</b></h6>
                            <b>Ponentes:</b> <a href="{{asset('storage/imagenes/mmus/Eduardo_Saucedo.pdf')}}"
                                style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank"> Dr. Eduardo
                                Rubén Saucedo Sánchez de Tagle </a> y <a
                                href="{{asset('storage/imagenes/mmus/Tania_Godoy.pdf')}}"
                                style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank"> Lic. Tania
                                Itzel Godoy Lozano </a>, Museo Regional Potosino<p></p>
                            <p>Inmersa en un contexto histórico de revolución social, económica, en la ciencia y la
                                tecnología nació la bicicleta en el año 1817, 9 años más tarde, en 1826, la cámara
                                fotográfica. En ese marco, se introducen una serie de aspectos históricos y culturales
                                relevantes sobre la imagen, el desarrollo urbano y el tema de la movilidad en San Luis
                                Potosí, misma que el Museo Regional Potosino da cuenta del uso de la bicicleta desde la
                                mirada de fotógrafos potosinos.</p><br><br>

                            <h6><b>Premiación: 2<sup>o</sup> concurso Cineminuto y la Sostenibilidad</b></h6><br>
                            <p>Realizado de manera conjunta con la División de Difusión Cultural y la Agenda Ambiental,
                                el concurso muestra la síntesis creativa de los participantes para plantear en un minuto
                                de manera distendida las problemáticas ambientales y sociales que demandan nuestra
                                atención. El concurso toma los Objetivos del Desarrollo Sostenible y a través del
                                lenguaje audiovisual, invita a los participantes a expresar mensajes e ideas
                                poderosas.<br>Nuestro jurado: Pancho Aranda, Héctor Ramos, Juan Mayorga, Consejo Estatal
                                de Población encabezado por Cuauhtémoc Modesto.</p><br>
                            <p style="text-align: right;"><a href="https://www.youtube.com/watch?v=wzBWE9nm7B8"
                                    target="_blank"> <img src="{{asset('storage/imagenes/Logos/YouTube.png')}}"> </a>
                            </p>
                            <br><br>

                            <p><span></span></p>
                            <h6><b>Conferencia 3:</b><b> Mobility, one of many aspects in the most sustainable
                                    university in the world</b></h6>
                            <b>Ponente:</b> <a href="{{asset('storage/imagenes/mmus/Erna_Maters.pdf')}}"
                                style="color: #5c94d7; font-weight: bold;" class="ponentes" target="_blank"> Erna Maters
                            </a>
                            <p></p><br><br>
                            <p>Wageningen University &amp; Research (WUR) is at the forefront of sustainable operational
                                management, they work by the domains of: Construction, energy, mobility, procurement and
                                catering. Regarding mobility the key words for their sustainable mobility policy are:
                                safe, healthy, sustainable, accessible, and future-focused. In this talk our speaker
                                will share their experiences and although WUR is ranked as the most sustainable in the
                                world there are many nuances in which they continue to work on to make operations as
                                sustainable as possible in all areas.</p><br>
                            <p style="text-align: right;"><a href="https://www.youtube.com/watch?v=943Y27aIooA"
                                    target="_blank"> <img src="{{asset('storage/imagenes/Logos/YouTube.png')}}"> </a>
                            </p>
                            <br><br>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="modalTallerLinea" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/mmus/TALLERES.jpg')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/mmus/TALLERES.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="TALLERES.jpg">CARTEL GENERAL </a>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';">
                            <h4>Talleres en línea</h4><br><br>
                            <h6>Arregla tu bici</h6><br>
                            <p>Nociones y técnicas básicas de cómo arreglar, reparar y mejorar tu bicicleta.<br>Imparte:
                                Bicicletas Turbo.</p><br>
                            <!--<p style="text-align: right;"><a href="https://www.youtube.com/watch?v=943Y27aIooA" target="_blank"> <img src="../../wp-content/uploads/2020/09/YouTube.png"> </a></p>--><br>

                            <h6>Como preparar pintura para pintar cebras peatonales artísticas.</h6><br>
                            <p>Aprende los elementos técnicos básicos para que tus pintas peatonales artísticas duren
                                más tiempo. Recuerda descartar la guía que nos obsequia Liga Peatonal para el desarrollo
                                de pintas artísticas peatonales.</p><br>
                            <!--<p style="text-align: right;"><a href="https://www.youtube.com/watch?v=943Y27aIooA" target="_blank"> <img src="../../wp-content/uploads/2020/09/YouTube.png"> </a></p>--><br><br>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="modalForoInter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/mmus/FORO.jpg')}}" class="img-fluid" alt="">
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
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'">
                            <h4>Foro virtual internacional de movilidad urbana sostenible
                            </h4><br>
                            <p>El 24 de septiembre se llevó a cabo el <i>Foro virtual internacional sobre Movilidad
                                    Urbana Sostenible</i>, en el que participaron expositores locales, nacionales e
                                internacionales se reunieron para compartir experiencias de gestión de la movilidad
                                urbana alrededor de la crisis del COVID-19 y las estrategias que se están implementando;
                                así como para reflexionar respecto a nuevos paradigmas y propuestas.</p><br>
                            <p style="text-align: right;"><a href="https://www.youtube.com/watch?v=09smBbaKMEI"
                                    target="_blank"> <img src="{{asset('storage/imagenes/Logos/YouTube.png')}}"> </a>
                            </p>
                            <br><br>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection