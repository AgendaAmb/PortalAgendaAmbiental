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
    </x-slot>
</x-botones-eje-trabajo>
@endsection
