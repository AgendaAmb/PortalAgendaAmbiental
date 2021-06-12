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
    <x-ejeTrabajo :titulo="$titulo" :descripcion="$texto" :imagen="'noHayxd.png'"/>
</div>

{{-- 
    Tabs de Gestión Institucional.    
--}}
<x-tab-panel>
    {{-- 
        Grupo de botones de los tabs. 
    --}}
    <x-slot name="tabButtons"> 
        <x-tab-panel-button id="v-pills-boton1" idTabPanelContent="#tab-panel-1" nombre="EDUCACIÓN FORMAL" class="nav-link active" />
        <x-tab-panel-button id="v-pills-boton2" idTabPanelContent="#tab-panel-2" nombre="EDUCACIÓN NO FORMAL" class="nav-link" />
    </x-slot>

    <x-slot name="tabContent">

        {{-- 
            Tab correspondiente a EDUCACIÓN FORMAL.
        --}}
        <x-tab-panel-content class="tab-pane fade show active" id="tab-panel-1" role="tabpanel" aria-labelledby="nav-home-tab">
            <x-slider idSlider="s1" 
                        titulo="EDUCACIÓN FORMAL"
                        descripcion="Se refiere a procesos educativos normados que tienen una intención deliberada, que se concretiza en un currículo oficial y se estructura en función de: objetivos, métodos y evaluación. La conclusión del programa académico conduce a la obtención de un certificado. Ejemplos de ello son: diplomados, cursos de actualización y estudios de posgrado."
                        class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-home-tab">
                
                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Educacion/EDUCACION-FORMAL1.png')" />
                <x-imagen-slider :linkImagen="asset('img/Educacion/EDUCACION-FORMAL2.png')" />
            </x-slider>
            <x-tab-panel-footer class="row justify-content-between">
                <x-tab-panel-image class="col-10 col-sm-5 col-md-3 my-3 mx-auto" :imageURL="asset('img/Educacion/pmpca-logo.png')" />
                <x-tab-panel-image class="col-10 col-sm-5 col-md-3 my-3 mx-auto" :imageURL="asset('img/Educacion/imarec-logo.png')" />
            </x-tab-panel-footer>
        </x-tab-panel-content>

        {{-- 
            Tab correspondiente a EDUCACIÓN NO FORMAL.
        --}}
        <x-tab-panel-content class="tab-pane fade show" id="tab-panel-2" role="tabpanel" aria-labelledby="nav-home-tab">
            <x-slider idSlider="s2" 
                        titulo="EDUCACIÓN NO FORMAL" 
                        descripcion="Se da en aquéllos contextos en los que, existiendo una intencionalidad educativa y una planificación de las experiencias de enseñanza-aprendizaje, estas ocurren fuera del ámbito del sistema escolarizado. Ejemplos de ello pueden ser: conferencias, conversatorios, coloquios, simposios, talleres."
                        class="tab-pane fade show" role="tabpanel" aria-labelledby="nav-home-tab" >

                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Educacion/EDUCAION-NOFORMAL.png')" />
            </x-slider>
        </x-tab-panel-content>
    </x-slot>
</x-tab-panel>
@endsection

{{-- 
    Hace push a las hojas de estilo, para indicar el estilo y color de los botones del nav-tab    
--}}
@push('stylesheets')
<link href="{{ asset('css/nav-pill_Educacion.css') }}" rel="stylesheet" type="text/css">
@endpush