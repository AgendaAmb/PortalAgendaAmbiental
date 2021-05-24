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
@endsection
