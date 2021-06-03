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
<div class="row justify-content-center my-3">
    <x-o-d-s-wheel/>
    <x-ejeTrabajo :titulo="$titulo"
                    :descripcion="$texto"
                    :imagen="'noHayxd.png'">

    </x-ejeTrabajo>
</div>


<!--
<div class="nav flex-sm-column flex-shrink-0 justify-content-between nav-pills" id="tab-nosotros" role="tablist" >
    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#Historia" role="tab" aria-controls="v-pills-home" aria-selected="true" >HISTORIA</a>
    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#QUIENESSOMOS" role="tab" aria-controls="v-pills-profile" aria-selected="false">¿QUIENES SOMOS?</a>
    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#Normativa" role="tab" aria-controls="v-pills-messages" aria-selected="false">NORMATIVA</a>
    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#MISION" role="tab" aria-controls="v-pills-settings" aria-selected="false">MISIÓN Y VISIÓN</a>
    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#DIRECTORIO" role="tab" aria-controls="v-pills-settings" aria-selected="false">DIRECTORIO</a>
    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#CONTACTO" role="tab" aria-controls="v-pills-settings" aria-selected="false">CONTACTO</a>
</div>
-->

<x-botones-eje-trabajo :nRenglones="1" :nColumnas="6" :nPaginas="1">
    <x-slot name="botones">
        <x-boton-eje-trabajo idBoton="boton1" nombreBoton="PROGRAMA UNIVERSITARIO DE AGUA" idSlider="slider1"/>
        <x-boton-eje-trabajo idBoton="boton2" nombreBoton="PROGRAMA UNIVERSITARIO DE ENERGÍA" idSlider="slider2"/>
        <x-boton-eje-trabajo idBoton="boton3" nombreBoton="PROGRAMA UNIVERSITARIO DE BIODIVERSIDAD" idSlider="slider3"/>
        <x-boton-eje-trabajo idBoton="boton4" nombreBoton="PROGRAMA UNIVERSITARIO DE RESIDUOS" idSlider="slider4"/>
        <x-boton-eje-trabajo idBoton="boton5" nombreBoton="PROGRAMA UNIVERSITARIO DE GESTIÓN DE RIESGOS" idSlider="slider5"/>
    </x-slot>
    <x-slot name="sliders">
        <x-slider idSlider="s1" rutaImagenes="imagenes/sliders/ejes-de-trabajo/gestion/programa-universitario-agua"
                :sliderTabPane="true" class="tab-pane fade show active" id="slider1" role="tabpanel"
                aria-labelledby="nav-home-tab"/>

        <x-slider idSlider="s2" rutaImagenes="imagenes/sliders/ejes-de-trabajo/gestion/programa-universitario-energia"
                :sliderTabPane="true" class="tab-pane fade show" id="slider2" role="tabpanel"
                aria-labelledby="nav-home-tab"/>

        <x-slider idSlider="s3" rutaImagenes="imagenes/sliders/ejes-de-trabajo/gestion/programa-universitario-biodiversidad"
                :sliderTabPane="true" class="tab-pane fade show" id="slider3" role="tabpanel"
                aria-labelledby="nav-home-tab"/>

        <x-slider idSlider="s4" rutaImagenes="imagenes/sliders/ejes-de-trabajo/gestion/programa-universitario-residuos"
                :sliderTabPane="true" class="tab-pane fade show" id="slider4" role="tabpanel"
                aria-labelledby="nav-home-tab"/>

        <x-slider idSlider="s5" rutaImagenes="imagenes/sliders/ejes-de-trabajo/gestion/programa-universitario-riesgos"
                :sliderTabPane="true" class="tab-pane fade show" id="slider5" role="tabpanel"
                aria-labelledby="nav-home-tab"/>
    </x-slot>
</x-botones-eje-trabajo>
@endsection
