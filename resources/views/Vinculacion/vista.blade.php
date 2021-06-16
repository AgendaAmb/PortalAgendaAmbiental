@extends('Bienvenido')

@php
$titulo = '<strong> ¿Qué hacemos? </strong>';
$texto = 'El programa de Vinculación busca incidir positivamente en la comunidad universitaria al interior a través de
la colaboración, gestión y asesoría en temas relacionados en ambiente
y sostenibilidad; al exterior como un agente activo en la generación de conocimiento al servicio de la comunidad desde
una perspectiva compleja, vinculante e integradora en
busca de una sociedad sostenible.

<br><br> Así mismo, se busca la gestión de recursos financieros locales, nacionales e internacionales a través de
acciones concretas de vinculación con entidades gubernamentales,
instituciones públicas y privadas para el desarrollo de proyectos propios que coadyuven en beneficio de las entidades
universitarias.';
@endphp

@section('ContenidoPrincipal')
<div class="row justify-content-center my-3">
    <x-o-d-s-wheel/>
    <x-ejeTrabajo :titulo="$titulo" :descripcion="$texto" :imagen="'noHayxd.png'"/>
</div>

{{--
    Tabs del programa de Vinculación.
--}}
<x-tab-panel>
    {{--
        Grupo de botones de los tabs.
    --}}
    <x-slot name="tabButtons">
        <x-tab-panel-button id="v-pills-boton1" idTabPanelContent="#tab-panel-1" nombre="VINCULACIÓN ESTATAL" class="nav-link active d-lg-flex d-xl-flex d-md-flex d-sm-flex d-none" nombreRes="ESTATAL"/>
        <x-tab-panel-button id="v-pills-boton2" idTabPanelContent="#tab-panel-2" nombre="VINCULACIÓN NACIONAL" class="nav-link d-lg-flex d-xl-flex d-md-flex d-sm-flex d-none" nombreRes="NACIONAL"/>
        <x-tab-panel-button id="v-pills-boton3" idTabPanelContent="#tab-panel-3" nombre="VINCULACIÓN INTERNACIONAL" class="nav-link d-lg-flex d-xl-flex d-md-flex d-sm-flex d-none" nombreRes="INTERNACIONAL"/>
        <x-tab-panel-button id="v-pills-boton4" idTabPanelContent="#tab-panel-4" nombre="VINCULACIÓN Y PROYECTOS" class="nav-link d-lg-flex d-xl-flex d-md-flex d-sm-flex d-none" nombreRes="PROYECTOS"/>
        <x-tab-panel-button id="v-pills-boton5" idTabPanelContent="#tab-panel-5" nombre="VINCULACIÓN INSTITUCIONAL" class="nav-link d-lg-flex d-xl-flex d-md-flex d-sm-flex d-none" nombreRes="INSTITUCIONAL"/>
    </x-slot>

    <x-slot name="tabContent">

        {{--
            Tab correspondiente a VINCULACIÓN ESTATAL.
        --}}
        <x-tab-panel-content class="tab-pane fade show active" id="tab-panel-1" role="tabpanel" aria-labelledby="nav-home-tab">
            <x-slider idSlider="s1"
                        titulo="VINCULACIÓN ESTATAL"
                        descripcion="Buscar colaboraciones con entidades gubernamentales, instituciones públicas y privadas, instituciones académicas y de investigación y organizaciones de la sociedad civil para el desarrollo de proyectos que den continuidad y cumplimiento a las disposiciones de la comunidad universitaria y potosina considerando la gestión socialmente responsable de los recursos."
                        class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-home-tab">

                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Vinculacion/VINCULACION-ESTATAL.png')" />
            </x-slider>
            <x-tab-panel-footer class="row justify-content-center">
                <x-tab-panel-text class="col-12 col-lg-11 my-5 descripcion" text='Entre las colaboraciones actuales están:<br><br>

                <strong> RedCIS Red Ciudadana para la Sostenibilidad de la Zona Metropolitana de San Luis Potosí </strong><br>
                La RED forma una interacción entre ciudadanos de diversas disciplinas y sectores (académica, ONG, gobierno, industria, individual). El objetivo es proponer proyectos integrales que aporten al desarrollo sostenible de la Zona Metropolitana de San Luis Potosí en (ZMSLP), para mantener el bienestar del ser humano y las funciones del ecosistema, tomando en cuenta las opiniones y necesidades de diferentes actores. La RED busca una forma de establecer una comunicación continua con el gobierno, realizar propuestas de proyectos según las competencias y conocimientos de cada actor, identificar los problemas como ciudadanos y proponer soluciones; también estrechar la comunicación entre los diferentes actores para potencializar el impacto de proyectos ejecutados de forma aislada. Cada 2 meses reunión de la RED y cada mes reunión de una comisión.<br><br>

                <strong>Consejo de Administración del Área Natural Protegida "Sitio Sagrado Natural de Wirikuta y la Ruta Histórico Cultural del Pueblo Wixárika"</strong><br>
                La UASLP pertenece desde 2012 a este Consejo junto con autoridades estatales y presidentes municipales, el Insituto del Desarrollo Humano y Social de los Pueblos Indígenas, la Comisión Nacional para el Desarrollo de los Pueblos Indígenas. El objetivo de este Consejo y la Secretaría de Desarrollo Agropecuario y Recursos Hidráulicos. Se busca coadyuvar en este esfuerzo para armonizar el desarrollo de la Ruta Histórico Cultural del Pueblo Wixárika. ' />
            </x-tab-panel-footer>
        </x-tab-panel-content>

        {{--
            Tab correspondiente a VINCULACIÓN NACIONAL.
        --}}
        <x-tab-panel-content class="tab-pane fade show" id="tab-panel-2" role="tabpanel" aria-labelledby="nav-home-tab">
            <x-slider idSlider="s2"
                        titulo="VINCULACIÓN NACIONAL"
                        descripcion="Consorcio Mexicano de Programas Ambientales Universitarios para el Desarrollo Sustentable. Convenio de colaboración que firman la Universidad de Ciencias y Artes de Chiapas, Universidad Intercultural Indígena de Michoacán, Universidad de Guadalajara y Universidad de Guanajuato. Reunión anual."
                        class="tab-pane fade show" role="tabpanel" aria-labelledby="nav-home-tab" >

                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Vinculacion/VINCULACION-NACIONAL.png')" />
            </x-slider>
        </x-tab-panel-content>

        {{--
            Tab correspondiente a VINCULACIÓN INTERNACIONAL.
        --}}
        <x-tab-panel-content class="tab-pane fade show" id="tab-panel-3" role="tabpanel" aria-labelledby="nav-home-tab">
            <x-slider idSlider="s3"
                        titulo="VINCULACIÓN INTERNACIONAL"
                        descripcion="El The Centers for Natural Resources and Development (CNRD, por sus siglas en inglés) es una red global de instituciones de educación superior que promueve el intercambio académico y la cooperación en el área de gestión de recursos naturales (NRM), en particular en relación con el agua, la tierra, el ecosistema y los recursos de energía renovable."
                        class="tab-pane fade show" role="tabpanel" aria-labelledby="nav-home-tab" >

                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Vinculacion/VINCULACION-INTERNACIONAL.png')" />
            </x-slider>
            <x-tab-panel-footer class="row justify-content-center">
                <x-tab-panel-text class="col-12 col-lg-11 my-5" text='
                <strong>Centers for Natural Resources and Development (CNRD)</strong><br>
                El CNRD se basa en un enfoqueinterdisciplinario e internacional, que vincula a socios de diferentes regiones y diferentes antecedentes profesionales. Se realiza una reunión cada año con los integrantes de la red y se lanza convocatoria para becas semestralmente que incluye el pago de boletos de avión y visa para Alemania.<br><br>

                Entre las colaboraciones actuales se tiene:<br><br>

                <strong>CUMMINS, La Pila: Modelo de sostenibilidad para la gobernanza de comunidades vulnerables </strong><br>
                El proyecto obedece a la inquietud de la UASLP por llevar fuera de los muros de la universidad estrategias, experiencias y aprendizajes que permitan a las comunidades vulnerables hacer uso eficiente de sus recursos naturales, cambiar hábitos, comportamientos, estilos de vida y con ello, en el mediano plazo, mejorar sus niveles de bienestar. El objetivo del proyecto es que, a través de procesos y metodologías participativas la comunidad diseñe y construya un conjunto de ecotécnicas que le permitan dar solución a algunas de las principales problemáticas identificadas; paralelamente se guía a la comunidad escolar, por medio de la impartición de talleres, para que puedan desarrollar habilidades de autogestión, competencias para la práctica docente, habilidades para mejorar las capacidades cognitivas de los niños, planes para mejorar hábitos alimenticios, estilos de vida y con ello alcancen mejores niveles de bienestar. ' />
            </x-tab-panel-footer>
        </x-tab-panel-content>

        {{--
            Tab correspondiente a VINCULACIÓN Y PROYECTOS.
        --}}
        <x-tab-panel-content class="tab-pane fade show" id="tab-panel-4" role="tabpanel" aria-labelledby="nav-home-tab">
            <x-slider idSlider="s4"
                    titulo="VINCULACIÓN Y PROYECTOS"
                    descripcion="Colaboramos con entidades gubernamentales, instituciones públicas y privadas, instituciones académicas y de investigación y organizaciones de la sociedad civil, para el desarrollo de proyectos que den continuidad y cumplimiento a las disposiciones de la comunidad universitaria y potosina considerando la gestión socialmente responsable de los recursos. Así mismo, para el óptimo desarrollo colaborativo realizamos la gestión necesaria para la obtención de recursos financieros locales, nacionales e internacionales. "
                    class="tab-pane fade show" role="tabpanel" aria-labelledby="nav-home-tab">

                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Vinculacion/VINCULACION-LOCAL.png')" />
            </x-slider>
        </x-tab-panel-content>

        {{--
            Tab correspondiente a VINCULACIÓN INSTITUCIONAL.
        --}}
        <x-tab-panel-content class="tab-pane fade show" id="tab-panel-5" role="tabpanel" aria-labelledby="nav-home-tab">
            <x-slider idSlider="s5"
                        titulo="VINCULACIÓN INSTITUCIONAL"
                        descripcion="Fortalecer la infraestructura de comunicación procurando la incorporación de las tecnologías más modernas para satisfacer las necesidades de las áreas de docencia, investigación, administración y gestión. "
                        class="tab-pane fade show" id="slider5" role="tabpanel" aria-labelledby="nav-home-tab">


                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Vinculacion/VINCULACION-INSTITUCIONAL.png')" />
            </x-slider>
        </x-tab-panel-content>
    </x-slot>
</x-tab-panel>
@endsection

{{--
    Hace push a las hojas de estilo, para indicar el estilo y color de los botones del nav-tab
--}}
@push('stylesheets')
<link href="{{ asset('css/nav-pill_Vinculacion.css') }}" rel="stylesheet" type="text/css">
@endpush

{{--
    Hace push a la pila de las hojas de estilo, para indicar estilos y color de
    los botones del nav-tab
--}}
@push('scripts')
<script src="{{ asset('js/odsVinculacion.js') }}"></script>
<script>

    window.addEventListener("resize", function(){
        $(function() 
      {
        if (screen.width > 10 && screen.width <575) {
      
       $('#v-pills-tab').removeClass('nav-pills');
       $('#v-pills-tab').addClass('nav-tabs');
       
    
    
     }else if(screen.width >575){
       $('#v-pills-tab').removeClass('nav-tabs');
        $('#v-pills-tab').addClass('nav-pills');
     }
      });
    });
    
    $(function() 
      {
        if (screen.width > 10 && screen.width <575) {
      
       $('#v-pills-tab').removeClass('nav-pills');
       $('#v-pills-tab').addClass('nav-tabs');
     
      
    
     }else if(screen.width >575){
       $('#v-pills-tab').removeClass('nav-tabs');
        $('#v-pills-tab').addClass('nav-pills');
     }
    });
    
       
    
        
    </script>
@endpush
