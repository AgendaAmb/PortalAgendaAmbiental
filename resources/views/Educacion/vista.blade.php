@extends('Bienvenido')

@php
$titulo = '<strong> ¿Qué hacemos? </strong>';
$texto = 'Mediante este eje, la
Agenda Ambiental de la UASLP busca apoyar
las actividades académicas cotidianas de
aquellos que están interesados en incorporar
o fortalecer la perspectiva ambiental y de
sostenibilidad en los planes y programas de
estudios, a través del diseño y puesta en
práctica de programas específicos de
innovación educativa y producción de
materiales. Además de lo anterior, se
ofrecen programas educativos sobre temas de
ambiente y sostenibilidad para dar respuesta
a las necesidades de capacitación de la
sociedad, a nivel estatal, nacional e
internacional.

<br><br>
De esta manera la Agenda Ambiental
contribuye de manera importante en la
consecución de los rasgos de la visión
definidos en el PIDE 2013-2023,
específicamente en el principio 14
“Perspectiva Ambiental”, en el que se
expresa el interés por parte de la UASLP por
contribuir a la construcción de una cultura
de convivencia con la naturaleza, de
protección del ambiente y al aprovechamiento
sostenible de los recursos naturales,
articulada en todo el quehacer
universitario, específicamente en sus
funciones de docencia, investigación,
gestión y vinculación con la sociedad.';
@endphp

@section('ContenidoPrincipal')
<div class="row justify-content-center my-3">
    <x-o-d-s-wheel/>
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
            <x-slider idSlider="s1" rutaImagenes="imagenes/sliders/ejes-de-trabajo/educacion/educacion-formal"
                :sliderTabPane="true"
                descripcion="Se encarga del manejo apropiado e integral del agua en todo el quehacer de la UASLP a través de aspectos técnicos de eficiencia y tratamiento, investigación e innovación y comunicación a la comunidad."
                titulo="PROGRAMA UNIVERSITARIO DE AGUA" class="tab-pane fade show active" id="slider1" role="tabpanel"
                aria-labelledby="nav-home-tab" />

            <x-slider idSlider="s2" rutaImagenes="imagenes/sliders/ejes-de-trabajo/educación/educacion-no-energia"
                :sliderTabPane="true" descripcion="Implementa el buen uso de la energía
                    promoviendo la movilidad urbana sostenible, la eficiencia eléctrica y la
                    estrategia para la transición hacia las energías renovables; tomando en
                    cuenta las instalaciones, los equipos, la operación, el uso de energías
                    renovables y la iluminación eficiente, buscando no causar
                    impacto ambiental negativo y cumpliendo con estándares y criterios."
                titulo="PROGRAMA UNIVERSITARIO DE ENERGÍA" class="tab-pane fade show" id="slider2" role="tabpanel"
                aria-labelledby="nav-home-tab" />

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
</div>
@endsection
