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
    <x-ejeTrabajo :titulo="$titulo" :descripcion="$texto" :imagen="'noHayxd.png'">

    </x-ejeTrabajo>
</div>
@endsection
