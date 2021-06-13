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
    <x-o-d-s-wheel />
    <x-ejeTrabajo :titulo="$titulo" :descripcion="$texto" :imagen="'noHayxd.png'">

    </x-ejeTrabajo>
</div>

{{-- 
    Tabs del programa de Comunicación.    
--}}


<div class="elementor-widget-container">
    <div class="row" style="margin-left: 38px !important;">
        <div id="hide-me" style="padding: 35px 0">
            <a id="left" href="#multi-item-example" data-slide="prev">
                <i class="iconos fas fa-angle-left"></i>
            </a>
        </div>

        <div id="multi-item-example" class="carousel slide carousel-multi-item col-11 pointer-event"
            data-ride="carousel" data-interval="false">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                   
                        <nav class="nav flex-row nav-pills" id="v-pills-tab" role="tablist">
                            <a class="nav-link active"id="enero2-tab" data-toggle="pill"href="#enero2"
                                role="tab" aria-controls="v-pills-boton1" aria-selected="true">
                               Enero
                            </a>
                            <a class="nav-link" id="v-pills-boton2-tab" data-toggle="pill" href="#febrero2"
                                role="tab" aria-controls="v-pills-boton2" aria-selected="true">
                               Febrero
                            </a>
                            <a class="nav-link" id="v-pills-boton3-tab" data-toggle="pill" href="#marzo2"
                                role="tab" aria-controls="v-pills-boton3" aria-selected="true">
                                Marzo
                            </a>
                            <a class="nav-link" id="v-pills-boton4-tab" data-toggle="pill" href="#abril2"
                                role="tab" aria-controls="v-pills-boton4" aria-selected="true">
                                Abril
                            </a>
                            <a class="nav-link" id="v-pills-boton5-tab" data-toggle="pill" href="#mayo2"
                                role="tab" aria-controls="v-pills-boton5" aria-selected="true">
                               Mayo
                            </a>
                            <a class="nav-link" id="v-pills-boton6-tab" data-toggle="pill" href="#junio2"
                                role="tab" aria-controls="v-pills-boton5" aria-selected="true">
                              Junio
                            </a>
                            <a class="nav-link" id="v-pills-boton7-tab" data-toggle="pill" href="#julio2"
                                role="tab" aria-controls="v-pills-boton5" aria-selected="true">
                            Julio
                            </a>
                            <a class="nav-link" id="v-pills-boton8-tab" data-toggle="pill" href="#agosto2"
                                role="tab" aria-controls="v-pills-boton5" aria-selected="true">
                               Agosto
                            </a>
                            <a class="nav-link" id="v-pills-boton9-tab" data-toggle="pill" href="#septiembre2"
                                role="tab" aria-controls="v-pills-boton5" aria-selected="true">
                               Septiembre
                            </a>
                            <a class="nav-link" id="v-pills-boton5-tab" data-toggle="pill" href="#octubre2"
                                role="tab" aria-controls="v-pills-boton5" aria-selected="true">
                               Octubre
                            </a>
                            <a class="nav-link" id="v-pills-boton10-tab" data-toggle="pill" href="#noviembre2"
                                role="tab" aria-controls="v-pills-boton5" aria-selected="true">
                               Noviembre
                            </a>
                            <a class="nav-link" id="v-pills-boton11-tab" data-toggle="pill" href="#diciembre2"
                                role="tab" aria-controls="v-pills-boton5" aria-selected="true">
                               Diciembre
                            </a>
                        </nav>
                       
                       
                    
                    <h3>2021</h3>
                </div>
                <div class="carousel-item mx-1">
                    <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="enero-tab" data-toggle="tab" href="#enero" role="tab"
                                aria-controls="enero" aria-selected="false" style="padding:10px 0">
                                <img id="ene" src="../../wp-content/uploads/2020/05/ENERO-NARANJA.png" class="boton1"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="febrero-tab" data-toggle="tab" href="#febrero" role="tab"
                                aria-controls="febrero" aria-selected="false" style="padding:10px 6px">
                                <img id="feb" src="../../wp-content/uploads/2020/05/febrero-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="marzo-tab" data-toggle="tab" href="#marzo" role="tab"
                                aria-controls="marzo" aria-selected="false" style="padding:10px 0">
                                <img id="mar" src="../../wp-content/uploads/2020/05/marzo-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="abril-tab" data-toggle="tab" href="#abril" role="tab"
                                aria-controls="abril" aria-selected="false" style="padding:10px 6px">
                                <img id="abr" src="../../wp-content/uploads/2020/05/abril-naranja.png" class="boton1"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="mayo-tab" data-toggle="tab" href="#mayo" role="tab"
                                aria-controls="mayo" aria-selected="false" style="padding:10px 0">
                                <img id="may" src="../../wp-content/uploads/2020/05/mayo-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="junio-tab" data-toggle="tab" href="#junio" role="tab"
                                aria-controls="junio" aria-selected="false" style="padding:10px 6px">
                                <img id="jun" src="../../wp-content/uploads/2020/05/junio-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="julio-tab" data-toggle="tab" href="#julio" role="tab"
                                aria-controls="julio" aria-selected="false" style="padding:10px 0">
                                <img id="jul" src="../../wp-content/uploads/2020/05/julio-naranja.png" class="boton1"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="agosto-tab" data-toggle="tab" href="#agosto" role="tab"
                                aria-controls="agosto" aria-selected="false" style="padding:10px 6px">
                                <img id="ago" src="../../wp-content/uploads/2020/05/agosto-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="septiembre-tab" data-toggle="tab" href="#septiembre" role="tab"
                                aria-controls="septiembre" aria-selected="false" style="padding:10px 0">
                                <img id="sep" src="../../wp-content/uploads/2020/05/septiembre-naranja.png"
                                    class="boton" width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="octubre-tab" data-toggle="tab" href="#octubre" role="tab"
                                aria-controls="octubre" aria-selected="false" style="padding:10px 6px">
                                <img id="oct" src="../../wp-content/uploads/2020/05/Octubre-naranja.png" class="boton1"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="noviembre-tab" data-toggle="tab" href="#noviembre" role="tab"
                                aria-controls="noviembre" aria-selected="false" style="padding:10px 0">
                                <img id="nov" src="../../wp-content/uploads/2020/05/noviembre-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="diciembre-tab" data-toggle="tab" href="#diciembre" role="tab"
                                aria-controls="diciembre" aria-selected="false" style="padding:10px 6px">
                                <img id="dic" src="../../wp-content/uploads/2020/05/diciembre-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                    </ul>
                    <h3>2020</h3>
                </div>
                <div class="carousel-item">
                    <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="enero1-tab" data-toggle="tab" href="#enero1" role="tab"
                                aria-controls="enero1" aria-selected="true" style="padding:10px 0">
                                <img id="ene" src="../../wp-content/uploads/2020/05/ENERO-NARANJA.png" class="boton1"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="febrero1-tab" data-toggle="tab" href="#febrero1" role="tab"
                                aria-controls="febrero1" aria-selected="false" style="padding:10px 6px">
                                <img id="feb" src="../../wp-content/uploads/2020/05/febrero-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="marzo1-tab" data-toggle="tab" href="#marzo1" role="tab"
                                aria-controls="marzo1" aria-selected="false" style="padding:10px 0">
                                <img id="mar" src="../../wp-content/uploads/2020/05/marzo-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="abril1-tab" data-toggle="tab" href="#abril1" role="tab"
                                aria-controls="abril1" aria-selected="false" style="padding:10px 6px">
                                <img id="abr" src="../../wp-content/uploads/2020/05/abril-naranja.png" class="boton1"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="mayo1-tab" data-toggle="tab" href="#mayo1" role="tab"
                                aria-controls="mayo1" aria-selected="false" style="padding:10px 0">
                                <img id="may" src="../../wp-content/uploads/2020/05/mayo-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="junio1-tab" data-toggle="tab" href="#junio1" role="tab"
                                aria-controls="junio1" aria-selected="false" style="padding:10px 6px">
                                <img id="jun" src="../../wp-content/uploads/2020/05/junio-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="julio1-tab" data-toggle="tab" href="#julio1" role="tab"
                                aria-controls="julio1" aria-selected="true" style="padding:10px 0">
                                <img id="jul" src="../../wp-content/uploads/2020/05/julio-naranja.png" class="boton1"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="agosto1-tab" data-toggle="tab" href="#agosto1" role="tab"
                                aria-controls="agosto1" aria-selected="false" style="padding:10px 6px">
                                <img id="ago" src="../../wp-content/uploads/2020/05/agosto-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="septiembre1-tab" dat="" a-toggle="tab" href="#septiembre1"
                                role="tab" ar="" ia-controls="septiembre1" aria-selecte="" d="false"
                                style="padding:10px 0">
                                <img id="sep" src="../../wp-content/uploads/2020/05/septiembre-naranja.png"
                                    class="boton" width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="octubre1-tab" data-toggle="tab" href="#octubre1" role="tab"
                                aria-controls="octubre1" aria-selected="true" style="padding:10px 6px">
                                <img id="oct" src="../../wp-content/uploads/2020/05/octubre-naranja.png" class="boton1"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="noviembre1-tab" data-toggle="tab" href="#noviembre1" role="tab"
                                aria-controls="noviembre1" aria-selected="false" style="padding:10px 0">
                                <img id="nov" src="../../wp-content/uploads/2020/05/noviembre-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="diciembre1-tab" data-toggle="tab" href="#diciembre1" role="tab"
                                aria-controls="diciembre1" aria-selected="false" style="padding:10px 6px">
                                <img id="dic" src="../../wp-content/uploads/2020/05/diciembre-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                    </ul>
                    <h3>2019</h3>
                </div>
                <div class="carousel-item" style="margin-rigth:0; margin-left:0">
                    <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="enero-tab" data-toggle="tab" href="#enero" role="tab"
                                aria-controls="enero" aria-selected="false" style="padding:10px 0">
                                <img id="ene" src="../../wp-content/uploads/2020/05/ENERO-NARANJA.png" class="boton1"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="febrero-tab" data-toggle="tab" href="#febrero" role="tab"
                                aria-controls="febrero" aria-selected="false" style="padding:10px 6px">
                                <img id="feb" src="../../wp-content/uploads/2020/05/febrero-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="marzo-tab" data-toggle="tab" href="#marzo" role="tab"
                                aria-controls="marzo" aria-selected="false" style="padding:10px 0">
                                <img id="mar" src="../../wp-content/uploads/2020/05/marzo-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="abril-tab" data-toggle="tab" href="#abril" role="tab"
                                aria-controls="abril" aria-selected="false" style="padding:10px 6px">
                                <img id="abr" src="../../wp-content/uploads/2020/05/abril-naranja.png" class="boton1"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="mayo-tab" data-toggle="tab" href="#mayo" role="tab"
                                aria-controls="mayo" aria-selected="false" style="padding:10px 0">
                                <img id="may" src="../../wp-content/uploads/2020/05/mayo-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="junio-tab" data-toggle="tab" href="#junio" role="tab"
                                aria-controls="junio" aria-selected="false" style="padding:10px 6px">
                                <img id="jun" src="../../wp-content/uploads/2020/05/junio-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="julio-tab" data-toggle="tab" href="#julio" role="tab"
                                aria-controls="julio" aria-selected="false" style="padding:10px 0">
                                <img id="jul" src="../../wp-content/uploads/2020/05/julio-naranja.png" class="boton1"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="agosto-tab" data-toggle="tab" href="#agosto" role="tab"
                                aria-controls="agosto" aria-selected="false" style="padding:10px 6px">
                                <img id="ago" src="../../wp-content/uploads/2020/05/agosto-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="septiembre-tab" data-toggle="tab" href="#septiembre" role="tab"
                                aria-controls="septiembre" aria-selected="false" style="padding:10px 0">
                                <img id="sep" src="../../wp-content/uploads/2020/05/septiembre-naranja.png"
                                    class="boton" width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="octubre-tab" data-toggle="tab" href="#octubre" role="tab"
                                aria-controls="octubre" aria-selected="false" style="padding:10px 6px">
                                <img id="oct" src="../../wp-content/uploads/2020/05/Octubre-naranja.png" class="boton1"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="noviembre-tab" data-toggle="tab" href="#noviembre" role="tab"
                                aria-controls="noviembre" aria-selected="false" style="padding:10px 0">
                                <img id="nov" src="../../wp-content/uploads/2020/05/noviembre-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="diciembre-tab" data-toggle="tab" href="#diciembre" role="tab"
                                aria-controls="diciembre" aria-selected="false" style="padding:10px 6px">
                                <img id="dic" src="../../wp-content/uploads/2020/05/diciembre-naranja.png" class="boton"
                                    width="155px">
                            </a>
                        </li>
                    </ul>
                    <h3>2020</h3>
                </div>
            </div>
        </div>
        <div id="obj2" style="padding: 35px 0">
            <a id="right" href="#multi-item-example" data-slide="next">
                <i class="iconos2 fas fa-angle-right"></i>
            </a>
        </div>
    </div>
    <div class="row tab-content ml-2" id="myTabContent">
        <div class="tab-pane fade show active " id="marzo2" role="tabpanel" aria-labelledby="marzo2-tab">
            <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="../cineminuto/index.html"><img class="d-block w-100"
                                src="../../wp-content/uploads/2020/09/B_Cineminuto.png" alt="First slide"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade " id="febrero2" role="tabpanel" aria-labelledby="febrero2-tab">
            <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="{{route('FotografiaS')}}">
                          
                            <img class="d-block w-100"
                        src="{{asset('storage/imagenes/ConcursoFotografia/B_ConcursoFotografia.png')}}" alt="First slide"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade " id="enero2" role="tabpanel" aria-labelledby="enero2-tab">
            <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="{{route('Unihuerto')}}">
                            <img class="d-block w-100" src="{{asset('storage/imagenes/Unihuerto/BI_UnihuertoenCasa.png')}}"
                            alt="Unihuerto en casa">

                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade " id="enero" role="tabpanel" aria-labelledby="enero-tab">
            <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="../../wp-content/uploads/2020/07/enero1.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../wp-content/uploads/2020/07/enero2.jpg" alt="First slide">
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="febrero" role="tabpanel" aria-labelledby="febrero-tab">
            <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="../../wp-content/uploads/2020/07/febrero1.png"
                            alt="First slide">
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="marzo" role="tabpanel" aria-labelledby="marzo-tab">
            <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../../wp-content/uploads/2020/07/marzo1.jpg" alt="First slide">
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade ml-2" id="abril" role="tabpanel" aria-labelledby="abril-tab">
            <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="../conferencias/index.html"><img class="d-block w-100"
                                src="../../wp-content/uploads/2020/07/abril1.png" alt="First slide"></a>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../wp-content/uploads/2020/07/abril2.png" alt="First slide">
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="mayo" role="tabpanel" aria-labelledby="mayo-tab">
            <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="../conferencias/index.html"><img class="d-block w-100"
                                src="../../wp-content/uploads/2020/07/mayo1.png" alt="First slide"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade ml-2" id="junio" role="tabpanel" aria-labelledby="junio-tab">
            <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../../wp-content/uploads/2020/07/junio1.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <a href="../conferencias/index.html"><img class="d-block w-100"
                                src="../../wp-content/uploads/2020/07/junio2.png" alt="First slide"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="julio" role="tabpanel" aria-labelledby="julio-tab">
            <div class="carousel-item active">
                <a href="../conferencias/index.html"><img class="d-block w-100"
                        src="../../wp-content/uploads/2020/09/B_Conferencias.png" alt="First slide"></a>
            </div>
        </div>
        <div class="tab-pane fade" id="agosto" role="tabpanel" aria-labelledby="agosto-tab">
            <div class="carousel-item active">
                <a href="../conferencias/index.html"><img class="d-block w-100"
                        src="../../wp-content/uploads/2020/09/B_Conferencias.png" alt="First slide"></a>
            </div>
        </div>
        <div class="tab-pane fade ml-2" id="septiembre" role="tabpanel" aria-labelledby="septiembre-tab">
            <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="../../mmus/index.html"><img class="d-block w-100"
                                src="../../wp-content/uploads/2020/08/banner.png" alt="First slide"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="octubre" role="tabpanel" aria-labelledby="octubre-tab">
            <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a
                            href="http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/_layouts/15/FormServer.aspx?XsnLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegTallerUnihuerto/forms/template.xsn&amp;OpenIn=browser&amp;SaveLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegTallerUnihuerto&amp;Source=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegTallerUnihuerto"><img
                                class="d-block w-100" src="../../wp-content/uploads/2020/09/Banner_UnihuertoP.jpg"
                                alt="First slide"></a>
                    </div>
                    <div class="carousel-item">
                        <a href="../../consumoresp/index.html"><img class="d-block w-100"
                                src="../../wp-content/uploads/2020/09/Banner_ECR.jpg" alt="First slide"></a>
                    </div>
                    <div class="carousel-item">
                        <a href="#"><img class="d-block w-100" src="../../wp-content/uploads/2020/09/B_forovirtual.jpg"
                                alt="First slide"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade m1-2" id="noviembre" role="tabpanel" aria-labelledby="noviembre-tab">
            <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="../../consumoresp/index.html"><img class="d-block w-100"
                                src="../../wp-content/uploads/2020/09/Banner_ECR.jpg" alt="First slide"></a>
                    </div>
                    <div class="carousel-item">
                        <a href="../../gestion-2/index.html"><img class="d-block w-100"
                                src="../../wp-content/uploads/2020/09/Banner_Unihuerto.jpg" alt="First slide"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="diciembre" role="tabpanel" aria-labelledby="diciembre-tab">

        </div>
    </div>
   
    
</div>

@endsection

@push('stylesheets')
<link href="{{ asset('css/nav-pill_Comunicacion.css') }}" rel="stylesheet" type="text/css">
@endpush