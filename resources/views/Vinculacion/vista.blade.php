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
        <x-tab-panel-button id="v-pills-boton1" idTabPanelContent="#tab-panel-1" nombre="VINCULACIÓN ESTATAL" class="nav-link active" />
        <x-tab-panel-button id="v-pills-boton2" idTabPanelContent="#tab-panel-2" nombre="VINCULACIÓN NACIONAL" class="nav-link" />
        <x-tab-panel-button id="v-pills-boton3" idTabPanelContent="#tab-panel-3" nombre="VINCULACIÓN INTERNACIONAL" class="nav-link" />
        <x-tab-panel-button id="v-pills-boton4" idTabPanelContent="#tab-panel-4" nombre="VINCULACIÓN Y PROYECTOS" class="nav-link" />
        <x-tab-panel-button id="v-pills-boton5" idTabPanelContent="#tab-panel-5" nombre="VINCULACIÓN INSTITUCIONAL" class="nav-link" />
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
            <x-tab-panel-footer class="row justify-content-between">
            </x-tab-panel-footer>
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
            <x-tab-panel-footer class="row justify-content-between">
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
            <x-tab-panel-footer class="row justify-content-between">
            </x-tab-panel-footer>
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
            <x-tab-panel-footer class="row justify-content-between">
            </x-tab-panel-footer>
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