@extends('Bienvenido')

@php
$titulo = '<strong> Educación ambiental continua </strong>';
$texto = 'Son programas de actualización profesional, formación general o especializada en temas ambientales. Se dirigen hacia la capacitación para el manejo de los instrumentos de gestión ambiental (evaluación de impacto ambiental, planeación y ordenamiento ecológicos, manejo de áreas naturales protegidas), normativas vigentes o conceptos, metodologías y técnicas de educación ambiental. 
<br><br>
Esta modalidad ofrece oportunidades flexibles, diversificadas y de gran calidad a personas adultas que desean o requieren profundizar o extender su conocimiento hacia áreas complementarias para su desarrollo profesional, o que quieren conocer las últimas tendencias relacionadas con la sostenibilidad.';
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

        @section('BannerBotones')
<div class="row justify-content-center justify-content-xl-between justify-content-lg-between justify-content-md-between justify-content-sm-between">
    <div class="col-12">
        <img src="{{asset('img/Educacion/B_RE.png')}}" class="img-fluid" alt="" srcset="">
        <img src="{{asset('img/Educacion/B_REI.png')}}" class="img-fluid" alt="" srcset="">
        <img src="{{asset('img/Educacion/B_SC.png')}}" class="img-fluid" alt="" srcset="">
    </div>

</div>

<!--
<div
    class="row mt-1 col-md-12 col-sm-12 pl-md-4 justify-content-xl-start  justify-content-lg-start  justify-content-md-start justify-content-around">
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">

        <a class="btn btnCur m-2 " href="#" role="button group" data-toggle="modal" data-target="#modalCursoProserem"id="CICLOCON">
            CURSO TALLER <br> RESPONSABILIDAD <br> INTEGRAL EN LABORATORIOS <br> Y TALLERES
        </a>
        <a class="btn btnCur m-2 " href="#" role="button group" data-toggle="modal" data-target="#modalCursoUPCYCLE" id="CICLOCON">
           UPCYCLE <br> MARROQUERÍA CON <br>MATERIALES RECICLADOS
        </a>
    </div>



<div class="mt-1 col-md-12 col-sm-12 p-0">
    <div class="nav nav-tabs justify-content-around">
        <a class="nav-link w-50 p-1 m-0 " data-toggle="modal" data-target="#modalCursoProserem" role="tab"
            aria-controls="nav-home" aria-selected="true">Curso Taller Responsabilidad Integral En <br> Laboratorios Y Talleres</a>
        <a class="nav-link w-50 p-1 m-0" data-toggle="modal"  data-target="#modalCursoUPCYCLE" role="tab" aria-controls="nav-profile"
            aria-selected="false">Upcycle  Marroquería Con Materiales <br> Reciclados</a>
           
    </div>
</div>-->

@endsection


        <!--{{--
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
                <x-tab-panel-image class="col-10 col-sm-5 col-md-3 my-3 mx-auto" :imageURL="asset('img/Educacion/pmpca-logo.png')" urlhref="https://ambiental.uaslp.mx/pmpca/" isBlank="true"/>
                <x-tab-panel-image class="col-10 col-sm-5 col-md-3 my-3 mx-auto" :imageURL="asset('img/Educacion/imarec-logo.png')" urlhref="https://ambiental.uaslp.mx/imarec/" isBlank="true"/>
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
                <x-imagen-slider :isDobleImg=true :linkImagen="asset('storage/imagenes/introduccion/Promotores1.png')"  :linkImagen2="asset('storage/imagenes/introduccion/Promotores2.png')"/>
            </x-slider>
        </x-tab-panel-content>-->
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
                            <img src="{{asset('storage/imagenes/introduccion/PromotoresReal.png')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class="col-6  col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/introduccion/PromotoresReal.png')}}"
                                class="btn btn-secondary bg-light  text-muted  " href="#" role="button" style="border-radius: 20px;
                                height: 35px;
                                font-weight: 900;
                                width: 145px;
                                "
                                download="PromotoresReal.png">CARTEL GENERAL </a>
                        </div>

                    </div>

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
