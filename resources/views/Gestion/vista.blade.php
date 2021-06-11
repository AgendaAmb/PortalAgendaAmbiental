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
    <x-ejeTrabajo :titulo="$titulo" :descripcion="$texto" :imagen="'noHayxd.png'"/>
</div>
<x-botones-eje-trabajo :contieneImagenes="true">
    <x-slot name="botones">
        <x-boton-eje-trabajo idBoton="v-pills-boton1" nombreBoton="PROGRAMA UNIVERSITARIO DE AGUA" idSlider="slider1" />
        <x-boton-eje-trabajo idBoton="v-pills-boton2" nombreBoton="PROGRAMA UNIVERSITARIO DE ENERGÍA"
            idSlider="slider2" />
        <x-boton-eje-trabajo idBoton="v-pills-boton3" nombreBoton="PROGRAMA UNIVERSITARIO DE BIODIVERSIDAD"
            idSlider="slider3" />
        <x-boton-eje-trabajo idBoton="v-pills-boton4" nombreBoton="PROGRAMA UNIVERSITARIO DE RESIDUOS"
            idSlider="slider4" />
        <x-boton-eje-trabajo idBoton="v-pills-boton5" nombreBoton="PROGRAMA UNIVERSITARIO DE GESTIÓN DE RIESGOS"
            idSlider="slider5" />
    </x-slot>

    <x-slot name="sliders">
        <x-slider idSlider="s1" rutaImagenes="imagenes/sliders/ejes-de-trabajo/gestion/programa-universitario-agua"
            :sliderTabPane="true"
            descripcion="Se encarga del manejo apropiado e integral del agua en todo el quehacer de la UASLP a través de aspectos técnicos de eficiencia y tratamiento, investigación e innovación y comunicación a la comunidad."
            titulo="PROGRAMA UNIVERSITARIO DE AGUA" class="tab-pane fade show active" id="slider1" role="tabpanel"
            aria-labelledby="nav-home-tab" />

        <x-slider idSlider="s2" rutaImagenes="imagenes/sliders/ejes-de-trabajo/gestion/programa-universitario-energia"
            :sliderTabPane="true" descripcion="Implementa el buen uso de la energía
                promoviendo la movilidad urbana sostenible, la eficiencia eléctrica y la
                estrategia para la transición hacia las energías renovables; tomando en
                cuenta las instalaciones, los equipos, la operación, el uso de energías
                renovables y la iluminación eficiente, buscando no causar
                impacto ambiental negativo y cumpliendo con estándares y criterios."
            titulo="PROGRAMA UNIVERSITARIO DE ENERGÍA" class="tab-pane fade show" id="slider2" role="tabpanel"
            aria-labelledby="nav-home-tab" />

        <x-slider idSlider="s3" descripcion="Integra el manejo de la flora y fauna de los campus
         universitarios para que sean congruentes con la ecología del entorno, funcionales, con arquitectura
          del paisaje que incluya las especies endémicas y que se promueva la interacción, respeto y sana
          convivencia recreativa y académica. Los jardines universitarios deben basarse en un diseño de acuerdo
           a las características bioclimáticas de cada región de nuestros campus universitarios. Los huertos urbanos
            aportan al sistema ecológico beneficios ambientales como regulación de la temperatura, promoción de la
            biodiversidad vegetal y de fauna, con especial énfasis en los polinizadores, y el campo de experimentación
        para estrategias de producción sostenible de hortalizas y una cultura de alimentación sana."
            titulo="PROGRAMA UNIVERSITARIO DE BIODIVERSIDAD"
            rutaImagenes="imagenes/sliders/ejes-de-trabajo/gestion/programa-universitario-biodiversidad"
            :sliderTabPane="true" class="tab-pane fade show" id="slider3" role="tabpanel"
            aria-labelledby="nav-home-tab" />

        <x-slider idSlider="s4" rutaImagenes="imagenes/sliders/ejes-de-trabajo/gestion/programa-universitario-residuos"
            :sliderTabPane="true" descripcion="Busca el manejo apropiado de las sustancias y
                materiales reguladas, residuos peligrosos, residuos de manejo especial, residuos sólidos urbanos,
                 emisiones y descargas al aire, agua o suelo que utilizamos en todas las operaciones académicas y
                 administrativas para garantizar la seguridad,
                 salud, prevención de contaminación al ambiente y el cumplimiento legal."
            titulo="PROGRAMA UNIVERSITARIO DE RESIDUOS" class="tab-pane fade show" id="slider4" role="tabpanel"
            aria-labelledby="nav-home-tab" />

        <x-slider idSlider="s5"
            descripcion="Articula acciones, planes y estrategias de prevención para tener mayor seguridad en las instalaciones y operaciones universitarias así como para saber responder ante contingencias."
            titulo="PROGRAMA UNIVERSITARIO DE GESTIÓN DE RIESGO"
            rutaImagenes="imagenes/sliders/ejes-de-trabajo/gestion/programa-universitario-riesgos" :sliderTabPane="true"
            class="tab-pane fade show" id="slider5" role="tabpanel" aria-labelledby="nav-home-tab" />
    </x-slot>
    <x-slot name="parteInferiorSlider">
        <div class="col-10 col-sm-5 col-md-3 my-5 mx-auto">
            <x-imagen :linkImagen="asset('images/Gestion/proserem.png')" :linkRedireccion="route('Proserem')"/>
        </div>
        <div class="col-10 col-sm-6 col-md-3 my-5 mx-auto">
            <x-imagen :linkImagen="asset('images/Gestion/ECR.png')"/>
        </div>
        <div class="col-10 col-sm-6 col-md-3 my-5 mx-auto">
            <x-imagen :linkImagen="asset('images/Gestion/REUTRONIC.png')"/>
        </div>
        <div class="col-10 col-sm-6 col-md-3 my-5 mx-auto">
            <x-imagen :linkImagen="asset('images/Gestion/CAMBALACHE.png')"/>
        </div>
    </x-slot>
</x-botones-eje-trabajo>
@endsection
