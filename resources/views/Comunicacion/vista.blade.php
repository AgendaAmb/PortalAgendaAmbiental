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
/*
// Establece la zona horaria
\Carbon\Carbon::setLocale('es-mx');

// Obtiene el intervalo de meses, entre la fecha de inicio de los eventos y la
// fecha del día de hoy.
$monthPeriod = \Carbon\CarbonPeriod::create('2019-01-01', \Carbon\Carbon::now())->month();

// Crea un arreglo, para almacenar los meses del intervalo establecido.
$months = [];

// Mapea los meses del intervalo en un arreglo.
foreach ($monthPeriod as $month){
    $date = \Carbon\Carbon::parse($month);
    $date = strtoupper($date->monthName);
    $months[] = $date;
}*/
@endphp

@section('ContenidoPrincipal')
<div class="row justify-content-center my-3">
    <x-o-d-s-wheel/>
    <x-ejeTrabajo :titulo="$titulo" :descripcion="$texto" :imagen="'noHayxd.png'">

    </x-ejeTrabajo>
</div>

{{-- 
    Tabs del programa de Comunicación.    
--}}
<x-tab-panel>
    {{-- 
        Grupo de botones de los tabs. 
    
    --}}
    <x-slot name="tabButtons"> 
    </x-slot>

</x-tab-panel>
@endsection
