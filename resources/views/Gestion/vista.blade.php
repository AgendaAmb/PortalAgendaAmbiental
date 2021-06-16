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

<x-tab-panel>
    {{--
        Grupo de botones de los tabs.
    --}}
    <x-slot name="tabButtons">
        <x-tab-panel-button id="v-pills-boton4" idTabPanelContent="#tab-panel-4"
            nombre="PROGRAMA UNIVERSITARIO DE RESIDUOS" nombreRes="RESIDUOS" class="nav-link active d-lg-flex d-xl-flex d-md-flex d-sm-flex d-none " />
        <x-tab-panel-button id="v-pills-boton1" idTabPanelContent="#tab-panel-1" nombre="PROGRAMA UNIVERSITARIO DE AGUA" nombreRes="AGUA"
            class="nav-link active d-lg-flex d-xl-flex d-md-flex d-sm-flex d-none" />
        <x-tab-panel-button id="v-pills-boton2" idTabPanelContent="#tab-panel-2"
            nombre="PROGRAMA UNIVERSITARIO DE ENERGÍA"  nombreRes="ENERGÍA" class="nav-link d-lg-flex d-xl-flex d-md-flex d-sm-flex d-none" />
        <x-tab-panel-button id="v-pills-boton3" nombreRes="BIODIVERSIDAD" idTabPanelContent="#tab-panel-3"
            nombre="PROGRAMA UNIVERSITARIO DE BIODIVERSIDAD" class="nav-link d-lg-flex d-xl-flex d-md-flex d-sm-flex d-none" />
        <x-tab-panel-button id="v-pills-boton5" idTabPanelContent="#tab-panel-5" nombre="BLIBLIOTECA"
            class="nav-link d-lg-flex d-xl-flex d-md-flex d-sm-flex d-none" nombreRes="BLIBLIOTECA" />
    </x-slot>

    <x-slot name="tabContent">
        {{--
            Tab correspondiente a PROGRAMA UNIVERSITARIO DE AGUA.
        --}}
        <x-tab-panel-content class="tab-pane fade show active" id="tab-panel-1" role="tabpanel"
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

                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Gestion/energia1.png')" />
                <x-imagen-slider :linkImagen="asset('img/Gestion/energia2.png')" />
            </x-slider>
            <x-tab-panel-footer class="row justify-content-between">
                <x-tab-panel-image class="col-10 col-sm-5 col-md-3 my-3 mx-auto"
                    :imageURL="asset('img/Gestion/UNIBICI.png')" urlhref="{{route('Unibici')}}" />
                <x-tab-panel-image class="col-10 col-sm-5 col-md-3 my-3 mx-auto"
                    :imageURL="asset('img/Gestion/AUTO-COMPARTIDO.png')" />
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
                <x-tab-panel-image class="col-10 col-sm-5 col-md-3 my-3 mx-auto"
                    :imageURL="asset('img/Gestion/Bn_Unihuerto.png')" urlhref="{{route('Unihuerto')}}" />
                <x-tab-panel-image class="col-10 col-sm-5 col-md-3 my-3 mx-auto"
                    :imageURL="asset('img/Gestion/Bn-manejoanimal.png')" />
                <x-tab-panel-image class="col-7 col-sm-5 col-md-3 my-3 mx-auto w-75"
                    :imageURL="asset('img/Gestion/DATE-UN-RESPIRO.png')" urlhref="{{route('DateUnRespiro')}}" />

            </x-tab-panel-footer>
        </x-tab-panel-content>

        {{--
            Tab correspondiente a PROGRAMA UNIVERSITARIO DE RESIDUOS.
        --}}
        <x-tab-panel-content class="tab-pane fade show" id="tab-panel-4" role="tabpanel" aria-labelledby="nav-home-tab">
            <x-slider idSlider="s4" titulo="PROGRAMA UNIVERSITARIO DE RESIDUOS"
                descripcion="Busca el manejo apropiado de las sustancias y materiales reguladas, residuos peligrosos, residuos de manejo especial, residuos sólidos urbanos, emisiones y descargas al aire, agua o suelo que utilizamos en todas las operaciones académicas y administrativas para garantizar la seguridad, salud, prevención de contaminación al ambiente y el cumplimiento legal."
                class="tab-pane fade show" role="tabpanel" aria-labelledby="nav-home-tab">

                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Gestion/residuos1.png')" />
                <x-imagen-slider :linkImagen="asset('img/Gestion/residuos2.png')" />
            </x-slider>
            <x-tab-panel-footer class="row justify-content-between">
                <x-tab-panel-image class="col-7 col-sm-5 col-md-3 my-3 mx-auto"
                    :imageURL="asset('img/Gestion/proserem.png')" urlhref="{{route('Proserem')}}" />
                <!-- <x-tab-panel-image class="col-10 col-sm-5 col-md-3 my-3 mx-auto" :imageURL="asset('img/Gestion/ECR.png')" urlhref="{{route('ConsumoResponsable')}}"  />
                <x-tab-panel-image class="col-10 col-sm-5 col-md-3 my-3 mx-auto" :imageURL="asset('img/Gestion/REUTRONIC.png')" />
                <x-tab-panel-image class="col-10 col-sm-5 col-md-3 my-3 mx-auto" :imageURL="asset('img/Gestion/CAMBALACHE.png')" />-->
                <x-tab-panel-image class="col-7 col-sm-5 col-md-3 my-3 mx-auto  "
                    :imageURL="asset('img/Gestion/ESPACIOS-LIBRES-DE-HUMO.png')" />

            </x-tab-panel-footer>
        </x-tab-panel-content>

        {{--
            Tab correspondiente a PROGRAMA UNIVERSITARIO DE GESTIÓN DE RIESGOS.
        --}}
        <x-tab-panel-content class="tab-pane fade show" id="tab-panel-5" role="tabpanel" aria-labelledby="nav-home-tab">
            <x-slider idSlider="s5" titulo="PROGRAMA UNIVERSITARIO DE GESTIÓN DE RIESGO"
                descripcion="Articula acciones, planes y estrategias de prevención para tener mayor seguridad en las instalaciones y operaciones universitarias así como para saber responder ante contingencias."
                class="tab-pane fade show" id="slider5" role="tabpanel" aria-labelledby="nav-home-tab">

                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Gestion/riesgos1.jpg')" />
                <x-imagen-slider :linkImagen="asset('img/Gestion/riesgos2.png')" />
            </x-slider>
            <x-tab-panel-footer class="row justify-content-between">
                <x-tab-panel-image class="col-7 col-sm-5 col-md-3 my-3 mx-auto"
                    :imageURL="asset('img/Gestion/Bn_biblioteca.png')" />

            </x-tab-panel-footer>
        </x-tab-panel-content>
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