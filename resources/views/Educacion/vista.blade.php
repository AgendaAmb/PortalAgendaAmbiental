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

{{--Tabs de Gestión Institucional.--}}
<x-tab-panel>
    {{-- Grupo de botones de los tabs.--}}
    <x-slot name="tabButtons">
   
        <x-tab-panel-button id="v-pills-boton1" idTabPanelContent="#tab-panel-1"
        nombre="EDUCACIÓN FORMAL" nombreRes="FORMAL" class="nav-link active d-lg-flex d-xl-flex d-md-flex d-sm-flex d-none " />
        <x-tab-panel-button id="v-pills-boton2" idTabPanelContent="#tab-panel-2"
        nombre="EDUCACIÓN NO FORMAL" nombreRes="NO FORMAL" class="nav-link  d-lg-flex d-xl-flex d-md-flex d-sm-flex d-none " />
       
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
                <x-tab-panel-image class="col-7 col-sm-5 col-md-3 my-3 mx-auto" :imageURL="asset('img/Educacion/pmpca-logo.png')" urlhref="https://ambiental.uaslp.mx/pmpca/" isBlank="true" widthBo="w-75" />
                <x-tab-panel-image :imageURL="asset('img/Educacion/imarec-logo.png')" urlhref="https://ambiental.uaslp.mx/imarec/" urlhref="https://ambiental.uaslp.mx/imarec/" isBlank="true" widthBo="w-75" />
                <x-tab-panel-image :imageURL="asset('img/Educacion/cursos-logo.png')" urlhref="{{ route('Cursos2023')}} "  widthBo="w-75" />
            </x-tab-panel-footer>
        </x-tab-panel-content>

        {{--
            Tab correspondiente a EDUCACIÓN NO FORMAL.
        --}}
       

        <x-tab-panel-content class="tab-pane fade show" id="tab-panel-2" role="tabpanel" aria-labelledby="nav-home-tab">
            <x-slider idSlider="s2"
                        titulo="EDUCACIÓN NO FORMAL"
                        descripcion="Se da en aquéllos contextos en los que, existiendo una intencionalidad educativa y una planificación de las experiencias de enseñanza-aprendizaje, estas ocurren fuera del ámbito del sistema escolarizado. Ejemplos de ello pueden ser: conferencias, conversatorios, coloquios, simposios, talleres."
                        class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-home-tab" >

                <x-imagen-slider :primerImagen=true :linkImagen="asset('img/Educacion/EDUCAION-NOFORMAL.png')" />
                <x-imagen-slider :isDobleImg=true :linkImagen="asset('storage/imagenes/Promotores/Promotores1.png')"  :linkImagen2="asset('storage/imagenes/Promotores/Promotores2.png')" urlhref="https://ambiental.uaslp.mx/Educacion/CartelPromotores"/>
            </x-slider>
        </x-tab-panel-content>
    </x-slot>
</x-tab-panel>

<div class="modal fade" id="CartelPromotores" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body py-0">
                <div class="col-12 mb-4 ml-3 p-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 ">
                            <img src="{{asset('storage/imagenes/Promotores/Cartel_PromotoresAmb.png')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-around justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-3 mx-lg-5 mx-xl-5  mx-md-5 mx-sm-5 mt-2">

                        <div class=" col-6 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'PromotoresHuasteca'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                        </div>
                        <div class="col-6  col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Promotores/Cartel_PromotoresAmb.png')}}"
                                class="btn btn-secondary bg-light  text-muted  " href="#" role="button" style="border-radius: 20px;
                                height: 35px;
                                font-weight: 900;
                                width: 145px;
                                "
                                download="Cartel_PromotoresAmb.png">CARTEL</a>
                        </div>

                    </div>
                    <br><br>
                </div>

            </div>

        </div>
    </div>
</div>
<script>
    //console.log({{$NombreM}});
     $('#{{$NombreM}}').modal('show')
 </script>
@endsection

{{--
    Hace push a las hojas de estilo, para indicar el estilo y color de los botones del nav-tab
--}}
@push('stylesheets')
<link href="{{ asset('css/nav-pill_Educacion.css') }}" rel="stylesheet" type="text/css">
@endpush

{{--
    Hace push a la pila de las hojas de estilo, para indicar estilos y color de
    los botones del nav-tab
--}}
@push('scripts')

<script src="{{ asset('js/odsEducacion.js') }}"></script>




@endpush
