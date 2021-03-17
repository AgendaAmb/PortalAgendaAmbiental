@extends('Bienvenido')

@php
$titulo = '<strong> ¿Qué hacemos? </strong>';
$texto = 'El área de
Comunicación difunde
y visibiliza las
acciones que la
Universidad
implementa para
mejorar de forma
continua la
sostenibilidad en
todas las acciones
sustantivas; para
ello se basa en
estrategias de
comunicación que
buscan fortalecer la
cooperación entre la
comunidad
universitaria y la
sociedad.

Difunde los
programas
universitarios
dentro de la
Universidad y la
oferta educativa de
cursos, talleres,
diplomados, foros,
entre otros, con la
sociedad.

<br><br>
Promociona la oferta
académica y los
alcances logrados de
sus estudiantes y
egresados a través
de sus proyectos de
investigación.
Promueve la
participación de la
comunidad científica
en materia de
educación ambiental
a través de la
Revista Mexicana de
Educación Ambiental
Jandiekua.

Desde la perspectiva
de los Derechos
Humanos y la
responsabilidad
social, genera
contenidos propios
para que a través de
nuestras acciones,
logremos que la
sostenibilidad sea
parte de la vida
universitaria.
';
@endphp

@section('ContenidoPrincipal')
<div class="row justify-content-center my-3">
    <div class="col-md-4">

    </div>
    <div class="col-md-7">
        <x-ejeTrabajo :titulo="$titulo" :descripcion="$texto" :imagen="'noHayxd.png'">

        </x-ejeTrabajo>
    </div>
</div>
@endsection