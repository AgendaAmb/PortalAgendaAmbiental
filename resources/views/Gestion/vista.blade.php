@extends('Bienvenido')

@php
$titulo = '<strong> ¿Qué hacemos? </strong>';
$texto = 'El Sistema de Gestión Ambiental (SGA) busca mejorar
el desempeño ambiental de la UASLP como organización
en todas sus funciones sustantivas para transformarla
en una institución ambiental y socialmente sostenible
con la participación de la comunidad universitaria.

Responde a los lineamientos del PIDE, a los ejes rectores
de la UASLP y es de los primeros en su tipo en el país
funcionando como un mecanismo para mejorar el desempeño
ambiental de la institución regido tanto por estándares
nacional e internacionales como por los Objetivos del
Desarrollo Sostenible y por lineamientos propios.


<br>
<br>
<strong> Funcionamiento </strong>
<br>

Para lograr y mantener los objetivos del SGA se cuenta
con un manual de operación del SGA, lineamientos, programas,
planes, procedimientos, formatos, manuales y materiales 
tanto técnicos como administrativos. Los programas son
la exposición permanente y articulada para desarrollar y
ejecutar las acciones que cumplen la descripción y los objetivos
medibles y valorables de los módulos del SGA. Éstos pueden
contener a su vez comisiones interdisciplinarias, lineamientos,
procedimientos, formatos, actividades programadas e indicadores
propios.';
@endphp

@section('ContenidoPrincipal')
<div class="row justify-content-around my-3">
    <x-o-d-s-wheel />
    <x-ejeTrabajo :titulo="$titulo" :descripcion="$texto" :imagen="'noHayxd.png'" />
</div>

{{--
Tabs de Gestión Institucional.
--}}

<x-tab-panel >
    {{--
    Grupo de botones de los tabs.
    --}}
    <x-slot name="tabButtons" >
        <x-tab-panel-button id="v-pills-boton4" idTabPanelContent="#tab-panel-4"
            nombre="PROGRAMA UNIVERSITARIO DE RESIDUOS" nombreRes="RESIDUOS"
            class="nav-link active d-lg-block  d-xl-block d-md-block d-sm-block d-none " />
        <x-tab-panel-button id="v-pills-boton1" idTabPanelContent="#tab-panel-1" nombre="PROGRAMA UNIVERSITARIO DE AGUA"
            nombreRes="AGUA" class="nav-link d-lg-block d-xl-block d-md-block d-sm-block d-none" />
        <x-tab-panel-button id="v-pills-boton2" idTabPanelContent="#tab-panel-2"
            nombre="PROGRAMA UNIVERSITARIO DE ENERGÍA" nombreRes="ENERGÍA"
            class="nav-link d-lg-block d-xl-block d-md-block d-sm-block d-none" />
        <x-tab-panel-button id="v-pills-boton3" nombreRes="BIODIVERSIDAD" idTabPanelContent="#tab-panel-3"
            nombre="PROGRAMA UNIVERSITARIO DE BIODIVERSIDAD"
            class="nav-link d-lg-block d-xl-block d-md-block d-sm-block d-none" />




        <!--
        <x-tab-panel-button id="v-pills-boton5" idTabPanelContent="#tab-panel-5" nombre="BIBLIOTECA"
            class="nav-link d-lg-block d-xl-block d-md-block d-sm-block d-none" nombreRes="BIBLIOTECA" />
        -->
    </x-slot>

    <x-slot name="tabContent">

        {{--
        Tab correspondiente a PROGRAMA UNIVERSITARIO DE RESIDUOS.
        --}}
        <x-tab-panel-content class="tab-pane fade show active" id="tab-panel-4" role="tabpanel"
            aria-labelledby="nav-home-tab">
            <x-slider idSlider="s4" titulo="PROGRAMA UNIVERSITARIO DE RESIDUOS"
                descripcion="Busca el manejo apropiado de las sustancias y materiales reguladas, residuos peligrosos, residuos de manejo especial, residuos sólidos urbanos, emisiones y descargas al aire, agua o suelo que utilizamos en todas las operaciones académicas y administrativas para garantizar la seguridad, salud, prevención de contaminación al ambiente y el cumplimiento legal."
                class="tab-pane fade show" role="tabpanel" aria-labelledby="nav-home-tab">

                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Gestion/residuos1.png')" />
                <x-imagen-slider :linkImagen="asset('img/Gestion/residuos2.png')" />
            </x-slider>
            <x-tab-panel-footer class="row justify-content-between">
                <x-tab-panel-image class="col-7 col-sm-5 col-md-3 my-3 mx-auto"
                    :imageURL="asset('img/Gestion/Proserem_Logo.png')" urlhref="{{route('Proserem')}}" widthBo="w-75" />
                <!-- <x-tab-panel-image class="col-10 col-sm-5 col-md-3 my-3 mx-auto" :imageURL="asset('img/Gestion/ECR.png')" urlhref="{{route('ConsumoResponsable')}}"  />
                <x-tab-panel-image class="col-10 col-sm-5 col-md-3 my-3 mx-auto" :imageURL="asset('img/Gestion/REUTRONIC.png')" />
                <x-tab-panel-image class="col-10 col-sm-5 col-md-3 my-3 mx-auto" :imageURL="asset('img/Gestion/CAMBALACHE.png')" />-->
                <x-tab-panel-image :imageURL="asset('img/Gestion/Logo_ConsumoResponsable.png')"
                    urlhref="{{route('ConsumoResponsable')}}" widthBo="w-75" />
                <x-tab-panel-image :imageURL="asset('img/Gestion/Logo_HumoLibre.png')" urlhref="#" widthBo="w-75" />


            </x-tab-panel-footer>
            <h1 class="text-bold mt-5">Programa Universitario de Residuos (PUR)</h1>
            <h3 class="text-bold mt-5">Introducción </h3>
            <p>
                Se entiende por gestión integral de residuos como el conjunto articulado e interrelacionado de acciones
                normativas, operativas, financieras, de planeación, administrativas, sociales, educativas, de monitoreo,
                supervisión y evaluación, para el manejo de residuos, desde su generación hasta la disposición final, a
                fin de lograr beneficios ambientales, la optimización económica de su manejo y su aceptación social,
                respondiendo a las necesidades y circunstancias de cada localidad o región (LGPGR, 2015).

                Los residuos, definidos como cualquier sustancia o material que su productor o dueño considera que no
                tienen valor suficiente para retenerlo; pueden provocar daños a la salud y al medio ambiente a
                diferentes niveles dependiendo de su clasificación y deben ser manejados de acuerdo a su tipo ya que
                pueden permearse como lixiviados a los mantos acuíferos, provocar perdida de fertilidad en suelos,
                desmejorar la capa de ozono y ser generadores de agentes infecciosos, por dar algunos ejemplos.

                La Universidad Autónoma de San Luis Potosí se encuentra involucrada con el manejo de residuos por
                consecuencia de sus actividades y operaciones académicas, de investigación, administrativas, de
                mantenimiento y de servicio al público.
            </p>

            <div class="row my-4">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-general"
                            role="tab" aria-controls="v-pills-home" aria-selected="true">Objetivo general</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-especificos"
                            role="tab" aria-controls="v-pills-profile" aria-selected="false">Objetivos específicos</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-Descripcion"
                            role="tab" aria-controls="v-pills-messages" aria-selected="false">Descripción</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-Biblioteca"
                            role="tab" aria-controls="v-pills-settings" aria-selected="false">Biblioteca</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-informacion"
                            role="tab" aria-controls="v-pills-settings" aria-selected="false">Más información</a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <p>Crear una cultura participativa institucional de la gestión integral y apropiada de los
                                residuos.</p>
                        </div>
                        <div class="tab-pane fade" id="v-pills-especificos" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <ul>
                                <li>Mostrar a la comunidad universitaria los medios y herramientas con los que se cuenta
                                    para hacer una disposición adecuada de sus sustancias y materiales reguladas según
                                    la normativa y con la pericia universitaria.
                                </li>
                                <li>Incidir en la mitigación de los impactos negativos que la disposición incorrecta de
                                    los residuos puede generar a la salud y al medio ambiente.
                                </li>
                                <li>Disminuir y monitorear los residuos, descargas y emisiones generados de acuerdo a
                                    los límites establecidos por expertos y por normativa.</li>
                                <li>Motivar a la comunidad universitaria a iniciar una nueva cultura de compra,
                                    consumo, tratamiento y disposición de sustancias y materiales reguladas, fomentando
                                    cambios en la sociedad y así contribuir con la disminución de residuos. </li>
                                <li>Participar en la formación preventiva, de minimización, recuperación de recursos,
                                    reducción, reutilización, recolección selectiva, valorización y reciclaje de los
                                    residuos.</li>
                                <li>Reforzar las prácticas en los laboratorios y talleres desde el diseño de prácticas
                                    hasta planes de manejo y actualización en tratamientos. </li>

                            </ul>

                        </div>
                        <div class="tab-pane fade" id="v-pills-Descripcion" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <p>
                                El Programa Universitario de Residuos forma parte de las actividades del Sistema de
                                Gestión Ambiental de la Agenda Ambiental de la UASLP. Este programa busca ser un
                                mecanismo para manejar los residuos sólidos urbanos, de manejo especial y peligrosos de
                                la UASLP de la mejor manera posible, tomando en cuenta el cumplimiento con la
                                legislación vigente en materia de residuos, la seguridad, el impacto al ambiente y a la
                                salud, así como los beneficios económicos y de imagen pública.

                            </p>
                            <p>El programa busca apoyarse de instrumentos como planes de manejo y procedimientos que
                                involucran a la prevención, reducción, reutilización, minimización, maximización de
                                valorización, tratamientos, almacenamiento, optimización de procesos, aprovechamiento de
                                subproductos y confinamiento.</p>
                            <p>Creemos en que la adopción de buenas prácticas en esta materia debe ser bajo los
                                criterios de salud, ambientales, seguridad, tecnológicos, económicos y sociales con
                                fundamento en el diagnóstico y bajo los principios de responsabilidad compartida y
                                consumo responsable para mantener y convertir a la UASLP en un ejemplo de la gestión
                                apropiada de todos los residuos.</p>
                            <p>Para lograr la gestión y manejo apropiada de los residuos universitarios el Programa
                                Universitario de Residuos tiene en existencia los procedimientos, lineamientos y guías
                                descargables mostrados en la biblioteca.</p>
                        </div>
                        <div class="tab-pane fade" id="v-pills-Biblioteca" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <ul>
                               <li v-for="P in PUR">@{{P.Nombre}}
                                <a data-toggle="modal" href="" data-target="#pdf" @click="idPUR=P.id">&nbsp;PDF</a>
                            </li>
                               
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="v-pills-informacion" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <p style="font-size:15px !important;text-align: justify;">
                                Agenda Ambiental de la UASLP<br>
                                Universidad Autónoma de San Luis Potosí<br>
                                Manuel Nava No. 201, segundo piso<br>
                                Zona Universitaria, C.P. 78210<br>
                                San Luis Potosí, S.L.P.<br>
                                Tel. 826-2300 Ext. 7215<br>
                                <a href="mailto:Gestion.ambiental@uaslp.mx">Gestion.ambiental@uaslp.mx</a> <br>
                                <a href="mailto:Unibici@uaslp.mx">Unibici@uaslp.mx</a>
                            </p>

                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="pdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">

                    <div class="modal-content">
                        <div class="col-12  p-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">X</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                           
                           
                            <iframe style="width: 100%;height: 750px;" v-if="idPUR!=''"
                                :src=PUR[idPUR-1].Url></iframe>
                        </div>


                    </div>
                </div>
            </div>
        </x-tab-panel-content>

        {{--
        Tab correspondiente a PROGRAMA UNIVERSITARIO DE AGUA.
        --}}
        <x-tab-panel-content class="tab-pane fade show " id="tab-panel-1" role="tabpanel"
            aria-labelledby="nav-home-tab">
            <x-slider idSlider="s1" titulo="PROGRAMA UNIVERSITARIO DE AGUA"
                descripcion="Se encarga del manejo apropiado e integral del agua en todo el quehacer de la UASLP a través de aspectos técnicos de eficiencia y tratamiento, investigación e innovación y comunicación a la comunidad."
                class="tab-pane fade show active " role="tabpanel" aria-labelledby="nav-home-tab">

                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Gestion/agua1.jpg')" />
                <x-imagen-slider :linkImagen="asset('img/Gestion/agua2.jpg')" />
            </x-slider>
        </x-tab-panel-content>

        {{--
        Tab correspondiente a PROGRAMA UNIVERSITARIO DE ENERGÍA.
        --}}
        <x-tab-panel-content class="tab-pane fade show" id="tab-panel-2" role="tabpanel" aria-labelledby="nav-home-tab">
            <x-slider idSlider="s2" titulo="PROGRAMA UNIVERSITARIO DE ENERGÍA"
                descripcion="Implementa el buen uso de la energía promoviendo la movilidad urbana sostenible, la eficiencia eléctrica y la estrategia para la transición hacia las energías renovables; tomando en cuenta las instalaciones, los equipos, la operación, el uso de energías renovables y la iluminación eficiente, buscando no causar impacto ambiental negativo y cumpliendo con estándares y criterios."
                class="tab-pane fade show" role="tabpanel" aria-labelledby="nav-home-tab">

                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Gestion/energia1.png')" widthBo="w-75" />
                <x-imagen-slider :linkImagen="asset('img/Gestion/energia2.png')" widthBo="w-75" />
            </x-slider>
            <x-tab-panel-footer class="row justify-content-between">
                <x-tab-panel-image :imageURL="asset('img/Gestion/Logo_Unibici.png')" urlhref="{{route('Unibici')}}"
                    widthBo="w-75" />
                <x-tab-panel-image :imageURL="asset('img/Gestion/Logo_AutoCompartido.png')" widthBo="w-75" />
                <x-tab-panel-image :imageURL="asset('img/Gestion/Logo_EspaciosHabit.png')" widthBo="w-75" />
            </x-tab-panel-footer>



            <h1 class="text-bold mt-5">Programa Universitario de Energía (PUE)</h1>
            <p>
                La producción y el consumo energético son los principales responsables del aumento de la temperatura del
                planeta. El consumo energético en México es de 2 billones de Mega Watts hora (MWh) de los cuales solo el
                25% proviene de energías renovables. La Ley General de Cambio Climático tiene como objeto incrementar la
                producción de energía limpia hasta un 35% para el 2024 y promover la transición hacia una economía
                competitiva, sustentable y de bajas emisiones de carbono buscando disminuir el impacto negativo del uso
                de energía en todos los sectores.
                La UASLP se suma a través de su Programa Universitario de Energía, el cual pretende incidir, fomentar y
                fortalecer el vínculo de la comunidad UASLP con su hábitat, sensibilizando del impacto negativo que
                generan algunos tipos de producción de energía para así introducir nuevas estrategias de ahorro de
                consumo energético mediante el cumplimiento de estándares y criterios en donde se minimice un impacto
                ambiental y social negativo migrando hacia el uso de energías renovables, la movilidad urbana eficiente,
                la creación del conocimiento, la participación de la comunidad y el compromiso institucional a través de
                sus políticas y lineamientos.
            </p>

            <div class="row my-4">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-generalPUE"
                            role="tab" aria-controls="v-pills-home" aria-selected="true">Objetivo general</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-especificosPUE"
                            role="tab" aria-controls="v-pills-profile" aria-selected="false">Objetivos específicos</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-DescripcionPUE"
                            role="tab" aria-controls="v-pills-messages" aria-selected="false">Descripción</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-BibliotecaPUE"
                            role="tab" aria-controls="v-pills-settings" aria-selected="false">Biblioteca</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-informacionPUE"
                            role="tab" aria-controls="v-pills-settings" aria-selected="false">Más información</a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-generalPUE" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <p>Manejar y gestionar en todo el quehacer de la UASLP estrategias que garanticen el uso
                                responsable
                                de la energía de forma integral mediante enfoques de desarrollo sostenible que
                                consideran la
                                movilidad urbana sostenible, el uso de energías renovables y aplicaciones de eficiencia
                                energética.</p>
                        </div>
                        <div class="tab-pane fade" id="v-pills-especificosPUE" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <ul>
                                <li>Diagnóstico y creación del conocimiento y de las aplicaciones sustentables
                                    energéticas en la
                                    actualidad por nuestra comunidad universitaria a través de la comisión de energía.
                                </li>
                                <li>Estrategias de comunicación, educación y participación de la comunidad en donde se
                                    promuevan
                                    y apliquen conocimientos establecidos en busca del uso eficiente de energías
                                    renovables.
                                </li>
                                <li>Incidir y fomentar la movilidad urbana sostenible mediante proyectos de urbanismo
                                    táctico
                                    priorizando los flujos peatonales, movilidad virtual (teletrabajo), electromovilidad
                                    y el
                                    uso de transporte colectivo. </li>
                                <li>Promoción e implementación de la movilidad urbana sostenible a través de programas
                                    institucionales como: Programa Unibici, Programa Autocompartido y Programa Viernes
                                    de bici y
                                    creación de más programas. </li>
                                <li>Realizar foros, conferencias, mesas de trabajo y debate para la integración y
                                    participación
                                    intercultural en busca de estrategias técnicas, así como el desarrollo de
                                    herramientas
                                    tecnológicas sustentables en bien del desarrollo de energías limpias.</li>
                                <li>Realizar y modificar instalaciones energéticas eficientes, que consideran energías
                                    renovables y aplicaciones de luminarias tipo LED, que consideren en el diseño la
                                    bioclimática, la orientación y distancia de los edificios. </li>
                                <li>Extender y vincular el uso eficiente de energías renovables a la sociedad así como
                                    la
                                    aplicación de movilidad urbana sostenible mediante programas, proyectos y gestiones
                                    multidisciplinarias e interdisciplinarias.</li>
                            </ul>

                        </div>
                        <div class="tab-pane fade" id="v-pills-DescripcionPUE" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <p>
                                El presente programa se dirige a la comunidad universitaria de la
                                UASLP, así como a todo aquel que esté interesado en un mejor manejo y uso de la energía
                                que
                                impacte en la huella ecológica, planteado desde diferentes enfoques como lo es el
                                compromiso
                                institucional de la aplicación y fomento a la movilidad urbana sostenible, el control y
                                reducción del consumo de energía, la migración hacia el uso de energías renovables, la
                                realización de mejores prácticas energéticas y de transporte, la creación del
                                conocimiento,
                                la participación de la comunidad y el compromiso de sensibilizar a la población.
                            </p>

                        </div>
                        <div class="tab-pane fade" id="v-pills-BibliotecaPUE" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <ul>
                                @if (Auth::user())
                                <li>Lineamientos LED Depto. Mantenimiento
                                    <a data-toggle="modal" href="" data-target="#pdfPUE">PDF</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="v-pills-informacionPUE" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <p style="font-size:15px !important;text-align: justify;">
                                Agenda Ambiental de la UASLP<br>
                                Universidad Autónoma de San Luis Potosí<br>
                                Manuel Nava No. 201, segundo piso<br>
                                Zona Universitaria, C.P. 78210<br>
                                San Luis Potosí, S.L.P.<br>
                                Tel. 826-2300 Ext. 7215<br>
                                <a href="mailto:Gestion.ambiental@uaslp.mx">Gestion.ambiental@uaslp.mx</a> <br>
                                <a href="mailto:Unibici@uaslp.mx">Unibici@uaslp.mx</a>
                            </p>

                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="pdfPUE" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              
                <div class="modal-dialog modal-xl">

                    <div class="modal-content">
                        <div class="col-12  p-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">X</span>
                            </button>
                        </div>
                        <div class="modal-body">

                         
                            <iframe style="width: 100%;height: 750px;" v-if="idPUE!=''"
                                :src=PUE[idPUE-1].Url></iframe>
                        </div>


                    </div>
                </div>
            </div>
            
        </x-tab-panel-content>

        {{--
        Tab correspondiente a PROGRAMA UNIVERSITARIO DE BIODIVERSIDAD.
        --}}
        <x-tab-panel-content class="tab-pane fade show" id="tab-panel-3" role="tabpanel" aria-labelledby="nav-home-tab">
            <x-slider idSlider="s3" titulo="PROGRAMA UNIVERSITARIO DE BIODIVERSIDAD"
                descripcion="Integra el manejo de la flora y fauna de los campus universitarios para que sean congruentes con la ecología del entorno, funcionales, con arquitectura del paisaje que incluya las especies endémicas y que se promueva la interacción, respeto y sana convivencia recreativa y académica. Los jardines universitarios deben basarse en un diseño de acuerdo a las características bioclimáticas de cada región de nuestros campus universitarios. Los huertos urbanos  aportan al sistema ecológico beneficios ambientales como regulación de la temperatura, promoción de la biodiversidad vegetal y de fauna, con especial énfasis en los polinizadores, y el campo de experimentación para estrategias de producción sostenible de hortalizas y una cultura de alimentación sana."
                class="tab-pane fade show" role="tabpanel" aria-labelledby="nav-home-tab">

                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Gestion/biodiversidad1.png')" />
                <x-imagen-slider :linkImagen="asset('img/Gestion/biodiversidad2.png')" />
            </x-slider>
            <x-tab-panel-footer class="row justify-content-around">

                <x-tab-panel-image :imageURL="asset('img/Gestion/Logo_Unihuerto.png')" urlhref="{{route('Unihuerto')}}"
                    widthBo="w-75" />

                <x-tab-panel-image class="col-7 col-sm-4 col-md-3 my-3 mx-auto " widthBo="w-75"
                    :imageURL="asset('img/Gestion/Logo_DateRespiro.png')" urlhref="{{route('DateUnRespiro')}}" />
                <x-tab-panel-image class="col-7 col-sm-4 col-md-3 my-3 mx-auto" widthBo="w-75"
                    :imageURL="asset('img/Gestion/Logo_Biodiversidad.png')" urlhref="#" />

                <x-tab-panel-image class="col-10 col-sm-4 col-md-3 my-3 mx-auto" widthBo="w-75"
                    :imageURL="asset('img/Gestion/Logo_ManejoJardines.png')" urlhref="#" />

                <x-tab-panel-image class="col-10 col-sm-4 col-md-3 my-3 mx-auto" widthBo="w-75"
                    :imageURL="asset('img/Gestion/Logo_ManejoFauna.png')" urlhref="#" />

            </x-tab-panel-footer>
        </x-tab-panel-content>

        {{--
        Tab correspondiente a PROGRAMA UNIVERSITARIO DE BIODIVERSIDAD.
        --}}
        <x-tab-panel-content class="tab-pane fade show" id="tab-panel-3" role="tabpanel" aria-labelledby="nav-home-tab">
            <x-slider idSlider="s3" titulo="PROGRAMA UNIVERSITARIO DE BIODIVERSIDAD"
                descripcion="Integra el manejo de la flora y fauna de los campus universitarios para que sean congruentes con la ecología del entorno, funcionales, con arquitectura del paisaje que incluya las especies endémicas y que se promueva la interacción, respeto y sana convivencia recreativa y académica. Los jardines universitarios deben basarse en un diseño de acuerdo a las características bioclimáticas de cada región de nuestros campus universitarios. Los huertos urbanos  aportan al sistema ecológico beneficios ambientales como regulación de la temperatura, promoción de la biodiversidad vegetal y de fauna, con especial énfasis en los polinizadores, y el campo de experimentación para estrategias de producción sostenible de hortalizas y una cultura de alimentación sana."
                class="tab-pane fade show" role="tabpanel" aria-labelledby="nav-home-tab">

                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Gestion/biodiversidad1.png')" />
                <x-imagen-slider :linkImagen="asset('img/Gestion/biodiversidad2.png')" />
            </x-slider>
            <x-tab-panel-footer class="row justify-content-between">
                <x-tab-panel-image :imageURL="asset('img/Gestion/Bn_Unihuerto.png')" urlhref="{{route('Unihuerto')}}" />
                <x-tab-panel-image class="col-10 col-sm-5 col-md-3 my-3 mx-auto"
                    :imageURL="asset('img/Gestion/Bn-manejoanimal.png')" urlhref="#" />
                <x-tab-panel-image class="col-7 col-sm-5 col-md-3 my-3 mx-auto"
                    :imageURL="asset('img/Gestion/DATE-UN-RESPIRO.png')" urlhref="{{route('DateUnRespiro')}}" />

            </x-tab-panel-footer>
        </x-tab-panel-content>


        <!--Biblioteca-->
        <!--
        <x-tab-panel-content class="tab-pane fade show" id="tab-panel-5" role="tabpanel" aria-labelledby="nav-home-tab">
            <x-slider idSlider="s5" titulo="BIBLIOTECA"
                descripcion="En esta sección encontraras literatura relacionada a los diferentes programas de la Gestión Institucional de la Agenda Ambiental, de manera que puedas consultar o descargar documentos relacionados a temáticas como: sustancias y materiales regulados, emisiones a la atmosfera, gestión y tecnología del agua, movilidad urbana sostenible, eficiencia energética, espacios habitables, arquitectura del paisaje, bioclimática, manejo de flora y fauna, huertos urbanos y mucho más. "
                class="tab-pane fade show" id="slider5" role="tabpanel" aria-labelledby="nav-home-tab">

                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Gestion/riesgos1.jpg')" />
                <x-imagen-slider :linkImagen="asset('img/Gestion/riesgos2.png')" />
            </x-slider>
            <x-tab-panel-footer class="row justify-content-between">

                <x-tab-panel-image :imageURL="asset('img/Gestion/Bn_biblioteca.png')" isBlank=true
                    urlhref="{{asset('storage/imagenes/introduccion/Guiadelarbolado_y_otrasformasvegetales.pdf')}}" />
            </x-tab-panel-footer>
        </x-tab-panel-content>
        -->
    </x-slot>
</x-tab-panel>

@endsection

{{--
Hace push a la pila de las hojas de estilo, para indicar estilos y color de
los botones del nav-tab
--}}
@push('stylesheets')
<link href="{{ asset('css/nav-pill_Gestion.css') }}" rel="stylesheet" type="text/css">
@endpush


{{--
Hace push a la pila de las hojas de estilo, para indicar estilos y color de
los botones del nav-tab
--}}
@push('scripts')
<script src="{{ asset('js/odsGestion.js') }}"></script>
@endpush
@push('vuescrip')
    <script>
    var app = new Vue({
    el: '#app',
    data: {
    PUE:[],
    PUR:[],
    idPUR:'',
    idPUE:''
  },
  mounted: function () {
  this.$nextTick(function () {
      this.PUE.push({
          "id":1,
        "Nombre":'Lineamientos LED Depto. Mantenimiento.',
        "Url":'https://docs.google.com/viewer?url=https://ambiental.uaslp.mx/SGA/PUE/Lineamientos_LED_Mant_Electrico.pdf&embedded=true',
    });
    this.PUR.push({
        "id":1,
        "Nombre":'Procedimiento para la Disposición del Papel.',
        "Url":'https://docs.google.com/viewer?url=https://ambiental.uaslp.mx/SGA/PUR/PROCD_DISP_PAPEL.pdf&embedded=true',
    });
    this.PUR.push({
        "id":2,
        "Nombre":'Procedimiento para Disposición de Lámparas Fluorescentes.',
        "Url":'https://docs.google.com/viewer?url=https://ambiental.uaslp.mx/SGA/PUR/PROCD_LÁMP_FLUORES.pdf&embedded=true',
    });
    this.PUR.push({
        "id":3,
        "Nombre":'Procedimiento para el Manejo de Residuos Peligrosos.',
        "Url":'https://docs.google.com/viewer?url=https://ambiental.uaslp.mx/SGA/PUR/PROCD_Sust_Mat_Reguladas.pdf&embedded=true',
    });
    this.PUR.push({
        "id":4,
        "Nombre":'Guía de Tratamientos para Residuos Peligrosos.',
        "Url":'https://docs.google.com/viewer?url=https://ambiental.uaslp.mx/SGA/PUR/Guia_tratamiento_RP.pdf&embedded=true',
    });
    this.PUR.push({
        "id":5,
        "Nombre":'Guía para Manejo de RPBI Facultad de Ciencias Químicas.',
        "Url":'https://docs.google.com/viewer?url=https://ambiental.uaslp.mx/SGA/PUR/Guia_Manejo_RPBI_FCQ.pdf&embedded=true',
    });
    this.PUR.push({
        "id":6,
        "Nombre":'Procedimiento para Manejo de Aceite. ',
        "Url":'https://docs.google.com/viewer?url=https://ambiental.uaslp.mx/SGA/PUR/PROCD_ACEITE_UASLP.pdf&embedded=true',
    });
    this.PUR.push({
        "id":7,
        "Nombre":'Procedimiento para Manejo de Tóner. ',
        "Url":'https://docs.google.com/viewer?url=https://ambiental.uaslp.mx/SGA/PUR/PROCD_Tóner.pdf&embedded=true',
    });
    this.PUR.push({
        "id":8,
        "Nombre":' Procedimiento para la disposición correcta de papel post consumo.',
        "Url":'https://docs.google.com/viewer?url=https://ambiental.uaslp.mx/SGA/PUR/PROCD_DISP_PAPEL.pdf&embedded=true',
    });
   
    this.PUR.push({
        "id":9,
        "Nombre":'Procedimiento para Manejo de Pilas',
        "Url":'https://docs.google.com/viewer?url=https://ambiental.uaslp.mx/SGA/PUR/PROCD_PILAS_UASLP.pdf&embedded=true',
    });
    this.PUR.push({
        "id":10,
        "Nombre":'Lineamientos del Proserem',
        "Url":'https://docs.google.com/viewer?url=https://ambiental.uaslp.mx/SGA/PUR/Lineamientos_Proserem.pdf&embedded=true',
    });
    this.PUR.push({
        "id":11,
        "Nombre":'Infografías Proserem',
        "Url":'#',
    });
    
    this.PUR.push({
        "id":12,
        "Nombre":'Infografía Manejo de Aceite',
        "Url":'https://docs.google.com/viewer?url=https://ambiental.uaslp.mx/SGA/PUR/Cartel-Aceite.png&embedded=true',
    });
 
  })
},
})
    </script>
@endpush