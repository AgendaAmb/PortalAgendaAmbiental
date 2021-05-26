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

<x-botones-eje-trabajo :nRenglones="1" :nColumnas="6" :nPaginas="1">
    <x-slot name="botones">
        <x-boton-eje-trabajo :idBoton="'boton1'" :nombreBoton="'Botón 1'" :idSlider="'slider1'"/>
        <x-boton-eje-trabajo :idBoton="'boton2'" :nombreBoton="'Botón 2'" :idSlider="'slider2'"/>
        <x-boton-eje-trabajo :idBoton="'boton3'" :nombreBoton="'Botón 3'" :idSlider="'slider3'"/>
        <x-boton-eje-trabajo :idBoton="'boton4'" :nombreBoton="'Botón 4'" :idSlider="'slider4'"/>
        <x-boton-eje-trabajo :idBoton="'boton5'" :nombreBoton="'Botón 5'" :idSlider="'slider5'"/>
    </x-slot>
    <x-slot name="sliders">
        <x-slider idSlider="s1" rutaImagenes="imagenes/sliders/ejes-de-trabajo/gestion/programa-universitario-agua"
                :sliderTabPane="true" class="tab-pane fade show active" id="slider1" role="tabpanel"
                aria-labelledby="nav-home-tab"/>

        <x-slider idSlider="s2" rutaImagenes="imagenes/sliders/ejes-de-trabajo/gestion/programa-universitario-biodiversidad"
                :sliderTabPane="true" class="tab-pane fade show active" id="slider2" role="tabpanel"
                aria-labelledby="nav-home-tab"/>

        <x-slider idSlider="s3" rutaImagenes="imagenes/sliders/ejes-de-trabajo/gestion/programa-universitario-energia"
                :sliderTabPane="true" class="tab-pane fade show active" id="slider3" role="tabpanel"
                aria-labelledby="nav-home-tab"/>

        <x-slider idSlider="s4" rutaImagenes="imagenes/sliders/ejes-de-trabajo/gestion/programa-universitario-residuos"
                :sliderTabPane="true" class="tab-pane fade show active" id="slider3" role="tabpanel"
                aria-labelledby="nav-home-tab"/>

        <x-slider idSlider="s5" rutaImagenes="imagenes/sliders/ejes-de-trabajo/gestion/programa-universitario-riesgos"
                :sliderTabPane="true" class="tab-pane fade show active" id="slider3" role="tabpanel"
                aria-labelledby="nav-home-tab"/>
    </x-slot>
</x-botones-eje-trabajo>
@endsection
